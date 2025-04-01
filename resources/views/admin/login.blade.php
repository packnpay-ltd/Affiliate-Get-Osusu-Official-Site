    <x-guest-layout>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Main Content Area -->
        <div class="flex flex-col w-full overflow-hidden relative min-h-screen radial-gradient items-center justify-center g-0 px-4">
            <!-- Login Card -->
            <div class="justify-center items-center w-full card lg:flex max-w-md">
                <div class="w-full card-body bg-purple-400 px-2 rounded-lg py-8">
                    <!-- Logo -->
                    <a href="../" class="pt-4 block">
                        <img src="../images/logo.png" alt="Logo" class="mx-auto w-1/2"/>
                    </a>
                    <p class="mb-4 text-white text-sm text-center font-bold">Administator Login</p>

                    <!-- Login Form -->
                    <form method="POST" action="{{ route('admin.login') }}">
                        @csrf
                        <!-- Username -->
                        <div class="mb-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mb-6">
                            <x-input-label for="password" :value="__('Password')" />
                            <x-text-input id="password" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0" type="password" name="password" required autocomplete="current-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Remember Me -->
                        <div class="flex justify-between mb-4">
                            <div class="flex items-center">
                                <input id="remember_me" type="checkbox" class="shrink-0 mt-0.5 border-gray-200 rounded-[4px] text-blue-600 focus:ring-blue-500" name="remember">
                                <label for="remember_me" class="text-sm text-gray-600 ms-3">{{ __('Remember this Device') }}</label>
                            </div>
                            <a href="{{ route('password.request') }}" class="text-sm font-medium text-blue-600 hover:text-blue-700">Forgot Password?</a>
                        </div>

                        <!-- Submit Button -->
                        <div class="grid my-6">
                            <button type="submit" class="py-[10px] text-base bg-purple-600 text-white font-medium rounded-lg">Sign In</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </x-guest-layout>

