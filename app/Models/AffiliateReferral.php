<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AffiliateReferral extends Model
{
    use HasFactory;

    protected $fillable = [
        'referrer_id',
        'referred_user_id',
        'status',
        'activation_date',
        'expiry_date',
    ];

    protected $dates = [
        'activation_date',
        'expiry_date',
    ];

    public function referrer()
    {
        return $this->belongsTo(User::class, 'referrer_id');
    }

    public function referredUser()
    {
        return $this->belongsTo(User::class, 'referred_user_id');
    }

    public function earnings()
    {
        return $this->hasMany(AffiliateEarning::class);
    }

    public function canEarnCommission()
    {
        return $this->purchase_count < 3 && $this->status === 'active';
    }

    public function incrementPurchaseCount()
    {
        $this->increment('purchase_count');
        if ($this->purchase_count >= 3) {
            $this->status = 'expired';
            $this->expiry_date = now();
            $this->save();
        }
    }
}