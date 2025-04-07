<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="flex">
        <?php echo $__env->make('components.userSidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <main class="flex-1 bg-gray-100 lg:ml-0">
            <div class="px-6 py-8">
                <h1 class="text-2xl font-bold text-gray-900 mb-6">Affiliate Overview</h1>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-sm text-gray-600">Total Referrals</h3>
                        <p class="text-2xl font-bold"><?php echo e($totalReferrals); ?></p>
                    </div>
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-sm text-gray-600">Active Referrals</h3>
                        <p class="text-2xl font-bold"><?php echo e($activeReferrals); ?></p>
                    </div>
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-sm text-gray-600">Conversion Rate</h3>
                        <p class极text-2xl font-bold"><?php echo e(number_format($conversionRate, 2)); ?>%</p>
                    </div>
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-sm text-gray-600">Total Earnings</h3>
                        <p class="text-2xl font-bold">₦<?php echo e(number_format($totalEarnings, 2)); ?></p>
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
                            <p class="text-2xl font-bold">₦<?php echo e(number_format($pendingEarnings, 2)); ?></p>
                        </div>
                        <div class="p-4 border rounded-lg">
                            <h3 class="text-sm text-gray-600">Approved Earnings</h3>
                            <p class="text-2xl font-bold">₦<?php echo e(number_format($approvedEarnings, 2)); ?></p>
                        </div>
                        <div class="p-4 border rounded-lg">
                            <h3 class="text-sm text-gray-600">Withdrawn Earnings</h3>
                            <p class="text-2xl font-bold">₦<?php echo e(number_format($withdrawnEarnings, 2)); ?></p>
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
                                <?php $__empty_1 = true; $__currentLoopData = $recentEarnings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $earning): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td class="px-6 py-4 text-sm text-gray-500"><?php echo e($earning->created_at->format('M d, Y')); ?></td>
                                        <td class="px-6 py-4 text-sm text-gray-900"><?php echo e($earning->description); ?></td>
                                        <td class="px-6 py-4 text-sm text-gray-900 text-right">₦<?php echo e(number_format($earning->amount, 2)); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td class="px-6 py-4 text-sm text-gray-500 text-center" colspan="3">No recent earnings</td>
                                    </tr>
                                <?php endif; ?>
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
                                <?php $__empty_1 = true; $__currentLoopData = $recentReferrals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $referral): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td class="px-6 py-4 text-sm text-gray-500"><?php echo e($referral->created_at->format('M d, Y')); ?></td>
                                        <td class="px-6 py-4 text-sm text-gray-900"><?php echo e($referral->referredUser->name ?? 'Unknown User'); ?></td>
                                        <td class="px-6 py-4 text-sm text-gray-900 text-right">
                                            <span class="px-2 py-1 text-xs font-semibold rounded-full
                                                <?php echo e($referral->status === 'active' ? 'bg-green-100 text-green-800' :
                                                   ($referral->status === 'pending' ? 'bg-yellow-100 text-yellow-800' :
                                                   'bg-red-100 text-red-800')); ?>">
                                                <?php echo e(ucfirst($referral->status)); ?>

                                            </span>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td class="px-6 py-4 text-sm text-gray-500 text-center" colspan="3">No recent referrals</td>
                                    </tr>
                                <?php endif; ?>
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
                    labels: <?php echo json_encode($chartLabels, 15, 512) ?>, // Use the labels from the controller
                    datasets: [{
                        label: 'Referrals',
                        data: <?php echo json_encode($referralData, 15, 512) ?>, // Use the referral data from the controller
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }, {
                        label: 'Earnings',
                        data: <?php echo json_encode($earningData, 15, 512) ?>, // Use the earning data from the controller
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
            console.log('Chart Labels:', <?php echo json_encode($chartLabels, 15, 512) ?>);
            console.log('Referral Data:', <?php echo json_encode($referralData, 15, 512) ?>);
            console.log('Earning Data:', <?php echo json_encode($earningData, 15, 512) ?>);
        });
    </script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\Affiliate-Get-Osusu-Official-Site\resources\views\affiliate\overview.blade.php ENDPATH**/ ?>