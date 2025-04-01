<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AffiliateEarning;
use App\Models\Wallet;
use Illuminate\Database\Eloquent\Collection;

class AffiliateController extends Controller
{
    public function overview()
    {
        return view('affiliate.overview');
    }

    public function referrals()
    {
        return view('affiliate.referrals');
    }

    public function earnings()
    {
        $user = Auth::user();
        $wallet = $user->wallet ?? null;

        // Initialize an empty collection if no earnings exist
        $earnings = new Collection();

        // Calculate totals (defaulting to 0)
        $totalEarnings = 0;
        $pendingEarnings = 0;

        return view('affiliate.earnings', compact(
            'wallet',
            'earnings',
            'totalEarnings',
            'pendingEarnings'
        ));
    }

    public function marketing()
    {
        return view('affiliate.marketing');
    }
}