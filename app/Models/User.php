<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Edwink\FilamentUserActivity\Traits\UserActivityTrait;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\HasAffiliateProgram;

class User extends Authenticatable
{
    use HasFactory, Notifiable, UserActivityTrait, HasApiTokens, HasAffiliateProgram;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'password',
        'two_factor_auth',
        'otp',
        'is_admin',
        'verify_status',
        'document_type',
        'document_path',
        'organisation_name',
        'organisation_type',
        'about_us',
        'country_code',
    ];

    protected $hidden = ['password', 'otp'];
    protected $casts = [
        'is_admin' => 'boolean',
    ];
    protected $attributes = [
        'is_admin' => false,
        'verify_status' => 0,
    ];

    // Relationships
    public function installment()
    {
        return $this->hasMany(InstallmentPlan::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function referrals()
    {
        return $this->hasMany(Referral::class);
    }

    public function userActivities()
    {
        return $this->hasMany(UserActivity::class);
    }

    public function ticket()
    {
        return $this->hasMany(SupportTicket::class);
    }

    public function wallet_transaction()
    {
        return $this->hasMany(WalletTransaction::class);
    }

    public function wallet()
    {
        return $this->hasOne(Wallet::class);
    }

    public function billingAddress()
    {
        return $this->hasOne(BillingAddress::class, 'user_id');
    }

    public function getWalletBalanceAttribute()
    {
        return $this->wallet ? $this->wallet->balance : 0.00;
    }

    public function getIsAdminTextAttribute()
    {
        return $this->is_admin ? 'Admin' : 'User';
    }

    protected static function booted()
    {
        static::creating(function ($user) {
            $user->verify_status = $user->verify_status ?? 0;
        });

        // Cascade deletion
        static::deleting(function ($user) {
            // Delete related records
            $user->installment()->delete();
            $user->transactions()->delete();
            $user->notifications()->delete();
            $user->referrals()->delete();
            $user->userActivities()->delete();
            $user->ticket()->delete();
            $user->wallet()->delete();
            $user->billingAddress()->delete();
        });
    }
}
