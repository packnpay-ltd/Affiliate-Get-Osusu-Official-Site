<x-guest-layout>
    <!-- Session Status -->

    <!-- Main Content Area -->
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-purple-50 to-blue-50 px-4">
        <!-- Reset Password Card -->
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
                <!-- Reset Password Form -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('password.store') }}">
                    @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Email Address -->
                    <div class="mb-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input
                            id="email"
                            class="w-full py-2 px-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500"
                            type="email"
                            name="email"
                            :value="old('email', $request->email)"
                            required
                            autofocus
                            autocomplete="username"
                        />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input
                            id="password"
                            class="w-full py-2 px-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500"
                            type="password"
                            name="password"
                            required
                            autocomplete="new-password"
                        />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-6">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                        <x-text-input
                            id="password_confirmation"
                            class="w-full py-2 px-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500"
                            type="password"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"
                        />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <!-- Submit Button -->
                    <div class="flex items-center justify-end mt-6">
                        <button
                            type="submit"
                            class="w-full py-2 px-4 bg-purple-600 text-white font-semibold rounded-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500"
                        >
                            {{ __('Reset Password') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Toastr Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

    <!-- Display Toastr Alerts -->
    <script>
        $(document).ready(function() {
            // Display success toast
            @if (session('success'))
                toastr.success("{{ session('success') }}");
            @endif

            // Display error toast
            @if (session('error'))
                toastr.error("{{ session('error') }}");
            @endif

            // Display validation errors
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    toastr.error("{{ $error }}");
                @endforeach
            @endif
        });
    </script>
</x-guest-layout>