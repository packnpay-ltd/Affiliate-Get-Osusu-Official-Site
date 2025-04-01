<x-app-layout>
    <main>
        <div id="main-wrapper" class="flex">

            <div class="w-full page-wrapper overflow-hidden">
                <header class="container w-full text-sm py-5 xl:px-9 px-5">
                    @include('components.adminNavBar')
                </header>

                <main class="h-full overflow-y-auto max-w-full pt-4 mb-8 px-44">
                    <div class="container mx-auto">

                    <h4 class="text-gray-600 text-lg font-semibold mb-6">Installment Plan Details</h4>

                    <!-- Plan Details Section -->
                    <div class="bg-white p-6 shadow rounded-lg">
                        <p><strong>Transaction ID:</strong> {{ $plan->transaction_id }}</p>
                        <p><strong>User ID:</strong> {{ $plan->users?->name ?? 'N/A' }}</p>
                        <p><strong>Total Price:</strong> ₦{{ number_format($plan->all_total_price, 2) }}</p>
                        <p><strong>Installment:</strong> {{ $plan->installment }}</p>
                        <p><strong>Delivery Mode:</strong> {{ $plan->delivery_mode }}</p>
                        <p><strong>Deposit Percentage:</strong> {{ $plan->deposit_percentage }}%</p>
                        <p><strong>Deposit Amount:</strong> ₦{{ number_format($plan->deposit_amount, 2) }}</p>
                        <p><strong>Monthly Payment:</strong> ₦{{ $plan->monthly_payment }}</p>
                        <p><strong>Details:</strong> {!! ($plan->details) !!}</p>
                        <p><strong>Status:</strong> {{ ucfirst($plan->status) }}</p>

                        <!-- Back Button -->
                        <div class="mt-4">
                            <a href="{{ route('plans.index') }}" 
                               class="px-4 py-2 bg-gray-600 text-white rounded-lg shadow hover:bg-gray-700 transition duration-300">
                                Back to Plans
                            </a>
                        </div>
                    </div>

                </div>
            </main>
            </div>
        </div>
    </main>
</x-app-layout>
