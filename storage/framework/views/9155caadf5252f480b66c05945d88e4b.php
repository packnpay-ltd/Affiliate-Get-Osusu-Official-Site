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
                <header class="container full-container w-full text-sm py-5 xl:px-9 px-5">
                    <?php echo $__env->make('components.adminNavBar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </header>

                <main class="h-full overflow-y-auto max-w-full pt-4">
                    <div class="container mx-auto p-6 bg-white shadow-lg rounded-md">
                        <h2 class="text-lg font-semibold mb-4 text-gray-700">Support Tickets</h2>
                        <table class="min-w-full bg-white border border-gray-200 rounded-lg overflow-hidden">
                            <thead>
                                <tr class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                                    <th class="py-1 px-2 text-left">Username</th>
                                    <th class="py-1 px-2 text-left">Subject</th>
                                    <th class="py-1 px-2 text-center">Status</th>
                                    <th class="py-1 px-2 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm font-light">
                                <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                                        <td class="py-1 px-2 text-left whitespace-nowrap">
                                            <span class="font-medium text-gray-800"><?php echo e($ticket->user->name); ?></span>
                                        </td>
                                        <td class="py-1 px-2 text-left">
                                            <?php echo e($ticket->subject); ?>

                                        </td>
                                        <td class="py-1 px-2 text-center">
                                            <span class="px-2 py-1 text-sm rounded-full
                                                <?php echo e($ticket->status == 'open' ? 'bg-red-100 text-red-600' : ''); ?>

                                                <?php echo e($ticket->status == 'in progress' ? 'bg-yellow-100 text-yellow-600' : ''); ?>

                                                <?php echo e($ticket->status == 'resolved' ? 'bg-green-100 text-green-600' : ''); ?>">
                                                <?php echo e(ucfirst($ticket->status)); ?>

                                            </span>
                                        </td>
                                        <td class="py-1 px-2 text-center gap-4">
                                            <a href="<?php echo e(route('support_tickets.show', $ticket->id)); ?>"
                                               class="bg-blue-500 text-white py-1 px-3 rounded-md hover:bg-blue-600">
                                               View Ticket
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
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
<?php /**PATH C:\xampp\htdocs\Affiliate-Get-Osusu-Official-Site\resources\views\admin\support_tickets\index.blade.php ENDPATH**/ ?>