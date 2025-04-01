<?php

namespace App\Http\Controllers;

use App\Models\AffiliateProgram;
use Illuminate\Http\Request;

class ReferralController extends Controller
{
    public function handleReferral($code)
    {
        $affiliateProgram = AffiliateProgram::where('referral_code', $code)->firstOrFail();

        // Return the redirect view with the referral code
        return view('referral.redirect', [
            'code' => $code,
            'redirectUrl' => 'http://127.0.0.1:8000/register'
        ]);
    }
}