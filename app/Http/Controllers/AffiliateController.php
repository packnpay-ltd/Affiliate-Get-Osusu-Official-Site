<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AffiliateEarning;
use App\Models\Wallet;
use App\Models\AffiliateProgram;
use App\Models\AffiliateReferral;
use Illuminate\Database\Eloquent\Collection;

class AffiliateController extends Controller
{
    public function overview()
    {
        $user = Auth::user();
        $affiliateProgram = AffiliateProgram::where('user_id', $user->id)->first();

        // Referral Stats
        $totalReferrals = $affiliateProgram ? $affiliateProgram->referrals()->count() : 0;
        $activeReferrals = $affiliateProgram ? $affiliateProgram->referrals()->where('status', 'active')->count() : 0;
        $conversionRate = $totalReferrals > 0 ? ($activeReferrals / $totalReferrals) * 100 : 0;

        // Earnings Stats
        $totalEarnings = $affiliateProgram ? $affiliateProgram->getTotalEarnings() : 0;
        $pendingEarnings = $affiliateProgram ? $affiliateProgram->referrals()->with('earnings')->get()->sum(function ($referral) {
            return $referral->earnings->where('status', 'pending')->sum('amount');
        }) : 0;
        $approvedEarnings = $affiliateProgram ? $affiliateProgram->referrals()->with('earnings')->get()->sum(function ($referral) {
            return $referral->earnings->where('status', 'approved')->sum('amount');
        }) : 0;
        $withdrawnEarnings = $affiliateProgram ? $affiliateProgram->referrals()->with('earnings')->get()->sum(function ($referral) {
            return $referral->earnings->where('status', 'withdrawn')->sum('amount');
        }) : 0;

        // Chart Data
        $chartLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $referralData = [];
        $earningData = [];

        for ($i = 1; $i <= 12; $i++) {
            $referralData[] = $affiliateProgram ? $affiliateProgram->referrals()->whereMonth('created_at', $i)->count() : 0;
            $earningData[] = $affiliateProgram ? $affiliateProgram->referrals()->with('earnings')->whereMonth('created_at', $i)->get()->sum(function ($referral) {
                return $referral->earnings->sum('amount');
            }) : 0;
        }

        // Recent Activities
        $recentEarnings = $affiliateProgram ? $affiliateProgram->referrals()->with('earnings')->latest()->take(5)->get()->flatMap(function ($referral) {
            return $referral->earnings;
        }) : collect();
        // $recentReferrals = $affiliateProgram ? $affiliateProgram->referrals()->with('referredUser')->latest()->take(5)->get() : collect();
        $recentReferrals = $affiliateProgram ? $affiliateProgram->referrals()->with('referredUser', 'earnings')->latest()->take(5)->get()->map(function ($referral) {
            $referral->commission = $referral->earnings->where('user_id', $referral->id)->first()->amount ?? 0; // Use referral's ID as user_id
            return $referral;
        }) : collect();

        return view('affiliate.overview', compact(
            'affiliateProgram',
            'totalReferrals',
            'activeReferrals',
            'conversionRate',
            'totalEarnings',
            'pendingEarnings',
            'approvedEarnings',
            'withdrawnEarnings',
            'chartLabels',
            'referralData',
            'earningData',
            'recentEarnings',
            'recentReferrals'
        ));
    }

    public function referrals()
    {
        $user = Auth::user();
        $affiliateProgram = AffiliateProgram::where('user_id', $user->id)->first();
        $referrals = $affiliateProgram ? $affiliateProgram->referrals : new Collection();

        return view('affiliate.referrals', compact('referrals'));
    }

    public function earnings()
    {
        $user = Auth::user();
        $wallet = $user->wallet ?? null;

        // Fetch earnings related to the user
        $earnings = AffiliateEarning::where('user_id', $user->id)->get();

        // Calculate totals (defaulting to 0)
        $totalEarnings = $earnings->sum('amount');
        $pendingEarnings = $earnings->where('status', 'pending')->sum('amount');

        return view('affiliate.earnings', compact(
            'wallet',
            'earnings',
            'totalEarnings',
            'pendingEarnings'
        ));
    }

}