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
                <header class="container w-full text-sm py-5 xl:px-9 px-5">
                    <?php echo $__env->make('components.adminNavBar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </header>

                <main class="h-full overflow-y-auto max-w-full pt-4 mb-8">
                    <div class="container mx-auto">
                        <h4 class="text-gray-600 text-lg font-semibold mb-6">Savings Plans Management</h4>



                        <!-- Plans Table -->
                        <div class="overflow-x-auto shadow rounded-lg bg-white">
                            <table class="table-auto w-full border-collapse">
                                <thead>
                                    <tr class="bg-gray-100">
                                        <th class="border px-4 py-2 text-left">Plan ID</th>
                                        <th class="border px-4 py-2 text-left">User ID</th>
                                        <th class="border px-4 py-2 text-left">Installment</th>
                                        <th class="border px-4 py-2 text-left">Total Price</th>
                                        <th class="border px-4 py-2 text-left">Created At</th>
                                        <th class="border px-4 py-2 text-left">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="hover:bg-gray-50">
                                            <td class="border px-4 py-2"><?php echo e($plan->transaction_id); ?></td>
                                            <td class="border px-4 py-2"><?php echo e($plan->users?->name ?? 'N/A'); ?></td>
                                            <td class="border px-4 py-2"><?php echo e($plan->installment); ?> Months</td>
                                            <td class="border px-4 py-2">₦<?php echo e(number_format($plan->all_total_price, 2)); ?></td>
                                            <td class="border px-4 py-2">
                                                <?php echo e($plan->created_at->diffForHumans()); ?>

                                            </td>
                                            <td class="border px-4 py-2">
                                                <a href="<?php echo e(route('plans.show', $plan->id)); ?>"
                                                   class="text-green-600 hover:text-green-800 font-medium transition duration-200">
                                                    View
                                                </a>
                                                <a href="<?php echo e(route('plans.edit', $plan->id)); ?>"
                                                   class="text-blue-600 hover:text-blue-800 font-medium transition duration-200 ml-2">
                                                    Edit
                                                </a>
                                                <form action="<?php echo e(route('plans.destroy', $plan->id)); ?>" method="POST" style="display:inline;">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="text-red-600 hover:text-red-800 font-medium transition duration-200 ml-2">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <div class="mt-4">
                            <?php echo e($plans->links()); ?>

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
<?php /**PATH C:\xampp\htdocs\Affiliate-Get-Osusu-Official-Site\resources\views\admin\plans\index.blade.php ENDPATH**/ ?>