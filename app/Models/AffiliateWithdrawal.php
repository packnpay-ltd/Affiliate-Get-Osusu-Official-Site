<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AffiliateWithdrawal extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'status',
        'payment_method',
        'payment_details',
        'rejection_reason',
        'processed_at',
    ];

    protected $dates = [
        'processed_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}