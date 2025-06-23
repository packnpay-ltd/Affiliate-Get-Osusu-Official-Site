<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Wallet;
use App\Services\Api\OsusuApiService;

class AuthenticatedSessionController extends Controller
{
    protected $osusuService;
    public function __construct(OsusuApiService $osusuService)
    {
        $this->osusuService = $osusuService;
    }
    /**
     * Display the login view.
     */
     
     public function adminCreate()
    {
        return view('admin.login'); // Ensure you have an 'admin.login' Blade template
    }

    public function adminStore(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->is_admin) {
                return redirect()->route('admin.dashboard');
            } else {
                Auth::logout(); // Prevent non-admins from logging in
                return redirect()->route('admin.login')->withErrors(['error' => 'Unauthorized access.']);
            }
        }

        return back()->withErrors(['error' => 'Invalid credentials.']);
    }


    
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();
        $user = Auth::user();
        if (!$user->wallet) {
            $activities = Wallet::create([
                'user_id' => $user->id,
                'amount' => 0.00,
            ]);
        }

        return redirect()->route('dashboard');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(config('app.url'));
    }


}
