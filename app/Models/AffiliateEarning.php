<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AffiliateEarning extends Model
{
    use HasFactory;

    protected $fillable = [
        'affiliate_referral_id',
        'user_id',
        'order_history_id',
        'amount',
        'type',
        'status',
        'description',
    ];

    public function referral()
    {
        return $this->belongsTo(AffiliateReferral::class, 'affiliate_referral_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderHistory()
    {
        return $this->belongsTo(OrderHistory::class);
    }

    public function markAsPaid()
    {
        $this->status = 'paid';
        $this->save();
    }

    public static function calculateCommission($orderAmount, $commissionRate)
    {
        return round($orderAmount * ($commissionRate / 100), 2);
    }

    public function withdrawEarnings(User $user)
    {
        $affiliateProgram = $user->affiliateProgram;

        if ($affiliateProgram->isEligibleForWithdrawal()) {
            $amount = $affiliateProgram->getTotalEarnings();

            // Add to user's wallet
            $user->wallet->increment('balance', $amount);

            // Create wallet transaction
            WalletTransaction::create([
                'user_id' => $user->id,
                'amount' => $amount,
                'type' => 'affiliate_earning',
                'status' => 'completed',
                'transaction_reference' => WalletTransaction::generateTransactionReference(),
            ]);

            // Mark earnings as paid
            $user->affiliateEarnings()->update(['status' => 'paid']);
        }
    }
}