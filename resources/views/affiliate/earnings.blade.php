<x-app-layout>
    <div class="flex">
        @include('components.userSidebar')

        <main class="flex-1 bg-gray-100 lg:ml-0">
            <div class="px-6 py-8">
                <h1 class="text-2xl font-bold text-gray-900 mb-6">Earnings</h1>

                <!-- Earnings Overview -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-sm text-gray-600">Wallet Balance</h3>
                        <p class="text-2xl font-bold">₦{{ number_format($wallet->balance ?? 0, 2) }}</p>
                    </div>
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-sm text-gray-600">Total Affiliate Earnings</h3>
                        <p class="text-2xl font-bold">₦{{ number_format($totalEarnings, 2) }}</p>
                    </div>
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-sm text-gray-600">Pending Earnings</h3>
                        <p class="text-2xl font-bold">₦{{ number_format($pendingEarnings, 2) }}</p>
                    </div>
                </div>

                <!-- Earnings History -->
                <div class="bg-white rounded-lg shadow">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-lg font-semibold">Earnings History</h2>
                            <button class="bg-purple-600 text-white px-4 py-2 rounded-md">Withdraw to Wallet</button>
                        </div>
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Description</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Amount</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse($earnings as $earning)
                                    <tr>
                                        <td class="px-6 py-4 text-sm text-gray-900">{{ $earning->description }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-500">{{ $earning->created_at->format('M d, Y') }}</td>
                                        <td class="px-6 py-4 text-sm">
                                            <span class="px-2 py-1 text-xs font-semibold rounded-full
                                                {{ $earning->status === 'approved' ? 'bg-green-100 text-green-800' :
                                                   ($earning->status === 'pending' ? 'bg-yellow-100 text-yellow-800' :
                                                   'bg-red-100 text-red-800') }}">
                                                {{ ucfirst($earning->status) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-900 text-right">₦{{ number_format($earning->amount, 2) }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="px-6 py-4 text-sm text-gray-500 text-center" colspan="4">No earnings yet</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>
