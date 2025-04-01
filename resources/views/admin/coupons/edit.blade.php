<x-app-layout>
    <main>
        <div id="main-wrapper" class="flex">
            @include('components.adminSideBar')

            <div class="w-full ">
                <!-- Header -->
                <header class="container w-full text-sm py-5 xl:px-9 px-5">
                    @include('components.adminNavBar')
                </header>

                <!-- Main Content -->
                <main class="h-full overflow-y-auto max-w-full pt-4">
                    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                        <!-- Page Header -->
                        <div class="flex justify-between items-center mb-6">
                            <h4 class="text-gray-800 text-2xl font-semibold">Edit Coupon</h4>
                        </div>

                        <!-- Form Container -->
                        <div class="bg-white rounded-lg shadow-md p-6 max-w-2xl mx-auto">
                            <form action="{{ route('admin.coupons.update', $coupon) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <!-- Coupon Code -->
                                <div class="mb-6">
                                    <label for="code" class="block text-sm font-medium text-gray-700">Coupon Code</label>
                                    <input type="text" name="code" id="code" value="{{ old('code', $coupon->code) }}"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('code') border-red-500 @enderror"
                                        required>
                                    @error('code')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Coupon Type -->
                                <div class="mb-6">
                                    <label for="type" class="block text-sm font-medium text-gray-700">Coupon Type</label>
                                    <select name="type" id="type"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('type') border-red-500 @enderror"
                                        required>
                                        <option value="percentage" {{ old('type', $coupon->type) == 'percentage' ? 'selected' : '' }}>Percentage</option>
                                        <option value="fixed" {{ old('type', $coupon->type) == 'fixed' ? 'selected' : '' }}>Fixed Amount</option>
                                        <option value="free_shipping" {{ old('type', $coupon->type) == 'free_shipping' ? 'selected' : '' }}>Free Shipping</option>
                                    </select>
                                    @error('type')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Discount Percentage (Conditional) -->
                                <div class="mb-6" id="discount_percentage_group" style="{{ old('type', $coupon->type) != 'percentage' ? 'display: none;' : '' }}">
                                    <label for="discount_percentage" class="block text-sm font-medium text-gray-700">Discount Percentage</label>
                                    <input type="number" step="0.01" name="discount_percentage" id="discount_percentage" value="{{ old('discount_percentage', $coupon->discount_percentage) }}"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('discount_percentage') border-red-500 @enderror">
                                    @error('discount_percentage')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Discount Fixed Amount (Conditional) -->
                                <div class="mb-6" id="discount_fixed_group" style="{{ old('type', $coupon->type) != 'fixed' ? 'display: none;' : '' }}">
                                    <label for="discount_fixed" class="block text-sm font-medium text-gray-700">Discount Fixed Amount</label>
                                    <input type="number" step="0.01" name="discount_fixed" id="discount_fixed" value="{{ old('discount_fixed', $coupon->discount_fixed) }}"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('discount_fixed') border-red-500 @enderror">
                                    @error('discount_fixed')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Expiration Date -->
                                <div class="mb-6">
                                    <label for="expires_at" class="block text-sm font-medium text-gray-700">Expiration Date</label>
                                    <input type="datetime-local" name="expires_at" id="expires_at" value="{{ old('expires_at', $coupon->expires_at->format('Y-m-d\TH:i')) }}"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('expires_at') border-red-500 @enderror"
                                        required>
                                    @error('expires_at')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Maximum Uses -->
                                <div class="mb-6">
                                    <label for="max_uses" class="block text-sm font-medium text-gray-700">Maximum Uses (Leave blank for unlimited)</label>
                                    <input type="number" name="max_uses" id="max_uses" value="{{ old('max_uses', $coupon->max_uses) }}"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('max_uses') border-red-500 @enderror">
                                    @error('max_uses')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Minimum Order Amount -->
                                <div class="mb-6">
                                    <label for="minimum_order" class="block text-sm font-medium text-gray-700">Minimum Order Amount</label>
                                    <input type="number" step="0.01" name="minimum_order" id="minimum_order" value="{{ old('minimum_order', $coupon->minimum_order) }}"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('minimum_order') border-red-500 @enderror">
                                    @error('minimum_order')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Active Status -->
                                <div class="mb-6">
                                    <div class="flex items-center">
                                        <input type="checkbox" name="is_active" id="is_active" {{ old('is_active', $coupon->is_active) ? 'checked' : '' }}
                                            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                        <label for="is_active" class="ml-2 block text-sm text-gray-900">Active</label>
                                    </div>
                                </div>

                                <!-- Single Use -->
                                <div class="mb-6">
                                    <div class="flex items-center">
                                        <input type="checkbox" name="single_use" id="single_use" {{ old('single_use', $coupon->single_use) ? 'checked' : '' }}
                                            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                        <label for="single_use" class="ml-2 block text-sm text-gray-900">Single Use</label>
                                    </div>
                                </div>

                                <!-- Form Actions -->
                                <div class="flex justify-end space-x-4">
                                    <a href="{{ route('admin.coupons.index') }}"
                                        class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Cancel
                                    </a>
                                    <button type="submit"
                                        class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Update Coupon
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </main>

    <!-- JavaScript to Toggle Discount Fields -->
    <script>
        document.getElementById('type').addEventListener('change', function() {
            const type = this.value;
            document.getElementById('discount_percentage_group').style.display = type === 'percentage' ? 'block' : 'none';
            document.getElementById('discount_fixed_group').style.display = type === 'fixed' ? 'block' : 'none';
        });
    </script>
</x-app-layout>