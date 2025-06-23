<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Main Content Area -->
    <div class="min-h-screen p-8 flex items-center justify-center bg-gradient-to-r from-indigo-600 to-purple-600 px-4">
        <!-- Login Card -->
        <div class="w-full max-w-md bg-white rounded-2xl shadow-2xl overflow-hidden">
            <!-- Card Header -->
            <div class="p-6 bg-gradient-to-r from-purple-500 to-indigo-500 text-white text-center">
                <a href="/" class="inline-block">
                    <img src="{{ asset('images/waitlistOsusu_logo.png') }}" alt="Logo" class="h-12 mx-auto" />
                </a>
                <h2 class="text-2xl font-bold mt-3">Affiliate Portal</h2>
                <p class="mt-2 text-sm font-medium">Turn Your Influence Into Income</p>
            </div>

            <!-- Card Body -->
            <div class="p-8">
                <!-- Login Form -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Login Input (Email or Phone Number) -->
                    <div class="mb-4">
                        <x-input-label for="login" :value="__('Email or Phone Number')"
                            class="text-gray-700 font-semibold" />
                        <x-text-input id="login"
                            class="w-full py-3 px-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                            type="text" name="login" :value="old('login')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('login')" class="mt-2" />
                    </div>

                    <!-- Password Input -->
                    <div class="mb-6">
                        <x-input-label for="password" :value="__('Password')" class="text-gray-700 font-semibold" />
                        <x-text-input id="password"
                            class="w-full py-3 px-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                            type="password" name="password" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center">
                            <input id="remember_me" type="checkbox"
                                class="rounded border-gray-300 text-purple-600 focus:ring-purple-500" name="remember" />
                            <label for="remember_me" class="ml-2 text-sm text-gray-600">Stay Signed In</label>
                        </div>
                        <a href="{{ route('password.request') }}"
                            class="text-sm text-purple-600 hover:text-purple-700 font-semibold">Reset Password</a>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full py-3 px-4 bg-gradient-to-r from-purple-600 to-indigo-600 text-white font-bold rounded-lg hover:from-purple-700 hover:to-indigo-700 transform hover:scale-[1.02] transition-all focus:outline-none focus:ring-2 focus:ring-purple-500">
                        Access Affiliate Dashboard
                    </button>
                </form>

                <!-- Social Login Divider -->
                <div class="relative my-6">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white text-gray-500">Or continue with</span>
                    </div>
                </div>

                <!-- Google Login Button -->
                <a href="{{ route('google.login') }}"
                    class="w-full flex items-center justify-center py-3 px-4 bg-white border border-gray-300 rounded-lg text-gray-700 font-semibold hover:bg-gray-50 transform hover:scale-[1.02] transition-all focus:outline-none focus:ring-2 focus:ring-purple-500">
                    <svg class="h-5 w-5 mr-2" viewBox="0 0 24 24">
                        <path
                            d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"
                            fill="#4285F4" />
                        <path
                            d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"
                            fill="#34A853" />
                        <path
                            d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"
                            fill="#FBBC05" />
                        <path
                            d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"
                            fill="#EA4335" />
                    </svg>
                    Sign in with Google
                </a>

                <!-- Affiliate Benefits -->
                <div class="mt-8 space-y-4">
                    <h3 class="text-center font-semibold text-gray-700">Why Join Our Affiliate Program?</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-sm text-gray-600">High Commission Rates</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-sm text-gray-600">Instant Payouts</span>
                        </div>
                    </div>
                </div>

                <!-- Register Link -->
                <div class="mt-8 text-center">
                    <p class="text-sm text-gray-600">Not an affiliate yet?</p>
                    <a href="{{ route('referral.join', ['code' => 'REF000001']) }}"
                        class="text-purple-600 hover:text-purple-700 font-semibold">Join our Affiliate Program</a>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>