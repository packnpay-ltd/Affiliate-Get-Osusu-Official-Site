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
    <!--start the project-->
    <div id="main-wrapper" class=" flex">
            <?php echo $__env->make('components.adminSideBar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class=" w-full page-wrapper overflow-hidden">

            <!--  Header Start -->
            <header class="container full-container w-full text-sm py-5 xl:px-9 px-5">


                <!-- ========== HEADER ========== -->

            <?php echo $__env->make('components.adminNavBar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <!-- ========== END HEADER ========== -->
            </header>
            <!--  Header End -->

            <!-- Main Content -->
            <main class="h-full overflow-y-auto  max-w-full  pt-4">

    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6 px-8">
        <!-- Total Users -->
        <div class="p-4 bg-white rounded-lg shadow">
            <h3 class="text-lg font-medium">Total Waitlist Users</h3>
            <p class="text-2xl font-semibold text-blue-600"><?php echo e($totalWaitlist); ?></p>
        </div>
 
    </div>


                <div class="container full-container py-2 flex flex-col gap-6">
                    <div class="grid grid-cols-1  lg:gap-x-6 gap-x-0 lg:gap-y-0 gap-y-6">
                        <div class="col-span-2">
                            <div class="card h-full">
                                <div class="card-body">
                                    <h4 class="text-gray-600 text-lg font-semibold mb-6">Recent Waitlist</h4>
                                    <div class="relative overflow-x-auto">
                                 <!-- Table -->
                                <table class="text-left w-full whitespace-nowrap text-sm">
                                    <thead class="text-gray-700">
                                        <tr class="font-semibold text-gray-600">
                                            <th scope="col" class="p-2">Full Name</th>
                                            <th scope="col" class="p-2">Email</th>
                                            <th scope="col" class="p-2">Phone Number</th>
                                            <th scope="col" class="p-2">Registered</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $waitlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td class="p-2">
                                                <div class="flex flex-col gap-1">
                                                    <h3 class="font-semibold text-gray-600"><?php echo e($data->first_name); ?></h3>
                                                    <span class="font-normal text-gray-500"><?php echo e($data->last_name); ?></span>
                                                </div>
                                            </td>
                                            <td class="p-2">
                                                <span class="font-normal text-gray-500"><?php echo e($data->email); ?></span>
                                            </td>
                                            <td class="p-2">
                                                <span class="font-semibold text-base text-gray-600"><?php echo e($data->phone_number); ?></span>
                                            </td>
                                            <td class="p-2">
                                            <span class="font-semibold text-base text-gray-600">
                                                <?php echo e($data->created_at->diffForHumans()); ?>

                                            </span>
                                        </td>

                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="5" class="p-4 text-center text-gray-500">No Wishlist found</td>
                                        </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                                
                                <!-- Pagination Links -->
                                <div class="mt-4">
                                    <?php echo e($waitlist->links()); ?>

                                </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <footer>
                        <p class="text-base text-gray-500 font-normal p-3 text-center">
                            Design and Developed by <a href="/"
                                class="text-blue-600 underline hover:text-blue-700">GetOsusu</a>
                        </p>
                    </footer>
                </div>


            </main>
            <!-- Main Content End -->
 
        </div>
    </div>
    <!--end of project-->
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
<?php /**PATH C:\xampp\htdocs\Affiliate-Get-Osusu-Official-Site\resources\views\admin\waitlist.blade.php ENDPATH**/ ?>