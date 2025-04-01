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

            <div class="w-full">
                <header class=" w-full text-sm py-5 xl:px-9 px-5">
                    <?php echo $__env->make('components.adminNavBar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </header>

                <main class="h-full overflow-y-auto max-w-full pt-4 mb-8">
                    <!-- Filters -->
                    <div class=" bg-white shadow-lg rounded-lg p-6">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">User Transactions</h2>

                        <!-- Filter Dropdown -->
                        <div class="mb-6">
                            <form action="<?php echo e(route('payment.transaction')); ?>" method="GET">
                                <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Filter by Status</label>
                                <select
                                    name="status"
                                    id="status"
                                    onchange="this.form.submit()"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-150 ease-in-out">
                                    <option value="">All</option>
                                    <option value="active" <?php echo e(request('status') === 'active' ? 'selected' : ''); ?>>Active</option>
                                    <option value="pending" <?php echo e(request('status') === 'pending' ? 'selected' : ''); ?>>Pending</option>
                                    <option value="completed" <?php echo e(request('status') === 'completed' ? 'selected' : ''); ?>>Completed</option>
                                </select>
                            </form>
                        </div>
                    </div>

                    <!-- Transactions Table -->
                    <div class="mt-8 bg-white shadow-lg rounded-lg p-6">
                        <?php if($transactions->isEmpty()): ?>
                            <div class="text-center py-8">
                                <p class="text-gray-600 mb-4">No transactions found.</p>
                                <a href="<?php echo e(route('dashboard.marketplace')); ?>" class="inline-block px-6 py-2 bg-purple-700 text-white rounded-lg hover:bg-purple-600 transition duration-150 ease-in-out">
                                    Start Shopping
                                </a>
                            </div>
                        <?php else: ?>
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ref</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="hover:bg-gray-50 transition duration-150 ease-in-out">
                                                <td class="px-6 py-4 text-sm text-gray-800"><?php echo e($transaction->transaction_reference); ?></td>
                                                <td class="px-6 py-4 text-sm text-gray-800"><?php echo e($transaction->user->name); ?></td>
                                                <td class="px-6 py-4 text-sm text-gray-800"><?php echo e(ucfirst($transaction->type)); ?></td>
                                                <td class="px-6 py-4 text-sm text-gray-800 text-right">₦<?php echo e($transaction->amount); ?></td>
                                                <td class="px-6 py-4 text-sm text-gray-800">
                                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                                        <?php echo e($transaction->status === 'completed' ? 'bg-green-100 text-green-700' :
                                                        ($transaction->status === 'pending' ? 'bg-yellow-100 text-yellow-700' :
                                                        'bg-blue-100 text-blue-700')); ?>">
                                                        <?php echo e(ucfirst($transaction->status)); ?>

                                                    </span>
                                                </td>
                                                <td class="px-6 py-4 text-sm text-gray-800"><?php echo e($transaction->created_at->format('d M Y')); ?></td>
                                                <td class="px-6 py-4 text-sm text-center">
                                                    <button
                                                        class="text-purple-600 hover:text-purple-900 transition duration-150 ease-in-out"
                                                        onclick="openTransactionModal(<?php echo e($transaction->id); ?>)">
                                                        View
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Pagination -->
                            <div class="mt-6">
                                <?php echo e($transactions->links()); ?>

                            </div>
                        <?php endif; ?>
                    </div>
                </main>
            </div>
        </div>
    </main>

    <!-- Loading Screen -->
    <div id="loadingScreen" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="text-white text-lg font-bold">
            Loading...
        </div>
    </div>

    <!-- Transaction Modal -->
    <div id="transactionModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold">Transaction Details</h3>
                <button onclick="closeTransactionModal()" class="text-gray-500 hover:text-gray-700 transition duration-150 ease-in-out">
                    &times;
                </button>
            </div>
            <div id="transactionDetails" class="space-y-4">
                <p> Transaction details will be dynamically inserted here </p>
                 <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                                        <?php echo e($transaction->status === 'completed' ? 'bg-green-100 text-green-700' :
                                                        ($transaction->status === 'pending' ? 'bg-yellow-100 text-yellow-700' :
                                                        'bg-blue-100 text-blue-700')); ?>">
                                                        <?php echo e(ucfirst($transaction->status)); ?>

                                                    </span>
            </div>
            <div class="mt-6">
                <button
                    onclick="closeTransactionModal()"
                    class="w-full px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition duration-150 ease-in-out">
                    Close
                </button>
            </div>
        </div>
    </div>

    <script>
        function openTransactionModal(transactionId) {
            // Show loading screen
            document.getElementById('loadingScreen').classList.remove('hidden');

            fetch(`/admin-transactions/${transactionId}`)
                .then(response => response.json())
                .then(data => {
                    const detailsDiv = document.getElementById('transactionDetails');
                    detailsDiv.innerHTML = `
                        <p><strong>Date:</strong> ${data.date}</p>
                        <p><strong>Amount:</strong> ₦${data.amount}</p>
                        <p><strong>Status:</strong> ${data.status}</p>
                        <p>${data.note}</p>
                    `;
                    document.getElementById('transactionModal').classList.remove('hidden');

                    // Hide loading screen once data is fetched
                    document.getElementById('loadingScreen').classList.add('hidden');
                })
                .catch(error => {
                    console.error('Error fetching transaction details:', error);
                    // Hide loading screen on error
                    document.getElementById('loadingScreen').classList.add('hidden');
                });
        }

        function closeTransactionModal() {
            document.getElementById('transactionModal').classList.add('hidden');
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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\Affiliate-Get-Osusu-Official-Site\resources\views\admin\payment-transaction\index.blade.php ENDPATH**/ ?>