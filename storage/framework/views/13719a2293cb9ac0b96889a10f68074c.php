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
                    <!-- Stats cards from the dashboard -->
                    <!-- You can copy them from the dashboard.blade.php file -->
                </div>

                <!-- Performance Chart -->
                <div class="bg-white rounded-lg shadow p-6 mb-8">
                    <h2 class="text-lg font-semibold mb-4">Performance Overview</h2>
                    <div class="h-64 flex items-center justify-center bg-gray-50">
                        <p class="text-gray-500">Chart will be implemented here</p>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-lg font-semibold mb-4">Quick Actions</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <a href="#" class="block p-4 border rounded-lg hover:bg-purple-50">
                            <h3 class="font-semibold mb-2">Share Referral Link</h3>
                            <p class="text-sm text-gray-600">Quick share your referral link</p>
                        </a>
                        <a href="#" class="block p-4 border rounded-lg hover:bg-purple-50">
                            <h3 class="font-semibold mb-2">Download Marketing Kit</h3>
                            <p class="text-sm text-gray-600">Access marketing materials</p>
                        </a>
                        <a href="#" class="block p-4 border rounded-lg hover:bg-purple-50">
                            <h3 class="font-semibold mb-2">View Tutorials</h3>
                            <p class="text-sm text-gray-600">Learn how to maximize earnings</p>
                        </a>
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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\Affiliate-Get-Osusu-Official-Site\resources\views\affiliate\overview.blade.php ENDPATH**/ ?>