<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction; // Assuming you have a Transaction model
use Illuminate\Support\Facades\Auth;
use App\Models\InstallmentPlan;
use App\Models\Cart;
use App\Models\OrderHistory;
use App\Models\AffiliateEarning;
use App\Models\AffiliateReferral;

class UserController extends Controller
{
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
    $transactions = Transaction::where('user_id', Auth::id())
        ->orderBy('created_at', 'desc')
        ->take(5)
        ->get();

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


}
