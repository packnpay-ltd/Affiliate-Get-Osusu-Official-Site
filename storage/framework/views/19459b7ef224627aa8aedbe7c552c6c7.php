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

        <div class=" w-full ">

            <!--  Header Start -->
            <header class="container full-container w-full text-sm py-5 xl:px-9 px-5">


                <!-- ========== HEADER ========== -->

            <?php echo $__env->make('components.adminNavBar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <!-- ========== END HEADER ========== -->
            </header>
            <!--  Header End -->

            <!-- Main Content -->
            <main class="h-full overflow-y-auto  max-w-full  pt-4">
                <div class="container mx-auto p-6">
    <h2 class="text-2xl font-semibold mb-4">Dashboard Overview</h2>

    <!-- KPI Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Users -->
        <div class="p-4 bg-white rounded-lg shadow">
            <h3 class="text-lg font-medium">Total Users</h3>
            <p class="text-2xl font-semibold text-blue-600"><?php echo e($totalUsers); ?></p>
        </div>

        <!-- Active Savings Plans -->
        <div class="p-4 bg-white rounded-lg shadow">
            <h3 class="text-lg font-medium">Active Savings Plans</h3>
            <p class="text-2xl font-semibold text-green-600"><?php echo e($activePlans); ?></p>
        </div>

        <!-- Total Deposits -->
        <div class="p-4 bg-white rounded-lg shadow">
            <h3 class="text-lg font-medium">Total Deposits (Monthly)</h3>
            <p class="text-2xl font-semibold text-indigo-600">₦<?php echo e(number_format($totalDeposits, 2)); ?></p>
        </div>

        <!-- Total Withdrawals -->
        <div class="p-4 bg-white rounded-lg shadow">
            <h3 class="text-lg font-medium">Total Withdrawals (Monthly)</h3>
            <p class="text-2xl font-semibold text-red-600">₦<?php echo e(number_format($totalWithdrawals, 2)); ?></p>
        </div>
    </div>

      <!-- Order History Section -->
<div class="grid grid-cols-1 lg:gap-x-6 gap-x-0 lg:gap-y-0 gap-y-6">
    <div class="col-span-2">
        <div class="card h-full">
            <div class="card-body">
                <!-- Card Header with Title and Button -->
                <div class="flex justify-between items-center mb-6">
                    <h4 class="text-gray-600 text-lg font-semibold">Recent Order History</h4>
                    <a href="<?php echo e(route('view.purchases')); ?>" class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition-colors">
                        View Purchases
                    </a>
                </div>

                <!-- Table -->
                <div class="relative overflow-x-auto">
                    <table class="text-left w-full whitespace-nowrap text-sm">
                        <thead class="text-gray-700">
                            <tr class="font-semibold text-gray-600">
                                <th scope="col" class="p-2">Order ID</th>
                                <th scope="col" class="p-2">User</th>
                                <th scope="col" class="p-2">Total Amount</th>
                                <th scope="col" class="p-2">Payment Method</th>
                                <th scope="col" class="p-2">Tracking ID</th>
                                <th scope="col" class="p-2">Delivery Fee</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $recentOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr class="hover:bg-gray-50">
                                <td class="p-2 font-semibold text-gray-600"><?php echo e($order->id); ?></td>
                                <td class="p-2">
                                    <div class="flex flex-col gap-1">
                                        <h3 class="font-semibold text-gray-600"><?php echo e($order->user->name ?? 'Unknown User'); ?></h3>
                                        <span class="font-normal text-gray-500"><?php echo e($order->user->email ?? 'N/A'); ?></span>
                                    </div>
                                </td>
                                <td class="p-2">
                                    <span class="font-semibold text-base text-gray-600">₦<?php echo e(number_format($order->total_amount, 2)); ?></span>
                                </td>
                                <td class="p-2">
                                    <span class="font-normal text-gray-500"><?php echo e(ucfirst($order->payment_method)); ?></span>
                                </td>
                                <td class="p-2">
                                    <span class="font-normal text-gray-500"><?php echo e($order->tracking_id ?? 'N/A'); ?></span>
                                </td>
                                <td class="p-2">
                                    <span class="font-semibold text-base text-gray-600">₦<?php echo e(number_format($order->delivery_fee, 2)); ?></span>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="6" class="p-4 text-center text-gray-500">No orders found</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



</div>
                <div class="container full-container py-5 flex flex-col gap-6">
                      <!-- Order Transaction Section -->
            <div class="grid grid-cols-1 lg:gap-x-6 gap-x-0 lg:gap-y-0 gap-y-6">
    <div class="col-span-2">
        <div class="card h-full">
            <div class="card-body">
                <h4 class="text-gray-600 text-lg font-semibold mb-6">Recent Transaction</h4>
                <div class="relative overflow-x-auto">
                    <!-- table -->
                    <table class="text-left w-full whitespace-nowrap text-sm">
                        <thead class="text-gray-700">
                            <tr class="font-semibold text-gray-600">
                                <th scope="col" class="p-2">Id</th>
                                <th scope="col" class="p-2">User</th>
                                <th scope="col" class="p-2">Type</th>
                                <th scope="col" class="p-2">Status</th>
                                <th scope="col" class="p-2">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $recentTransactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td class="p-2 font-semibold text-gray-600"><?php echo e($transaction->id); ?></td>
                                <td class="p-2">
                                    <div class="flex flex-col gap-1">
                                        <h3 class="font-semibold text-gray-600"><?php echo e($transaction->user->name ?? 'Unknown User'); ?></h3>
                                        <span class="font-normal text-gray-500"><?php echo e($transaction->user->email ?? 'N/A'); ?></span>
                                    </div>
                                </td>
                                <td class="p-2">
                                    <span class="font-normal text-gray-500"><?php echo e($transaction->type); ?></span>
                                </td>
                                <td class="p-2">
                                    <span class="inline-flex items-center py-[3px] px-[10px] rounded-2xl font-semibold text-white
                                        <?php if($transaction->status == 'pending'): ?> bg-yellow-500
                                        <?php elseif($transaction->status == 'approved'): ?> bg-green-500
                                        <?php elseif($transaction->status == 'rejected'): ?> bg-red-500
                                        <?php else: ?> bg-gray-500 <?php endif; ?>">
                                        <?php echo e(ucfirst($transaction->status)); ?>

                                    </span>
                                </td>
                                <td class="p-2">
                                    <span class="font-semibold text-base text-gray-600">₦<?php echo e($transaction->amount); ?></span>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="5" class="p-4 text-center text-gray-500">No transactions found</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



                    <h4 class="text-gray-600 text-lg font-semibold mb-6">Recently Added Products</h4>

                    <div class="grid grid-cols-1 xl:grid-cols-4 lg:grid-cols-2 gap-6">

                        <?php if($products->isEmpty()): ?>
                            <div class="col-span-4 text-center">
                                <h6 class="text-gray-500 text-lg font-semibold">No new products added yet.</h6>
                            </div>
                        <?php else: ?>

                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="card overflow-hidden">
                                    <div class="relative">
                                        <a href="javascript:void(0)">
                                            <img src="<?php echo e(asset('storage/' . $product->image)); ?>"
                                                 alt="<?php echo e($product->name); ?>" class="size-40">
                                        </a>
                                        <a href="javascript:void(0)"
                                           class="bg-blue-600 w-8 h-8 flex justify-center items-center text-white rounded-full absolute bottom-0 right-0 mr-4 -mb-3">
                                            <i class="ti ti-basket text-base"></i>
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h6 class="text-base font-semibold text-gray-600 mb-1"><?php echo e($product->name); ?></h6>
                                        <div class="flex justify-between">
                                            <div class="flex gap-2 items-center">
                                                <h6 class="text-base text-gray-600 font-semibold">
                                                    $<?php echo e(number_format($product->price, 2)); ?>

                                                </h6>
                                                <span class="text-gray-500 text-sm">
                                                    <del>$<?php echo e(number_format($product->price * 1.2, 2)); ?></del> <!-- Example of discount -->
                                                </span>
                                            </div>
                                            <ul class="list-none flex gap-1">
                                                <?php for($i = 0; $i < 5; $i++): ?>
                                                    <li>
                                                        <a href="javascript:void(0)">
                                                            <i class="ti ti-star text-yellow-500 text-sm"></i>
                                                        </a>
                                                    </li>
                                                <?php endfor; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>




                    <footer>
                        <p class="text-base text-gray-500 font-normal p-3 text-center">
                            Design and Developed by <a href="/"
                                class="text-blue-600 underline hover:text-blue-700">Osusu</a>
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
<?php /**PATH C:\xampp\htdocs\Affiliate-Get-Osusu-Official-Site\resources\views\admin\dashboard.blade.php ENDPATH**/ ?>