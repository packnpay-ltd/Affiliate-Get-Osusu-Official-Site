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

<!-- Main Content -->
    <main class="flex-1 bg-gray-100 lg:ml-0">
      <!-- Mobile Header -->
      <header class="flex items-center justify-between px-6 py-4 md:hidden bg-white shadow-md">
        <button id="menu-toggle" class="text-gray-700 focus:outline-none">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
          </svg>
        </button>
        <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Logo" class="h-8">
      </header>

      <!-- Dashboard Content -->
      <div class="px-6 py-8">
        <!-- Affiliate Dashboard -->
        <div >
            <p class="text-2xl font-bold text-gray-900 px-8 py-8">My Osusu Affiliate</p>

            <!-- Affiliate Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Total Referrals -->
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm">Total Referrals</p>
                            <p class="text-2xl font-bold text-gray-900"><?php echo e($totalReferrals); ?></p>
                        </div>
                        <div class="bg-purple-100 p-3 rounded-full">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Total Earnings -->
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm">Total Earnings</p>
                            <p class="text-2xl font-bold text-gray-900">₦<?php echo e(number_format($totalEarnings, 2)); ?></p>
                        </div>
                        <div class="bg-green-100 p-3 rounded-full">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Pending Commissions -->
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm">Pending Commissions</p>
                            <p class="text-2xl font-bold text-gray-900">₦<?php echo e(number_format($pendingEarnings, 2)); ?></p>
                        </div>
                        <div class="bg-yellow-100 p-3 rounded-full">
                            <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Conversion Rate -->
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm">Conversion Rate</p>
                            <p class="text-2xl font-bold text-gray-900"><?php echo e($conversionRate); ?>%</p>
                        </div>
                        <div class="bg-blue-100 p-3 rounded-full">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Referral Link Section -->
            <div class="mt-8 bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold mb-4">Your Referral Link</h3>
                <div class="flex items-center gap-4">
                    <input
                        type="text"
                        value="<?php echo e(route('referral.join', ['code' => $affiliateProgram->referral_code])); ?>"
                        class="flex-1 p-2 border rounded-lg bg-gray-50"
                        readonly
                        id="referralLink"
                    >
                    <button
                        class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700"
                        onclick="copyToClipboard()"
                    >
                        Copy Link
                    </button>
                </div>
                <p class="text-sm text-gray-500 mt-2">Share this link with your friends to earn commissions!</p>
            </div>

            <!-- Recent Referrals Table -->
            <div class="mt-8 bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold mb-4">Recent Referrals</h3>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Commission</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php $__empty_1 = true; $__currentLoopData = $recentReferrals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $referral): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td class="px-6 py-4 text-sm text-gray-900">
                                        <?php echo e($referral->referredUser->name); ?>

                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        <?php echo e($referral->created_at->format('M d, Y')); ?>

                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full
                                            <?php echo e($referral->status === 'active' ? 'bg-green-100 text-green-800' :
                                               ($referral->status === 'pending' ? 'bg-yellow-100 text-yellow-800' :
                                               'bg-red-100 text-red-800')); ?>">
                                            <?php echo e(ucfirst($referral->status)); ?>

                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-900 text-right">
                                        ₦<?php echo e(number_format($referral->commission ?? 0, 2)); ?>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td class="px-6 py-4 text-sm text-gray-500 text-center" colspan="4">
                                        No referrals yet
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Transaction Modal -->
        <div id="transactionModal" class="hidden fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 flex items-center justify-center">
            <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
                <div class="flex justify-between items-center">
                    <h3 class="text-lg font-medium text-gray-800">Transaction Details</h3>
                    <button onclick="closeTransactionModal()" class="text-gray-600 hover:text-gray-800 font-bold text-lg">&times;</button>
                </div>
                <div id="transactionDetails" class="mt-4 text-sm">
                    <!-- Transaction details will be dynamically loaded here -->
                </div>
            </div>
        </div>

      </div>
    </main>
    </div>


<!-- Loading Screen -->
<div id="loadingScreen" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="text-white text-lg font-bold">
        Loading...
    </div>
</div>

<!-- Existing Modal and Content HTML -->

<script>
    function openTransactionModal(transactionId) {
        // Show loading screen
        document.getElementById('loadingScreen').classList.remove('hidden');

        fetch(`/transactions/${transactionId}`)
            .then(response => response.json())
            .then(data => {
                const detailsDiv = document.getElementById('transactionDetails');
                detailsDiv.innerHTML = `
                    <p><strong>Date:</strong> ${data.date}</p>
                    <p><strong>Type:</strong> ${data.type}</p>
                    <p><strong>Amount:</strong> ₦${data.amount}</p>
                    <p><strong>Status:</strong> ${data.status}</p>
                    <p><strong>Payment Mode:</strong> ${data.payment_method}</p>
                    <p><strong>Note:</strong> ${data.note}</p>
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

    function copyToClipboard() {
        const referralLink = document.getElementById('referralLink');
        referralLink.select();
        document.execCommand('copy');

        // Show feedback to user
        const button = event.target;
        const originalText = button.textContent;
        button.textContent = 'Copied!';
        setTimeout(() => {
            button.textContent = originalText;
        }, 2000);
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
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\Affiliate-Get-Osusu-Official-Site\resources\views/user/dashboard.blade.php ENDPATH**/ ?>