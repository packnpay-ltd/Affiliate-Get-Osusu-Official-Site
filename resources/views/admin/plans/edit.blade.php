<x-app-layout>
    <main>
        <div id="main-wrapper" class="flex">

            <div class="w-full page-wrapper overflow-hidden">
                <header class="container w-full text-sm py-5 xl:px-9 px-5">
                    @include('components.adminNavBar')
                </header>

                <main class="h-full overflow-y-auto max-w-full pt-4">
                    <div class="container mx-auto">
                        <h4 class="text-gray-600 text-lg font-semibold mb-6">Edit Installment Plan</h4>

                        <!-- Edit Form -->
                        <form action="{{ route('plans.update', $plan->id) }}" method="POST" class="bg-white shadow rounded-lg p-6">
                            @csrf
                            @method('PUT')

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Transaction ID -->
                                <div>
                                    <label for="transaction_id" class="block text-sm font-medium text-gray-700">Transaction ID</label>
                                    <input type="text" name="transaction_id" id="transaction_id" 
                                           value="{{ old('transaction_id', $plan->transaction_id) }}" readonly 
                                           class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    @error('transaction_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>

                                <!-- User ID -->
                                <div>
                                    <label for="user_id" class="block text-sm font-medium text-gray-700">{{ $plan->users?->name ?? 'N/A' }}</label>
                                    <input type="hidden" name="user_id" id="user_id" 
                                           value="{{ old('user_id', $plan->user_id) }}" 
                                           class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    @error('user_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>

                                <!-- Total Price -->
                                <div>
                                    <label for="all_total_price" class="block text-sm font-medium text-gray-700">Total Price</label>
                                    <input type="number" step="0.01" name="all_total_price" id="all_total_price" 
                                           value="{{ old('all_total_price', $plan->all_total_price) }}" 
                                           class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    @error('all_total_price') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>

                                <!-- Installment -->
                                <div>
                                    <label for="installment" class="block text-sm font-medium text-gray-700">Installment</label>
                                    <input type="number" name="installment" id="installment" 
                                           value="{{ old('installment', $plan->installment) }}" 
                                           class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    @error('installment') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>

                                <!-- Status -->
                                <div>
                                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                                    <select name="status" id="status" 
                                            class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                        <option value="active" {{ $plan->status == 'active' ? 'selected' : '' }}>Active</option>
                                        <option value="inactive" {{ $plan->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    @error('status') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="mt-6 flex justify-end">
                                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition duration-300">
                                    Update Plan
                                </button>
                            </div>
                              <!-- Back Button -->
                        <div class="mt-4">
                            <a href="{{ route('plans.index') }}" 
                               class="px-4 py-2 bg-gray-600 text-white rounded-lg shadow hover:bg-red-700 transition duration-300">
                                Back to Plans
                            </a>
                        </div>
                        </form>
                    </div>
                </main>
            </div>
        </div>
    </main>
</x-app-layout>
