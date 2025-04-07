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
                <h1 class="text-2xl font-bold text-gray-900 mb-6">Earnings</h1>

                <!-- Earnings Overview -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-sm text-gray-600">Wallet Balance</h3>
                        <p class="text-2xl font-bold">₦<?php echo e(number_format($wallet->balance ?? 0, 2)); ?></p>
                    </div>
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-sm text-gray-600">Total Affiliate Earnings</h3>
                        <p class="text-2xl font-bold">₦<?php echo e(number_format($totalEarnings, 2)); ?></p>
                    </div>
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-sm text-gray-600">Pending Earnings</h3>
                        <p class="text-2xl font-bold">₦<?php echo e(number_format($pendingEarnings, 2)); ?></p>
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
                                <?php $__empty_1 = true; $__currentLoopData = $earnings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $earning): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td class="px-6 py-4 text-sm text-gray-900"><?php echo e($earning->description); ?></td>
                                        <td class="px-6 py-4 text-sm text-gray-500"><?php echo e($earning->created_at->format('M d, Y')); ?></td>
                                        <td class="px-6 py-4 text-sm">
                                            <span class="px-2 py-1 text-xs font-semibold rounded-full
                                                <?php echo e($earning->status === 'approved' ? 'bg-green-100 text-green-800' :
                                                   ($earning->status === 'pending' ? 'bg-yellow-100 text-yellow-800' :
                                                   'bg-red-100 text-red-800')); ?>">
                                                <?php echo e(ucfirst($earning->status)); ?>

                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-900 text-right">₦<?php echo e(number_format($earning->amount, 2)); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td class="px-6 py-4 text-sm text-gray-500 text-center" colspan="4">No earnings yet</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\Affiliate-Get-Osusu-Official-Site\resources\views\affiliate\earnings.blade.php ENDPATH**/ ?>