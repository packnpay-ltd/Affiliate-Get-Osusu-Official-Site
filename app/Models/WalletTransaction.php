<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'type',
        'status',
        'transaction_reference',
    ];

    // Relationship with the Wallet model
    public function wallet()
    {
        return $this->belongsTo(Wallet::class, 'user_id');
    }

    // Relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Format transaction amount
    public function getAmountAttribute($value)
    {
        return number_format($value, 2);
    }

    // Generate a unique transaction reference
    public static function generateTransactionReference()
    {
        return 'TXN-' . strtoupper(uniqid());
    }
}

