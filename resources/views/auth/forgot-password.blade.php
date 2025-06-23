<x-guest-layout>
    <!-- Session Status -->

    <!-- Main Content Area -->
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-purple-50 to-blue-50 px-4">
        <!-- Forgot Password Card -->
        <div class="w-full max-w-md bg-white rounded-lg shadow-lg overflow-hidden">
            <!-- Card Header -->
            <div class="p-6 bg-white text-purple-600 text-center">
                <a href="/" class="inline-block">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-16 mx-auto" />
                </a>
                <p class="mt-2 text-sm font-medium">Lock in Market Prices and Pay in Small Installments</p>
            </div>

            <!-- Card Body -->
            <div class="p-6">
                <!-- Forgot Password Form -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="mb-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input
                            id="email"
                            class="w-full py-2 px-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500"
                            type="email"
                            name="email"
                            :value="old('email')"
                            required
                            autofocus
                            autocomplete="email"
                        />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Submit Button -->
                    <div class="flex items-center justify-end mt-6">
                        <button
                            type="submit"
                            class="w-full py-2 px-4 bg-purple-600 text-white font-semibold rounded-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500"
                        >
                            {{ __('Email Password Reset Link') }}
                        </button>
                    </div>
                </form>

                <!-- Back to Login Link -->
                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">Remember your password?</p>
                    <a href="{{ route('login') }}" class="text-sm text-purple-600 hover:text-purple-700">Sign in here</a>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>