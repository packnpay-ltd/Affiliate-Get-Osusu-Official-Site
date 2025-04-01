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
    <main>
        <div id="main-wrapper" class="flex">
            <?php echo $__env->make('components.adminSideBar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="w-full ">

                <!-- Header -->
                <header class="container w-full text-sm py-5 xl:px-9 px-5">
                    <?php echo $__env->make('components.adminNavBar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </header>

                <!-- Main Content -->
                <main class="h-full overflow-y-auto max-w-full pt-4">
                    <div class="container mx-auto">
                        <div class="flex justify-between items-center mb-6">
                            <h4 class="text-gray-800 text-2xl font-semibold">Coupon Management</h4>
                            <a href="<?php echo e(route('admin.coupons.create')); ?>" class="px-6 py-3 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition">
                                + Create New Coupon
                            </a>
                        </div>

                        <!-- Coupon Search and Filters -->
                        <form method="GET" action="<?php echo e(route('admin.coupons.index')); ?>" class="mb-6 bg-white p-4 rounded-lg shadow">
                            <div class="flex gap-4 items-center flex-wrap">
                                <input
                                    type="text"
                                    name="search"
                                    value="<?php echo e(request('search')); ?>"
                                    class="p-3 w-64 border border-gray-300 rounded-lg"
                                    placeholder="Search by code"
                                />
                                <select name="type" class="p-3 border border-gray-300 rounded-lg">
                                    <option value="">All Types</option>
                                    <option value="percentage" <?php echo e(request('type') == 'percentage' ? 'selected' : ''); ?>>Percentage</option>
                                    <option value="fixed" <?php echo e(request('type') == 'fixed' ? 'selected' : ''); ?>>Fixed Amount</option>
                                    <option value="free_shipping" <?php echo e(request('type') == 'free_shipping' ? 'selected' : ''); ?>>Free Shipping</option>
                                </select>
                                <select name="status" class="p-3 border border-gray-300 rounded-lg">
                                    <option value="">All Statuses</option>
                                    <option value="active" <?php echo e(request('status') == 'active' ? 'selected' : ''); ?>>Active</option>
                                    <option value="expired" <?php echo e(request('status') == 'expired' ? 'selected' : ''); ?>>Expired</option>
                                    <option value="redeemed" <?php echo e(request('status') == 'redeemed' ? 'selected' : ''); ?>>Redeemed</option>
                                </select>
                                <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                                    Filter
                                </button>
                                <a href="<?php echo e(route('admin.coupons.index')); ?>" class="px-6 py-3 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">
                                    Reset
                                </a>
                            </div>
                        </form>

                        <!-- Coupons Table -->
                        <div class="overflow-x-auto shadow rounded-lg bg-white">
                            <table class="table-auto w-full border-collapse">
                                <thead class="bg-blue-50">
                                    <tr>
                                        <th class="px-4 py-3 text-left font-medium">Code</th>
                                        <th class="px-4 py-3 text-left font-medium">Discount</th>
                                        <th class="px-4 py-3 text-left font-medium">Expires At</th>
                                        <th class="px-4 py-3 text-left font-medium">Usage</th>
                                        <th class="px-4 py-3 text-left font-medium">Status</th>
                                        <th class="px-4 py-3 text-left font-medium">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr class="hover:bg-gray-50 border-t">
                                            <td class="px-4 py-3 font-mono"><?php echo e($coupon->code); ?></td>
                                            <td class="px-4 py-3">
                                                <?php if($coupon->type === 'percentage'): ?>
                                                    <?php echo e($coupon->discount_percentage); ?>%
                                                <?php elseif($coupon->type === 'fixed'): ?>
                                                    $<?php echo e(number_format($coupon->discount_fixed, 2)); ?>

                                                <?php else: ?>
                                                    Free Shipping
                                                <?php endif; ?>
                                            </td>
                                            <td class="px-4 py-3"><?php echo e($coupon->expires_at->format('M d, Y H:i')); ?></td>
                                            <td class="px-4 py-3">
                                                <?php echo e($coupon->used_count); ?> / <?php echo e($coupon->max_uses ?? '∞'); ?>

                                            </td>
                                            <td class="px-4 py-3">
                                                <span class="px-2 py-1 rounded-full text-sm
                                                    <?php if($coupon->status === 'Active'): ?> bg-green-100 text-green-800
                                                    <?php elseif($coupon->status === 'Expired'): ?> bg-red-100 text-red-800
                                                    <?php else: ?> bg-yellow-100 text-yellow-800 <?php endif; ?>">
                                                    <?php echo e($coupon->status); ?>

                                                </span>
                                            </td>
                                            <td class="px-4 py-3 flex gap-3">
                                                <a href="<?php echo e(route('admin.coupons.edit', $coupon)); ?>" class="text-blue-600 hover:text-blue-800">
                                                    Edit
                                                </a>
                                                <a href="<?php echo e(route('admin.coupons.show', $coupon)); ?>" class="text-gray-600 hover:text-gray-800">
                                                    Preview
                                                </a>
                                                <form action="<?php echo e(route('admin.coupons.destroy', $coupon)); ?>" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="text-red-600 hover:text-red-800"
                                                        onclick="return confirm('Delete this coupon permanently?')">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="6" class="px-4 py-3 text-center text-gray-700">No coupons found</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <div class="mt-6">
                            <?php echo e($coupons->links()); ?>

                        </div>
                    </div>
                </main>
            </div>
        </div>
    </main>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\Affiliate-Get-Osusu-Official-Site\resources\views\admin\coupons\index.blade.php ENDPATH**/ ?>