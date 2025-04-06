<?php

namespace App\Models;

use App\Services\ReferralCodeService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AffiliateProgram extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'referral_code',
        'commission_rate',
        'minimum_withdrawal',
        'is_active',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($affiliateProgram) {
            if (!$affiliateProgram->referral_code) {
                $affiliateProgram->referral_code = 'REF' . str_pad($affiliateProgram->user_id, 6, '0', STR_PAD_LEFT);
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function referrals()
    {
        return $this->hasMany(AffiliateReferral::class, 'referrer_id', 'user_id');
    }

    public function isEligibleForWithdrawal()
    {
        return $this->getTotalEarnings() >= $this->minimum_withdrawal;
    }

    public function getTotalEarnings()
    {
        return $this->referrals()
            ->with('earnings')
            ->get()
            ->sum(function ($referral) {
                return $referral->earnings()
                    ->where('status', 'approved')
                    ->sum('amount');
            });
    }
}