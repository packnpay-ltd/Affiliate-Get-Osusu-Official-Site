<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'plan_id',
        'amount',
        'type',
        'status',
        'transaction_reference',
        'payment_method',
        'transaction_date',
        'note',
    ];

    
    // Relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with the Wallet model
    public function wallet()
    {
        return $this->belongsTo(Wallet::class, 'user_id');
    }

    // Relationship with the InstallmentPlan model
    public function installmentPlan()
    {
        return $this->belongsTo(InstallmentPlan::class, 'plan_id');
    }

  

    // Generate a unique transaction reference
    public static function generateTransactionReference()
    {
        return 'TXN-' . strtoupper(uniqid());
    }
}