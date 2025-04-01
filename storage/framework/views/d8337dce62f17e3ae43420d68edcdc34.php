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
                <!-- Header Start -->
                <header class="container full-container w-full text-sm py-5 xl:px-9 px-5">
                    <?php echo $__env->make('components.adminNavBar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </header>
                <!-- Header End -->

                <!-- Main Content -->
                <main class="h-full overflow-y-auto max-w-full pt-4">
                    <div class="container mx-auto p-6">
                        <h2 class="text-2xl font-semibold mb-4">View Purchases</h2>

                        <!-- Raw Table -->
                        <div class="bg-white rounded-lg shadow overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order ID</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Amount</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Payment Method</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tracking ID</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Delivery Fee</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo e($order->id); ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            <?php echo e($order->user->name ?? 'Unknown User'); ?> <br>
                                            <span class="text-gray-500"><?php echo e($order->user->email ?? 'N/A'); ?></span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">₦<?php echo e(number_format($order->total_amount, 2)); ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo e(ucfirst($order->payment_method)); ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo e($order->tracking_id ?? 'N/A'); ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">₦<?php echo e(number_format($order->delivery_fee, 2)); ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            <button
                                                class="text-purple-600 hover:underline"
                                                onclick="openOrderModal(<?php echo e($order->id); ?>)">
                                                View
                                            </button>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="7" class="px-6 py-4 text-center text-sm text-gray-500">No orders found.</td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
    <?php echo e($orders->links()); ?>

</div>
                    </div>
                </main>
                <!-- Main Content End -->
            </div>
        </div>
    </main>

    <!-- Order Details Modal -->
    <div id="orderModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold">Order Details</h3>
                <button onclick="closeOrderModal()" class="text-gray-500 hover:text-gray-700">
                    &times;
                </button>
            </div>
            <div id="orderDetails" class="space-y-4">
                <!-- Order details will be dynamically inserted here -->
            </div>
            <div class="mt-6">
                <button
                    onclick="closeOrderModal()"
                    class="w-full px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Close
                </button>
            </div>
        </div>
    </div>

    <!-- Loading Screen -->
    <div id="loadingScreen" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <p class="text-gray-700">Loading...</p>
        </div>
    </div>

    <script>
        function openOrderModal(orderId) {
            // Show loading screen
            document.getElementById('loadingScreen').classList.remove('hidden');

            fetch(`/orders/${orderId}`)
                .then(response => response.json())
                .then(data => {
                    const detailsDiv = document.getElementById('orderDetails');
                    detailsDiv.innerHTML = `
                        <p><strong>Order ID:</strong> ${data.tracking_id}</p>
                        <p><strong>Total Amount:</strong> ₦${data.total_amount}</p>
                        <p><strong>Delivery Fee:</strong> ₦${data.delivery_fee}</p>
                        <p><strong>Payment Method:</strong> ${data.payment_method}</p>
                        <p><strong>Address:</strong> ${data.address}</p>
                        <p><strong>Status:</strong> Completed</p>
                        <p><strong>Date:</strong> ${data.created_at}</p>
                        <p><strong>Note:</strong> ${data.note || 'N/A'}</p> <!-- Display the note field -->
                    `;
                    document.getElementById('orderModal').classList.remove('hidden');

                    // Hide loading screen once data is fetched
                    document.getElementById('loadingScreen').classList.add('hidden');
                })
                .catch(error => {
                    console.error('Error fetching order details:', error);
                    // Hide loading screen on error
                    document.getElementById('loadingScreen').classList.add('hidden');
                });
        }

        function closeOrderModal() {
            document.getElementById('orderModal').classList.add('hidden');
        }
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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\Affiliate-Get-Osusu-Official-Site\resources\views\admin\view-purchases.blade.php ENDPATH**/ ?>