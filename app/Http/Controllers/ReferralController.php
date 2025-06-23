<?php

namespace App\Http\Controllers;

use App\Models\AffiliateProgram;
use Illuminate\Http\Request;

class ReferralController extends Controller
{
    public function handleReferral($code)
    {
        // Assuming the code is in the format REF000001
        $affiliateProgram = AffiliateProgram::where('referral_code', $code)->firstOrFail();

        // Redirect to registration page with referral code as a URL parameter
        return redirect(config('app.parent_url') . '/register?ref=' . urlencode($code));
    }


}