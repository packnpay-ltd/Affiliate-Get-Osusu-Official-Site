<x-app-layout>
    <div class="flex">
        @include('components.userSidebar')

        <main class="flex-1 bg-gray-100 lg:ml-0">
            <div class="px-6 py-8">
                <h1 class="text-2xl font-bold text-gray-900 mb-6">Affiliate Overview</h1>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-sm text-gray-600">Total Referrals</h3>
                        <p class="text-2xl font-bold">{{ $totalReferrals }}</p>
                    </div>
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-sm text-gray-600">Active Referrals</h3>
                        <p class="text-2xl font-bold">{{ $activeReferrals }}</p>
                    </div>
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-sm text-gray-600">Conversion Rate</h3>
                        <p class极text-2xl font-bold">{{ number_format($conversionRate, 2) }}%</p>
                    </div>
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-sm text-gray-600">Total Earnings</h3>
                        <p class="text-2xl font-bold">₦{{ number_format($totalEarnings, 2) }}</p>
                    </div>
                </div>

                <!-- Performance Chart -->
                <div class="bg-white rounded-lg shadow p-6 mb-8">
                    <h2 class="text-lg font-semibold mb-4">Performance Overview</h2>
                    <div class="h-64">
                        <canvas id="performanceChart"></canvas>
                    </div>
                </div>

                <!-- Earnings Breakdown -->
                <div class="bg-white rounded-lg shadow p-6 mb-8">
                    <h2 class="text-lg font-semibold mb-4">Earnings Breakdown</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div class="p-4 border rounded-lg">
                            <h3 class="text-sm text-gray-600">Pending Earnings</h3>
                            <p class="text-2xl font-bold">₦{{ number_format($pendingEarnings, 2) }}</p>
                        </div>
                        <div class="p-4 border rounded-lg">
                            <h3 class="text-sm text-gray-600">Approved Earnings</h3>
                            <p class="text-2xl font-bold">₦{{ number_format($approvedEarnings, 2) }}</p>
                        </div>
                        <div class="p-4 border rounded-lg">
                            <h3 class="text-sm text-gray-600">Withdrawn Earnings</h3>
                            <p class="text-2xl font-bold">₦{{ number_format($withdrawnEarnings, 2) }}</p>
                        </极div>
                    </div>
                </div>

                <!-- Earning and Referral Activities -->
                <div class="bg-white rounded-lg shadow p-6 mb-8">
                    <h2 class="text-lg font-semibold mb-4">Recent Activities</h2>

                    <!-- Earnings Table -->
                    <div class="mb-8">
                        <h3 class="text-md font-semibold mb-4">Recent Earnings</h3>
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Description</th>
                                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Amount</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse($recentEarnings as $earning)
                                    <tr>
                                        <td class="px-6 py-4 text-sm text-gray-500">{{ $earning->created_at->format('M d, Y') }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-900">{{ $earning->description }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-900 text-right">₦{{ number_format($earning->amount, 2) }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="px-6 py-4 text-sm text-gray-500 text-center" colspan="3">No recent earnings</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Referrals Table -->
                    <div>
                        <h3 class="text-md font-semibold mb-4">Recent Referrals</h3>
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray极500 uppercase">Date</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Referred User</th>
                                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse($recentReferrals as $referral)
                                    <tr>
                                        <td class="px-6 py-4 text-sm text-gray-500">{{ $referral->created_at->format('M d, Y') }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-900">{{ $referral->referredUser->name ?? 'Unknown User' }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-900 text-right">
                                            <span class="px-2 py-1 text-xs font-semibold rounded-full
                                                {{ $referral->status === 'active' ? 'bg-green-100 text-green-800' :
                                                   ($referral->status === 'pending' ? 'bg-yellow-100 text-yellow-800' :
                                                   'bg-red-100 text-red-800') }}">
                                                {{ ucfirst($referral->status) }}
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="px-6 py-4 text-sm text-gray-500 text-center" colspan="3">No recent referrals</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Initialize the Chart -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('performanceChart').getContext('2d');
            const performanceChart = new Chart(ctx, {
                type: 'line', // You can change this to 'bar', 'pie', etc.
                data: {
                    labels: @json($chartLabels), // Use the labels from the controller
                    datasets: [{
                        label: 'Referrals',
                        data: @json($referralData), // Use the referral data from the controller
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }, {
                        label: 'Earnings',
                        data: @json($earningData), // Use the earning data from the controller
                        backgroundColor: 'rgba(153, 102, 255, 0.2)',
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    responsive: true,
                    maintainAspectRatio: false
                }
            });

            // Debugging: Log the data being passed to the chart
            console.log('Chart Labels:', @json($chartLabels));
            console.log('Referral Data:', @json($referralData));
            console.log('Earning Data:', @json($earningData));
        });
    </script>
</x-app-layout>