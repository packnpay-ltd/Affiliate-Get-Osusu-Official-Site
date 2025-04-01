<?php

namespace App\Services;

use App\Models\AffiliateProgram;
use Illuminate\Support\Str;

class ReferralCodeService
{
    public static function generateUniqueCode()
    {
        do {
            // Generate an 8 character random string
            $code = strtoupper(Str::random(8));
        } while (AffiliateProgram::where('referral_code', $code)->exists());

        return $code;
    }
}