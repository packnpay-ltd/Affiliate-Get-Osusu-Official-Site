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
                <h1 class="text-2xl font-bold text-gray-900 mb-6">Marketing Tools</h1>

                <!-- Referral Link Section -->
                <div class="bg-white rounded-lg shadow p-6 mb-8">
                    <h2 class="text-lg font-semibold mb-4">Your Referral Link</h2>
                    <div class="flex items-center gap-4">
                        <input type="text" value="https://yourdomain.com/ref/<?php echo e(Auth::user()->id); ?>" class="flex-1 p-2 border rounded-lg bg-gray-50" readonly>
                        <button class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700" onclick="copyToClipboard()">
                            Copy Link
                        </button>
                    </div>
                </div>

                <!-- Marketing Materials -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Banners -->
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold">Banners</h3>
                            <button class="text-purple-600 hover:text-purple-700">Download All</button>
                        </div>
                        <div class="space-y-4">
                            <div class="border rounded-lg p-4">
                                <div class="bg-gray-100 h-32 mb-2 flex items-center justify-center">
                                    <p class="text-gray-500">Banner Preview</p>
                                </div>
                                <button class="w-full bg-purple-600 text-white px-4 py-2 rounded-md">Download</button>
                            </div>
                        </div>
                    </div>

                    <!-- Email Templates -->
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-lg font-semibold mb-4">Email Templates</h3>
                        <div class="space-y-4">
                            <div class="border rounded-lg p-4">
                                <h4 class="font-medium mb-2">Welcome Email</h4>
                                <p class="text-sm text-gray-600 mb-2">Perfect for introducing the program</p>
                                <button class="w-full bg-purple-600 text-white px-4 py-2 rounded-md">Copy Template</button>
                            </div>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-lg font-semibold mb-4">Social Media Kit</h3>
                        <div class="space-y-4">
                            <div class="border rounded-lg p-4">
                                <h4 class="font-medium mb-2">Social Media Posts</h4>
                                <p class="text-sm text-gray-600 mb-2">Ready-to-use social media content</p>
                                <button class="w-full bg-purple-600 text-white px-4 py-2 rounded-md">Download Kit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        function copyToClipboard() {
            const referralLink = document.querySelector('input[readonly]');
            referralLink.select();
            document.execCommand('copy');
            alert('Referral link copied to clipboard!');
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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\Affiliate-Get-Osusu-Official-Site\resources\views\affiliate\marketing.blade.php ENDPATH**/ ?>