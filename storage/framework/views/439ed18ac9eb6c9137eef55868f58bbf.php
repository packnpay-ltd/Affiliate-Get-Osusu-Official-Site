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

            <div class="w-full page-wrapper overflow-hidden">
                <header class="container w-full text-sm py-5 xl:px-9 px-5">
                    <?php echo $__env->make('components.adminNavBar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </header>

                <main class="h-full overflow-y-auto max-w-full pt-4 mb-8 px-44">
                    <div class="container mx-auto">

                    <h4 class="text-gray-600 text-lg font-semibold mb-6">Installment Plan Details</h4>

                    <!-- Plan Details Section -->
                    <div class="bg-white p-6 shadow rounded-lg">
                        <p><strong>Transaction ID:</strong> <?php echo e($plan->transaction_id); ?></p>
                        <p><strong>User ID:</strong> <?php echo e($plan->users?->name ?? 'N/A'); ?></p>
                        <p><strong>Total Price:</strong> ₦<?php echo e(number_format($plan->all_total_price, 2)); ?></p>
                        <p><strong>Installment:</strong> <?php echo e($plan->installment); ?></p>
                        <p><strong>Delivery Mode:</strong> <?php echo e($plan->delivery_mode); ?></p>
                        <p><strong>Deposit Percentage:</strong> <?php echo e($plan->deposit_percentage); ?>%</p>
                        <p><strong>Deposit Amount:</strong> ₦<?php echo e(number_format($plan->deposit_amount, 2)); ?></p>
                        <p><strong>Monthly Payment:</strong> ₦<?php echo e($plan->monthly_payment); ?></p>
                        <p><strong>Details:</strong> <?php echo ($plan->details); ?></p>
                        <p><strong>Status:</strong> <?php echo e(ucfirst($plan->status)); ?></p>

                        <!-- Back Button -->
                        <div class="mt-4">
                            <a href="<?php echo e(route('plans.index')); ?>" 
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
<?php /**PATH C:\xampp\htdocs\Affiliate-Get-Osusu-Official-Site\resources\views\admin\plans\show.blade.php ENDPATH**/ ?>