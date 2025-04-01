<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Services\UserActivityService;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Wallet;
use Illuminate\Support\Facades\Http;



class GoogleLoginController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
{
    try {
        $googleUser = Socialite::driver('google')->user();
        \Log::info('Google User Data: ', (array) $googleUser);

        $user = User::where('email', $googleUser->getEmail())->first();

        if (!$user) {
            $user = User::create([
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'password' => bcrypt(Str::random(16)), // Random password for social login
                'verify_status' => 'active', // Auto-verify social logins
            ]);

            Wallet::create([
                'user_id' => $user->id,
                'amount' => 0.00,
            ]);

             // Send Welcome Email with a UI template
        Mail::to($user->email)->send(new \App\Mail\WelcomeMail($user));
        toast('Account verified successfully!', 'success');
        }

        Auth::login($user);

        // Send Welcome Email with a UI template
        toast('Google login successfully!', 'success');
        return redirect()->route('dashboard');

    } catch (\Exception $e) {
        \Log::error('Google Login Error: ' . $e->getMessage());
        return redirect()->route('login')->withErrors(['error' => 'Unable to login with Google. Please try again.']);
    }
}
}