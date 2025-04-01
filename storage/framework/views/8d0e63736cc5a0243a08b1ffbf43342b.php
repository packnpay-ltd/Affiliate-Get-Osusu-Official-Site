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
        <div id="main-wrapper" class="flex flex-col xl:flex-row">
            <!-- Sidebar -->
            <?php echo $__env->make('components.adminSideBar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- Main Content -->
            <div class="w-full page-wrapper overflow-hidden">
                <!-- Header -->
                <header class="w-full text-sm py-5 xl:px-9 px-5">
                    <?php echo $__env->make('components.adminNavBar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </header>

                <!-- Main Content -->
                <main class="h-full pt-4">
                    <div class="xl:px-9 px-5">
                        <div class="flex flex-col md:flex-row justify-between items-center mb-6">
                            <h4 class="text-gray-800 text-2xl font-semibold">Create New User</h4>
                            <a href="<?php echo e(route('admin.users.list')); ?>"
                                class="flex items-center gap-2 px-4 py-2 bg-gray-100 text-gray-600 rounded-lg hover:bg-gray-200 transition-all duration-200 mt-4 md:mt-0">
                                <i class="ti ti-arrow-left text-lg"></i>
                                Back to Users
                            </a>
                        </div>

                        <!-- Create User Form -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-100 w-full">
                            <div class="p-6 border-b border-gray-100">
                                <!-- Tab Navigation -->
                                <div class="flex space-x-4 mb-6">
                                    <button type="button" onclick="switchTab('individual')" id="individual-tab"
                                        class="px-6 py-2 rounded-lg text-sm font-medium tab-button active-tab">
                                        Individual
                                    </button>
                                    <button type="button" onclick="switchTab('corporate')" id="corporate-tab"
                                        class="px-6 py-2 rounded-lg text-sm font-medium tab-button">
                                        Corporate
                                    </button>
                                </div>
                                <h5 class="text-gray-700 text-lg font-medium">User Information</h5>
                                <p class="text-gray-500 text-sm mt-1">Fill in the details to create a new user account
                                </p>
                            </div>

                            <!-- Individual Form -->
                            <form method="POST" action="<?php echo e(route('admin.users.store')); ?>" id="individual-form"
                                class="p-6">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="user_type" value="individual">
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                    <!-- Left Column -->
                                    <div class="space-y-6">
                                        <div>
                                            <!-- Name -->
                                            <div class="mb-4">
                                                <input type="text" name="name" placeholder="Full Name"
                                                    value="<?php echo e(old('name')); ?>"
                                                    class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                    required>
                                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>

                                            <!-- Email -->
                                            <div class="mb-4">
                                                <input type="email" name="email" placeholder="Email Address"
                                                    value="<?php echo e(old('email')); ?>"
                                                    class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                    required>
                                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>

                                            <div>
                                                <label class="text-sm font-medium text-gray-700">Set password</label>
                                                <input type="password" name="password" placeholder="Enter your password"
                                                    class="mt-1 w-full p-2 lg:p-3 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Right Column -->
                                    <div class="space-y-6">
                                        <div>
                                            <!-- Password -->
                                            <!-- Phone -->
                                            <div class="flex gap-3">
                                                <div class="w-1/3">
                                                    <input type="text" name="country_code" placeholder="Code"
                                                        value="<?php echo e(old('country_code', '+234')); ?>"
                                                        class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                        required>
                                                </div>
                                                <div class="w-2/3">
                                                    <input type="text" name="phone_number" placeholder="Phone Number"
                                                        value="<?php echo e(old('phone_number')); ?>"
                                                        class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                        required>
                                                </div>
                                            </div>
                                            <?php $__errorArgs = ['phone_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                            <!-- Status -->
                                            <div class="mb-4 mt-4">
                                                <select name="verify_status"
                                                    class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                    required>
                                                    <option value="">Select Status</option>
                                                    <option value="active"
                                                        <?php echo e(old('verify_status') == 'active' ? 'selected' : ''); ?>>Active
                                                    </option>
                                                    <option value="pending"
                                                        <?php echo e(old('verify_status') == 'pending' ? 'selected' : ''); ?>>
                                                        Pending</option>
                                                    <option value="suspended"
                                                        <?php echo e(old('verify_status') == 'suspended' ? 'selected' : ''); ?>>
                                                        Suspended</option>
                                                </select>
                                                <?php $__errorArgs = ['verify_status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- Form Actions -->
                                <div class="flex justify-end items-center gap-3 mt-8 pt-6 border-t border-gray-100">
                                    <button type="button" onclick="window.location='<?php echo e(route('admin.users.list')); ?>'"
                                        class="px-6 py-2.5 text-gray-600 hover:text-gray-800 transition-colors duration-200">
                                        Cancel
                                    </button>
                                    <button type="submit"
                                        class="px-6 py-2.5 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-100 transition-all duration-200">
                                        Create User
                                    </button>
                                </div>
                            </form>

                            <!-- Corporate Form -->
                            <form method="POST" action="<?php echo e(route('admin.users.store')); ?>" id="corporate-form"
                                class="p-6 hidden">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="user_type" value="corporate">
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                    <!-- Left Column -->
                                    <div class="space-y-6">
                                        <div>
                                            <!-- Name -->
                                            <div class="mb-4">
                                                <input type="text" name="name" placeholder="Full Name"
                                                    value="<?php echo e(old('name')); ?>"
                                                    class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                    required>
                                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>

                                            <!-- Email -->
                                            <div class="mb-4">
                                                <input type="email" name="email" placeholder="Email Address"
                                                    value="<?php echo e(old('email')); ?>"
                                                    class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                    required>
                                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="mb-4">
                                                <label class="text-sm font-medium text-gray-700">Organisation
                                                    Type</label>
                                                <select name="organisation_type"
                                                    class="mt-1 w-full p-3 border border-gray-300 rounded-lg bg-white focus:ring-primary focus:border-primary"
                                                    required>
                                                    <option value="NGO">NGOs</option>
                                                    <option value="Small Business">Small Business</option>
                                                    <option value="Enterprise">Enterprise</option>
                                                </select>

                                            </div>

                                            <div>
                                                <label class="text-sm font-medium text-gray-700">Set password</label>
                                                <input type="password" name="password" placeholder="Enter your password"
                                                    class="mt-1 w-full p-2 lg:p-3 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Right Column -->
                                    <div class="space-y-6">
                                        <div>
                                            <div class="mb-4">
                                                <label class="text-sm font-medium text-gray-700">Organisation Name</label>
                                                <input type="text" name="organisation_name" placeholder="Organisation Name" required
                                                    class="mt-1 w-full p-3 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary">
                                            </div>
                                            <!-- Phone -->
                                            <div class="flex gap-3">
                                                <div class="w-1/3">
                                                    <input type="text" name="country_code" placeholder="Code"
                                                        value="<?php echo e(old('country_code', '+234')); ?>"
                                                        class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                        required>
                                                </div>
                                                <div class="w-2/3">
                                                    <input type="text" name="phone_number"
                                                        placeholder="Phone Number" value="<?php echo e(old('phone_number')); ?>"
                                                        class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                        required>
                                                </div>
                                            </div>
                                            <?php $__errorArgs = ['phone_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                            <!-- Status -->
                                            <div class="mb-4 mt-4">
                                                <select name="verify_status"
                                                    class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                    required>
                                                    <option value="">Select Status</option>
                                                    <option value="active"
                                                        <?php echo e(old('verify_status') == 'active' ? 'selected' : ''); ?>>Active
                                                    </option>
                                                    <option value="pending"
                                                        <?php echo e(old('verify_status') == 'pending' ? 'selected' : ''); ?>>
                                                        Pending</option>
                                                    <option value="suspended"
                                                        <?php echo e(old('verify_status') == 'suspended' ? 'selected' : ''); ?>>
                                                        Suspended</option>
                                                </select>
                                                <?php $__errorArgs = ['verify_status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Form Actions -->
                                <div class="flex justify-end items-center gap-3 mt-8 pt-6 border-t border-gray-100">
                                    <button type="button"
                                        onclick="window.location='<?php echo e(route('admin.users.list')); ?>'"
                                        class="px-6 py-2.5 text-gray-600 hover:text-gray-800 transition-colors duration-200">
                                        Cancel
                                    </button>
                                    <button type="submit"
                                        class="px-6 py-2.5 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-100 transition-all duration-200">
                                        Create Corporate User
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Add this style section -->
                        <style>
                            .tab-button {
                                background-color: #f3f4f6;
                                color: #6b7280;
                            }

                            .active-tab {
                                background-color: #2563eb;
                                color: white;
                            }
                        </style>

                        <!-- Add this script section -->
                        <script>
                            function switchTab(tab) {
                                // Hide all forms
                                document.getElementById('individual-form').classList.add('hidden');
                                document.getElementById('corporate-form').classList.add('hidden');

                                // Remove active class from all tabs
                                document.querySelectorAll('.tab-button').forEach(button => {
                                    button.classList.remove('active-tab');
                                });

                                // Show selected form and activate tab
                                document.getElementById(`${tab}-form`).classList.remove('hidden');
                                document.getElementById(`${tab}-tab`).classList.add('active-tab');
                            }
                        </script>
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
<?php /**PATH C:\xampp\htdocs\Affiliate-Get-Osusu-Official-Site\resources\views\admin\users\create.blade.php ENDPATH**/ ?>