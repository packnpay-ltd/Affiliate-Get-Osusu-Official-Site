<?php

namespace App\Http\Controllers;

use App\Models\AffiliateProgram;
use Illuminate\Http\Request;

class ReferralController extends Controller
{
    public function handleReferral(Request $request)
    {
        $code = $request->query('code');

        if ($code && $affiliateProgram = AffiliateProgram::where('referral_code', $code)->first()) {
            return redirect(config('app.parent_url') . '/register?ref=' . urlencode($code));

        }

        return redirect(config('app.parent_url') . '/register');
    }


}