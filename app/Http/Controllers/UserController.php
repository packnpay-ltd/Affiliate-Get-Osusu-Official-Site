<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\OrderHistory;
use Illuminate\Http\Request;
use App\Models\InstallmentPlan;
use App\Models\AffiliateEarning;
use App\Models\AffiliateReferral;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Services\Api\OsusuApiService;
use App\Models\Transaction; // Assuming you have a Transaction model

class UserController extends Controller
{

    protected $osusuService;
    public function __construct(OsusuApiService $osusuService)
    {
        $this->osusuService = $osusuService;
    }

public function index()
{
    $user = Auth::user();

    // Ensure affiliate program exists
    $affiliateProgram = $user->ensureAffiliateProgram();

    // Fetch wallet
    $wallet = $user->wallet;

    // Fetch affiliate earnings
    $affiliateEarnings = AffiliateEarning::where('user_id', Auth::id())->get();

    // Calculate totals
    $totalEarnings = $affiliateEarnings->sum('amount') ?? 0;
    $pendingEarnings = $affiliateEarnings->where('status', 'pending')->sum('amount') ?? 0;

    // Fetch referrals count
    $totalReferrals = AffiliateReferral::where('referrer_id', Auth::id())->count();

    // Calculate conversion rate
    $totalReferralAttempts = AffiliateReferral::where('referrer_id', Auth::id())->count();
    $successfulReferrals = AffiliateReferral::where('referrer_id', Auth::id())
        ->where('status', 'active')
        ->count();
    $conversionRate = $totalReferralAttempts > 0
        ? round(($successfulReferrals / $totalReferralAttempts) * 100, 2)
        : 0;

    // Fetch recent transactions
    // $transactions = Transaction::where('user_id', Auth::id())
    //     ->orderBy('created_at', 'desc')
    //     ->take(5)
    //     ->get();

        $transactions = $this->osusuService->getTransactions();

    // Fetch recent referrals
    $recentReferrals = AffiliateReferral::with('referredUser')
        ->where('referrer_id', Auth::id())
        ->orderBy('created_at', 'desc')
        ->take(5)
        ->get();

    return view('user.dashboard', compact(
        'transactions',
        'wallet',
        'totalEarnings',
        'pendingEarnings',
        'totalReferrals',
        'conversionRate',
        'recentReferrals',
        'affiliateProgram'
    ));
}



public function callExternalApi()
{
    // 1. Get the logged-in user's token
    $user = Auth::user();
   $token = $user->createToken('auth-token')->plainTextToken;
    

    // 2. Make the API call with Bearer token
    $response = Http::withToken($token)->get('http://osusu.test/api/v1/products');

    // 3. Handle the response
    if ($response->successful()) {
        return $response->json();
    }

    return response()->json(['error' => 'API call failed'], $response->status());
}



}
