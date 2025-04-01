<x-app-layout>
    <main class="h-full overflow-y-auto max-w-full pt-4">
        <div class="container mx-auto max-w-2xl">
            <h4 class="text-gray-800 text-2xl font-semibold mb-6">
                {{ isset($coupon) ? 'Edit Coupon' : 'Create New Coupon' }}
            </h4>

            <form method="POST"
                action="{{ isset($coupon) ? route('admin.coupons.update', $coupon) : route('admin.coupons.store') }}"
                class="bg-white p-6 rounded-lg shadow"
            >
                @csrf
                @if(isset($coupon)) @method('PUT') @endif

                <div class="grid grid-cols-1 gap-6">
                    <!-- Coupon Type -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Coupon Type</label>
                        <select name="type" id="type" class="mt-1 block w-full rounded-lg border-gray-300" required
                            x-data="{ type: '{{ old('type', $coupon->type ?? 'percentage') }}' }"
                            x-model="type"
                        >
                            <option value="percentage">Percentage Discount</option>
                            <option value="fixed">Fixed Amount Discount</option>
                            <option value="free_shipping">Free Shipping</option>
                        </select>
                        @error('type')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Coupon Code -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Coupon Code</label>
                        <input type="text" name="code" id="code"
                            class="mt-1 block w-full rounded-lg border-gray-300 font-mono"
                            value="{{ old('code', $coupon->code ?? '') }}" required
                        >
                        @error('code')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Discount Fields -->
                    <div x-show="type === 'percentage'">
                        <label class="block text-sm font-medium text-gray-700">Discount Percentage</label>
                        <input type="number" step="0.01" min="1" max="100"
                            name="discount_percentage" id="discount_percentage"
                            class="mt-1 block w-full rounded-lg border-gray-300"
                            value="{{ old('discount_percentage', $coupon->discount_percentage ?? '') }}"
                        >
                        @error('discount_percentage')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div x-show="type === 'fixed'">
                        <label class="block text-sm font-medium text-gray-700">Fixed Amount</label>
                        <input type="number" step="0.01" min="1"
                            name="discount_fixed" id="discount_fixed"
                            class="mt-1 block w-full rounded-lg border-gray-300"
                            value="{{ old('discount_fixed', $coupon->discount_fixed ?? '') }}"
                        >
                        @error('discount_fixed')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Expiration -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Expiration Date</label>
                        <input type="datetime-local" name="expires_at" id="expires_at"
                            class="mt-1 block w-full rounded-lg border-gray-300"
                            value="{{ old('expires_at', isset($coupon) ? $coupon->expires_at->format('Y-m-d\TH:i') : '') }}"
                            min="{{ now()->format('Y-m-d\TH:i') }}"
                            required
                        >
                        @error('expires_at')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Usage Limits -->
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Maximum Uses</label>
                            <input type="number" min="1" name="max_uses" id="max_uses"
                                class="mt-1 block w-full rounded-lg border-gray-300"
                                value="{{ old('max_uses', $coupon->max_uses ?? '') }}"
                                placeholder="Leave empty for unlimited"
                            >
                            @error('max_uses')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Minimum Order</label>
                            <input type="number" step="0.01" min="0" name="minimum_order" id="minimum_order"
                                class="mt-1 block w-full rounded-lg border-gray-300"
                                value="{{ old('minimum_order', $coupon->minimum_order ?? '') }}"
                            >
                            @error('minimum_order')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Active Status -->
                    <div class="flex items-center space-x-2">
                        <input type="hidden" name="is_active" value="0"> <!-- Ensures a value is always sent -->
                        <input type="checkbox" name="is_active" id="is_active"
                               class="rounded border-gray-300 text-purple-600"
                               value="1"
                               {{ old('is_active', $coupon->is_active ?? true) ? 'checked' : '' }}>
                        <label for="is_active" class="text-sm text-gray-700">Active Coupon</label>
                    </div>

                    <!-- Single Use -->
                    <div class="flex items-center space-x-2 mt-4">
                        <input type="hidden" name="single_use" value="0"> <!-- Ensures a value is always sent -->
                        <input type="checkbox" name="single_use" id="single_use"
                               class="rounded border-gray-300 text-purple-600"
                               value="1"
                               {{ old('single_use', $coupon->single_use ?? false) ? 'checked' : '' }}>
                        <label for="single_use" class="text-sm text-gray-700">Single Use Only</label>
                    </div>
                </div>

                <div class="mt-6 flex justify-end gap-4">
                    <a href="{{ route('admin.coupons.index') }}"
                        class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300"
                    >
                        Cancel
                    </a>
                    <button type="submit"
                        class="px-6 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700"
                    >
                        {{ isset($coupon) ? 'Update Coupon' : 'Create Coupon' }}
                    </button>
                </div>
            </form>
        </div>
    </main>
</x-app-layout>