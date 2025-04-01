<?php

namespace App\Traits;

use App\Models\AffiliateProgram;

trait HasAffiliateProgram
{
    public function ensureAffiliateProgram()
    {
        if (!$this->affiliateProgram) {
            return AffiliateProgram::create([
                'user_id' => $this->id,
            ]);
        }
        return $this->affiliateProgram;
    }
}