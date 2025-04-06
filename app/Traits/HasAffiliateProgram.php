<?php

namespace App\Traits;

use App\Models\AffiliateProgram;

trait HasAffiliateProgram
{
    public function ensureAffiliateProgram()
    {
        // Check if the user already has an affiliate program
        if (!$this->affiliateProgram) {
            // Generate a static referral code based on user ID
            $referralCode = 'REF' . str_pad($this->id, 6, '0', STR_PAD_LEFT);

            // Check if the referral code already exists in the database
            if (AffiliateProgram::where('referral_code', $referralCode)->exists()) {
                // If it exists, return the existing record
                return AffiliateProgram::where('referral_code', $referralCode)->first();
            }

            // If it doesn't exist, create a new record
            return AffiliateProgram::create([
                'user_id' => $this->id,
                'referral_code' => $referralCode,
            ]);
        }

        // Return the existing affiliate program
        return $this->affiliateProgram;
    }
}