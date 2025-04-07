<x-app-layout>
    <div class="flex">
        @include('components.userSidebar')

        <main class="flex-1 bg-gray-100 lg:ml-0">
            <div class="px-6 py-8">
                <h1 class="text-2xl font-bold text-gray-900 mb-6">My Referrals</h1>

                <!-- Referral Stats -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-sm text-gray-600">Total Referrals</h3>
                        <p class="text-2xl font-bold">{{ $referrals->count() }}</p>
                    </div>
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-sm text-gray-600">Active Referrals</h3>
                        <p class="text-2xl font-bold">{{ $referrals->where('status', 'active')->count() }}</p>
                    </div>
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-sm text-gray-600">Conversion Rate</h3>
                        <p class="text-2xl font-bold">{{ $referrals->count() > 0 ? number_format(($referrals->where('status', 'active')->count() / $referrals->count()) * 100, 2) : 0 }}%</p>
                    </div>
                </div>

                <!-- Referrals Table -->
                <div class="bg-white rounded-lg shadow">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-lg font-semibold">Referral History</h2>
                            <div class="flex gap-2">
                                <select class="border rounded-md px-3 py-1">
                                    <option>All Time</option>
                                    <option>This Month</option>
                                    <option>Last Month</option>
                                </select>
                                <button class="bg-purple-600 text-white px-4 py-1 rounded-md">Export</button>
                            </div>
                        </div>
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Commission</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse($referrals as $referral)
                                    <tr>
                                        <td class="px-6 py-4 text-sm text-gray-500">{{ $referral->created_at->format('M d, Y') }}</td>
                                        <td class="px-6 py-4 text-sm">
                                            <span class="px-2 py-1 text-xs font-semibold rounded-full
                                                {{ $referral->status === 'active' ? 'bg-green-100 text-green-800' :
                                                   ($referral->status === 'pending' ? 'bg-yellow-100 text-yellow-800' :
                                                   'bg-red-100 text-red-800') }}">
                                                {{ ucfirst($referral->status) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-900 text-right">₦{{ number_format($referral->earnings->sum('amount'), 2) }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="px-6 py-4 text-sm text-gray-500 text-center" colspan="4">No referrals yet</td>
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
