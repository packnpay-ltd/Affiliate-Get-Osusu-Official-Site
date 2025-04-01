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

                <main class="h-full overflow-y-auto max-w-full pt-4">
                    <div class="container mx-auto">
                        <h4 class="text-gray-600 text-lg font-semibold mb-6">Edit Installment Plan</h4>

                        <!-- Edit Form -->
                        <form action="<?php echo e(route('plans.update', $plan->id)); ?>" method="POST" class="bg-white shadow rounded-lg p-6">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Transaction ID -->
                                <div>
                                    <label for="transaction_id" class="block text-sm font-medium text-gray-700">Transaction ID</label>
                                    <input type="text" name="transaction_id" id="transaction_id" 
                                           value="<?php echo e(old('transaction_id', $plan->transaction_id)); ?>" readonly 
                                           class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <?php $__errorArgs = ['transaction_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-sm"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <!-- User ID -->
                                <div>
                                    <label for="user_id" class="block text-sm font-medium text-gray-700"><?php echo e($plan->users?->name ?? 'N/A'); ?></label>
                                    <input type="hidden" name="user_id" id="user_id" 
                                           value="<?php echo e(old('user_id', $plan->user_id)); ?>" 
                                           class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <?php $__errorArgs = ['user_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-sm"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <!-- Total Price -->
                                <div>
                                    <label for="all_total_price" class="block text-sm font-medium text-gray-700">Total Price</label>
                                    <input type="number" step="0.01" name="all_total_price" id="all_total_price" 
                                           value="<?php echo e(old('all_total_price', $plan->all_total_price)); ?>" 
                                           class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <?php $__errorArgs = ['all_total_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-sm"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <!-- Installment -->
                                <div>
                                    <label for="installment" class="block text-sm font-medium text-gray-700">Installment</label>
                                    <input type="number" name="installment" id="installment" 
                                           value="<?php echo e(old('installment', $plan->installment)); ?>" 
                                           class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <?php $__errorArgs = ['installment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-sm"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <!-- Status -->
                                <div>
                                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                                    <select name="status" id="status" 
                                            class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                        <option value="active" <?php echo e($plan->status == 'active' ? 'selected' : ''); ?>>Active</option>
                                        <option value="inactive" <?php echo e($plan->status == 'inactive' ? 'selected' : ''); ?>>Inactive</option>
                                    </select>
                                    <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-sm"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
                            <a href="<?php echo e(route('plans.index')); ?>" 
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
<?php /**PATH C:\xampp\htdocs\Affiliate-Get-Osusu-Official-Site\resources\views\admin\plans\edit.blade.php ENDPATH**/ ?>