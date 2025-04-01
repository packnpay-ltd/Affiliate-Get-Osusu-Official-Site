<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use App\Models\WalletTransaction;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail; 
use App\Mail\WalletDepositNotification;


class WalletController extends Controller
{
    public function showWallet()
    {
        $wallet = Auth::user()->wallet;
        $transactions = WalletTransaction::where('user_id', Auth::id())->latest()->get();

        return view('wallet.show', compact('wallet','transactions'));
    }

    public function deposit(Request $request)
{
    $validated = $request->validate([
        'amount' => 'required|numeric|min:1',
    ]);

    $amount = $validated['amount'] * 100; // Convert amount to kobo
    $email = Auth::user()->email;

    $response = Http::withToken(config('services.paystack.secret'))
        ->post('https://api.paystack.co/transaction/initialize', [
            'email' => $email,
            'amount' => $amount,
            'callback_url' => route('wallet.deposit.callback'),
        ]);

    $data = $response->json();

    if ($data['status'] === true) {
        // Store transaction in WalletTransaction table before redirect
        WalletTransaction::create([
            'user_id' => Auth::id(),
            'amount' => $validated['amount'],
            'type' => 'deposit',
            'status' => 'pending',
            'transaction_reference' => $data['data']['reference'],
        ]);

        return redirect($data['data']['authorization_url']);
    }

    return redirect()->back()->with('error', 'Failed to initialize payment. Please try again.');
}

 public function handleCallback(Request $request)
{
    $reference = $request->query('reference');
    $response = Http::withToken(config('services.paystack.secret'))
        ->get("https://api.paystack.co/transaction/verify/{$reference}");

    $data = $response->json();

    if ($data['status'] === true && $data['data']['status'] === 'success') {
        $user = Auth::user();
        $wallet = $user->wallet;
        $amount = $data['data']['amount'] / 100; // Convert back to naira

        // Check if the wallet exists
        if (!$wallet) {
            $wallet = $user->wallet()->create(['balance' => $amount]);
        } else {
            $wallet->increment('balance', $amount);
        }

        // Update transaction status to success
        $transaction = WalletTransaction::where('transaction_reference', $reference)
            ->where('status', 'pending')
            ->first();

        if ($transaction) {
            $transaction->update(['status' => 'success']);
        }
         $main_transaction = Transaction::create([
        'user_id' => $user->id,
        'amount' => $amount, // Cast to float
        'payment_method' => 'online deposit', // Store as a string
        'transaction_reference' => $reference,
        'status' => 'completed',
        'type' => 'deposit', // Cast to string
    ]);


        // Send email notifications to user and admin
        Mail::to($user->email)->send(new WalletDepositNotification($user, $transaction, $amount));
        Mail::to(config('mail.admin_email'))->send(new WalletDepositNotification($user, $transaction, $amount, true));

        return redirect()->route('wallet.show')->with('success', 'Deposit successful!');
    }

    WalletTransaction::where('transaction_reference', $reference)
        ->update(['status' => 'failed']);

    return redirect()->route('wallet.show')->with('error', 'Failed to verify payment.');
}



}
