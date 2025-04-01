<x-app-layout>
    <main>
        <div id="main-wrapper" class="flex flex-col xl:flex-row">
            <!-- Sidebar -->
            @include('components.adminSideBar')

            <!-- Main Content -->
            <div class="w-full page-wrapper overflow-hidden">
                <!-- Header -->
                <header class="w-full text-sm py-5 xl:px-9 px-5">
                    @include('components.adminNavBar')
                </header>

                <!-- Main Content -->
                <main class="h-full pt-4">
                    <div class="xl:px-9 px-5">
                        <div class="flex flex-col md:flex-row justify-between items-center mb-6">
                            <h4 class="text-gray-800 text-2xl font-semibold">Create New User</h4>
                            <a href="{{ route('admin.users.list') }}"
                                class="flex items-center gap-2 px-4 py-2 bg-gray-100 text-gray-600 rounded-lg hover:bg-gray-200 transition-all duration-200 mt-4 md:mt-0">
                                <i class="ti ti-arrow-left text-lg"></i>
                                Back to Users
                            </a>
                        </div>

                        <!-- Create User Form -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-100 w-full">
                            <div class="p-6 border-b border-gray-100">
                                <!-- Tab Navigation -->
                                <div class="flex space-x-4 mb-6">
                                    <button type="button" onclick="switchTab('individual')" id="individual-tab"
                                        class="px-6 py-2 rounded-lg text-sm font-medium tab-button active-tab">
                                        Individual
                                    </button>
                                    <button type="button" onclick="switchTab('corporate')" id="corporate-tab"
                                        class="px-6 py-2 rounded-lg text-sm font-medium tab-button">
                                        Corporate
                                    </button>
                                </div>
                                <h5 class="text-gray-700 text-lg font-medium">User Information</h5>
                                <p class="text-gray-500 text-sm mt-1">Fill in the details to create a new user account
                                </p>
                            </div>

                            <!-- Individual Form -->
                            <form method="POST" action="{{ route('admin.users.store') }}" id="individual-form"
                                class="p-6">
                                @csrf
                                <input type="hidden" name="user_type" value="individual">
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                    <!-- Left Column -->
                                    <div class="space-y-6">
                                        <div>
                                            <!-- Name -->
                                            <div class="mb-4">
                                                <input type="text" name="name" placeholder="Full Name"
                                                    value="{{ old('name') }}"
                                                    class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                    required>
                                                @error('name')
                                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <!-- Email -->
                                            <div class="mb-4">
                                                <input type="email" name="email" placeholder="Email Address"
                                                    value="{{ old('email') }}"
                                                    class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                    required>
                                                @error('email')
                                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div>
                                                <label class="text-sm font-medium text-gray-700">Set password</label>
                                                <input type="password" name="password" placeholder="Enter your password"
                                                    class="mt-1 w-full p-2 lg:p-3 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Right Column -->
                                    <div class="space-y-6">
                                        <div>
                                            <!-- Password -->
                                            <!-- Phone -->
                                            <div class="flex gap-3">
                                                <div class="w-1/3">
                                                    <input type="text" name="country_code" placeholder="Code"
                                                        value="{{ old('country_code', '+234') }}"
                                                        class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                        required>
                                                </div>
                                                <div class="w-2/3">
                                                    <input type="text" name="phone_number" placeholder="Phone Number"
                                                        value="{{ old('phone_number') }}"
                                                        class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                        required>
                                                </div>
                                            </div>
                                            @error('phone_number')
                                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                            @enderror

                                            <!-- Status -->
                                            <div class="mb-4 mt-4">
                                                <select name="verify_status"
                                                    class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                    required>
                                                    <option value="">Select Status</option>
                                                    <option value="active"
                                                        {{ old('verify_status') == 'active' ? 'selected' : '' }}>Active
                                                    </option>
                                                    <option value="pending"
                                                        {{ old('verify_status') == 'pending' ? 'selected' : '' }}>
                                                        Pending</option>
                                                    <option value="suspended"
                                                        {{ old('verify_status') == 'suspended' ? 'selected' : '' }}>
                                                        Suspended</option>
                                                </select>
                                                @error('verify_status')
                                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- Form Actions -->
                                <div class="flex justify-end items-center gap-3 mt-8 pt-6 border-t border-gray-100">
                                    <button type="button" onclick="window.location='{{ route('admin.users.list') }}'"
                                        class="px-6 py-2.5 text-gray-600 hover:text-gray-800 transition-colors duration-200">
                                        Cancel
                                    </button>
                                    <button type="submit"
                                        class="px-6 py-2.5 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-100 transition-all duration-200">
                                        Create User
                                    </button>
                                </div>
                            </form>

                            <!-- Corporate Form -->
                            <form method="POST" action="{{ route('admin.users.store') }}" id="corporate-form"
                                class="p-6 hidden">
                                @csrf
                                <input type="hidden" name="user_type" value="corporate">
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                    <!-- Left Column -->
                                    <div class="space-y-6">
                                        <div>
                                            <!-- Name -->
                                            <div class="mb-4">
                                                <input type="text" name="name" placeholder="Full Name"
                                                    value="{{ old('name') }}"
                                                    class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                    required>
                                                @error('name')
                                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <!-- Email -->
                                            <div class="mb-4">
                                                <input type="email" name="email" placeholder="Email Address"
                                                    value="{{ old('email') }}"
                                                    class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                    required>
                                                @error('email')
                                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="mb-4">
                                                <label class="text-sm font-medium text-gray-700">Organisation
                                                    Type</label>
                                                <select name="organisation_type"
                                                    class="mt-1 w-full p-3 border border-gray-300 rounded-lg bg-white focus:ring-primary focus:border-primary"
                                                    required>
                                                    <option value="NGO">NGOs</option>
                                                    <option value="Small Business">Small Business</option>
                                                    <option value="Enterprise">Enterprise</option>
                                                </select>

                                            </div>

                                            <div>
                                                <label class="text-sm font-medium text-gray-700">Set password</label>
                                                <input type="password" name="password" placeholder="Enter your password"
                                                    class="mt-1 w-full p-2 lg:p-3 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Right Column -->
                                    <div class="space-y-6">
                                        <div>
                                            <div class="mb-4">
                                                <label class="text-sm font-medium text-gray-700">Organisation Name</label>
                                                <input type="text" name="organisation_name" placeholder="Organisation Name" required
                                                    class="mt-1 w-full p-3 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary">
                                            </div>
                                            <!-- Phone -->
                                            <div class="flex gap-3">
                                                <div class="w-1/3">
                                                    <input type="text" name="country_code" placeholder="Code"
                                                        value="{{ old('country_code', '+234') }}"
                                                        class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                        required>
                                                </div>
                                                <div class="w-2/3">
                                                    <input type="text" name="phone_number"
                                                        placeholder="Phone Number" value="{{ old('phone_number') }}"
                                                        class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                        required>
                                                </div>
                                            </div>
                                            @error('phone_number')
                                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                            @enderror

                                            <!-- Status -->
                                            <div class="mb-4 mt-4">
                                                <select name="verify_status"
                                                    class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                    required>
                                                    <option value="">Select Status</option>
                                                    <option value="active"
                                                        {{ old('verify_status') == 'active' ? 'selected' : '' }}>Active
                                                    </option>
                                                    <option value="pending"
                                                        {{ old('verify_status') == 'pending' ? 'selected' : '' }}>
                                                        Pending</option>
                                                    <option value="suspended"
                                                        {{ old('verify_status') == 'suspended' ? 'selected' : '' }}>
                                                        Suspended</option>
                                                </select>
                                                @error('verify_status')
                                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Form Actions -->
                                <div class="flex justify-end items-center gap-3 mt-8 pt-6 border-t border-gray-100">
                                    <button type="button"
                                        onclick="window.location='{{ route('admin.users.list') }}'"
                                        class="px-6 py-2.5 text-gray-600 hover:text-gray-800 transition-colors duration-200">
                                        Cancel
                                    </button>
                                    <button type="submit"
                                        class="px-6 py-2.5 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-100 transition-all duration-200">
                                        Create Corporate User
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Add this style section -->
                        <style>
                            .tab-button {
                                background-color: #f3f4f6;
                                color: #6b7280;
                            }

                            .active-tab {
                                background-color: #2563eb;
                                color: white;
                            }
                        </style>

                        <!-- Add this script section -->
                        <script>
                            function switchTab(tab) {
                                // Hide all forms
                                document.getElementById('individual-form').classList.add('hidden');
                                document.getElementById('corporate-form').classList.add('hidden');

                                // Remove active class from all tabs
                                document.querySelectorAll('.tab-button').forEach(button => {
                                    button.classList.remove('active-tab');
                                });

                                // Show selected form and activate tab
                                document.getElementById(`${tab}-form`).classList.remove('hidden');
                                document.getElementById(`${tab}-tab`).classList.add('active-tab');
                            }
                        </script>
                    </div>
                </main>
            </div>
        </div>
    </main>
</x-app-layout>
