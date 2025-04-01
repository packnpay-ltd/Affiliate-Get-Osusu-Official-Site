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
    <div id="main-wrapper" class="flex">
        <aside class="hidden md:block">
            <?php echo $__env->make('components.adminSideBar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </aside>

        <div class="p-4  w-full">
            <header class="container w-full text-sm py-5 xl:px-9 px-5">
                <?php echo $__env->make('components.adminNavBar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </header>

            <main class="h-full overflow-y-auto max-w-full pt-4">
                <div class="container mx-auto px-4">
                    <div class="flex justify-between mb-6 items-center">
                        <h4 class="text-gray-800 text-xl font-bold">Product Management</h4>
                        <div class="flex gap-3">
                            <button onclick="openCategoryModal()" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg transition-colors duration-200 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                                </svg>
                                Manage Categories
                            </button>
                            <button onclick="openBrandModal()" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-lg transition-colors duration-200 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A2 2 0 013 12V7a4 4 0 014-4z"/>
                                </svg>
                                Manage Brands
                            </button>
                            <a href="<?php echo e(route('products.create')); ?>" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition-colors duration-200 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                </svg>
                                New Product
                            </a>
                        </div>
                    </div>

                    <!-- Enhanced Filter Section -->
                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 p-6 rounded-2xl shadow-sm mb-8 border border-blue-100">
                        <div class="mb-4 flex items-center justify-between">
                            <h3 class="text-lg font-semibold text-gray-700 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                                </svg>
                                Filter Products
                            </h3>
                            <button type="button" class="text-sm text-blue-600 hover:text-blue-800 flex items-center" onclick="clearFilters()">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                Clear Filters
                            </button>
                        </div>

                        <form action="<?php echo e(route('products.index')); ?>" method="GET" class="space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                                <!-- Search Input -->
                                <div class="relative">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Search Products</label>
                                    <div class="relative">
                                        <input type="text"
                                               name="search"
                                               value="<?php echo e(request('search')); ?>"
                                               class="pl-10 w-full rounded-lg border-gray-200 focus:border-blue-500 focus:ring focus:ring-blue-200 transition-shadow duration-200"
                                               placeholder="Search products...">
                                        <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                        </svg>
                                    </div>
                                </div>

                                <!-- Brand Select -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Brand</label>
                                    <div class="relative">
                                        <select name="brand"
                                                class="appearance-none py-2 px-2 w-full rounded-lg border-gray-200 focus:border-blue-500 focus:ring focus:ring-blue-200 transition-shadow duration-200">
                                            <option value="">All Brands</option>
                                            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($brand->id); ?>" <?php echo e(request('brand') == $brand->id ? 'selected' : ''); ?>>
                                                    <?php echo e($brand->name); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <svg class="w-5 h-5 text-gray-400 absolute right-3 top-1/2 transform -translate-y-1/2 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                        </svg>
                                    </div>
                                </div>

                                <!-- Category Select -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                                    <div class="relative">
                                        <select name="category"
                                                class="appearance-none py-2 px-2 w-full rounded-lg border-gray-200 focus:border-blue-500 focus:ring focus:ring-blue-200 transition-shadow duration-200">
                                            <option value="">All Categories</option>
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($category->id); ?>" <?php echo e(request('category') == $category->id ? 'selected' : ''); ?>>
                                                    <?php echo e($category->name); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <svg class="w-5 h-5 text-gray-400 absolute right-3 top-1/2 transform -translate-y-1/2 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                        </svg>
                                    </div>
                                </div>

                                <!-- Status Select -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                                    <div class="relative">
                                        <select name="status"
                                                class="appearance-none py-2 px-2 w-full rounded-lg border-gray-200 focus:border-blue-500 focus:ring focus:ring-blue-200 transition-shadow duration-200">
                                            <option value="">All Status</option>
                                            <option value="published" <?php echo e(request('status') == 'published' ? 'selected' : ''); ?>>
                                                <span class="text-green-600">●</span> Published
                                            </option>
                                            <option value="hidden" <?php echo e(request('status') == 'hidden' ? 'selected' : ''); ?>>
                                                <span class="text-gray-600">●</span> Hidden
                                            </option>
                                        </select>
                                        <svg class="w-5 h-5 text-gray-400 absolute right-3 top-1/2 transform -translate-y-1/2 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="flex justify-end pt-4">
                                <button type="submit"
                                        class="inline-flex items-center px-6 py-2.5 bg-blue-600 text-white font-medium text-sm rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 transition-all duration-200">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                    Apply Filters
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Brand</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                                            <td class="px-4 py-4 text-sm text-gray-900"><?php echo e($product->id); ?></td>
                                            <td class="px-4 py-4 text-sm text-gray-900"><?php echo e($product->name); ?></td>
                                            <td class="px-4 py-4 text-sm text-gray-600"><?php echo e($product->brand->name); ?></td>
                                            <td class="px-4 py-4 text-sm">
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                                    <?php echo e($product->is_published ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800'); ?>">
                                                    <?php echo e($product->is_published ? 'Published' : 'Hidden'); ?>

                                                </span>
                                            </td>
                                            <td class="px-4 py-4 text-sm text-gray-600">
                                                <?php echo e($product->category->name ?? 'Uncategorized'); ?>

                                            </td>
                                            <td class="px-4 py-4 text-sm text-gray-600">₦<?php echo e(number_format($product->price, 2)); ?></td>
                                            <td class="px-4 py-4">
                                                <img src="<?php echo e(asset('storage/' . $product->image)); ?>" alt="Product Image" class="w-12 h-12 object-cover rounded-lg">
                                            </td>
                                            <td class="px-4 py-4 text-sm">
                                                <div class="relative inline-block text-left">
                                                    <button type="button" class="inline-flex justify-center w-full px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" id="menu-button">
                                                        •••
                                                    </button>

                                                    <div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-10 hidden" role="menu">
                                                        <div class="py-1">
                                                            <a href="<?php echo e(route('products.edit', $product->id)); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                                ✏️ Edit
                                                            </a>
                                                            <form action="<?php echo e(route('products.destroy', $product->id)); ?>" method="POST" class="w-full">
                                                                <?php echo csrf_field(); ?>
                                                                <?php echo method_field('DELETE'); ?>
                                                                <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                                                    🗑️ Delete
                                                                </button>
                                                            </form>
                                                            <form action="<?php echo e(route('products.toggleFrontpage', $product->id)); ?>" method="POST" class="w-full">
                                                                <?php echo csrf_field(); ?>
                                                                <button type="submit" class="w-full text-left px-4 py-2 text-sm <?php echo e($product->frontpage ? 'text-red-600' : 'text-green-600'); ?> hover:bg-gray-100">
                                                                    <?php echo e($product->frontpage ? '❌ Remove from Frontpage' : '✅ Add to Frontpage'); ?>

                                                                </button>
                                                            </form>
                                                            <form action="<?php echo e(route('products.togglePublished', $product->id)); ?>" method="POST">
                                                                <?php echo csrf_field(); ?>
                                                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm 
                                                                    <?php echo e($product->is_published ? 'text-yellow-600' : 'text-green-600'); ?> hover:bg-gray-100">
                                                                    <?php echo e($product->is_published ? '👁️ Unpublish' : '👁️ Publish'); ?>

                                                                </button>
                                                            </form>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        // Add dropdown toggle functionality
        document.querySelectorAll('[id="menu-button"]').forEach(button => {
            button.addEventListener('click', (e) => {
                const menu = e.target.closest('.relative').querySelector('.origin-top-right');
                menu.classList.toggle('hidden');

                // Close dropdown when clicking outside
                document.addEventListener('click', (evt) => {
                    if (!evt.target.closest('.relative')) {
                        menu.classList.add('hidden');
                    }
                }, { once: true });
            });
        });

        function clearFilters() {
            const form = document.querySelector('form');
            const inputs = form.querySelectorAll('input, select');
            inputs.forEach(input => {
                input.value = '';
            });
            form.submit();
        }

        function openBrandModal() {
            document.getElementById('brandModal').classList.remove('hidden');
        }

        function closeBrandModal() {
            document.getElementById('brandModal').classList.add('hidden');
        }

        // Close modal when clicking outside
        document.getElementById('brandModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeBrandModal();
            }
        });

        function openCategoryModal() {
            document.getElementById('categoryModal').classList.remove('hidden');
        }

        function closeCategoryModal() {
            document.getElementById('categoryModal').classList.add('hidden');
        }

        function toggleEditForm(categoryId) {
            const form = document.getElementById(`edit-form-${categoryId}`);
            const display = document.getElementById(`category-display-${categoryId}`);

            if (form.classList.contains('hidden')) {
                form.classList.remove('hidden');
                display.classList.add('hidden');
            } else {
                form.classList.add('hidden');
                display.classList.remove('hidden');
            }
        }

        // Close modal when clicking outside
        document.getElementById('categoryModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeCategoryModal();
            }
        });
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

<!-- Add this modal markup at the bottom of your file, before closing body tag -->
<div id="brandModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full" style="z-index: 100;">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-lg bg-white">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold text-gray-900">Manage Brands</h3>
            <button onclick="closeBrandModal()" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <!-- Add Brand Form -->
        <form action="<?php echo e(route('brands.store')); ?>" method="POST" class="mb-4">
            <?php echo csrf_field(); ?>
            <div class="flex gap-2">
                <input type="text"
                       name="name"
                       placeholder="Enter brand name"
                       class="flex-1 rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200">
                <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">
                    Add
                </button>
            </div>
        </form>

        <!-- Brands List -->
        <div class="max-h-60 overflow-y-auto">
            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="flex items-center justify-between py-2 border-b last:border-0">
                    <span class="text-gray-700"><?php echo e($brand->name); ?></span>
                    <div class="flex gap-2">
                        <form action="<?php echo e(route('brands.destroy', $brand)); ?>" method="POST" class="inline"
                              onsubmit="return confirm('Are you sure you want to delete this brand? This cannot be undone.')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="text-red-600 hover:text-red-800">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>

<!-- Add Category Modal -->
<div id="categoryModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full" style="z-index: 100;">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-lg bg-white">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold text-gray-900">Manage Categories</h3>
            <button onclick="closeCategoryModal()" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

       

        <!-- Add Category Form -->
        <form action="<?php echo e(route('categories.store')); ?>" method="POST" class="mb-4">
            <?php echo csrf_field(); ?>
            <div class="flex gap-2">
                <input type="text"
                       name="name"
                       placeholder="Enter category name"
                       class="flex-1 rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200">
                <button type="submit"
                        class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors duration-200">
                    Add
                </button>
            </div>
        </form>

        <!-- Categories List -->
        <div class="max-h-60 overflow-y-auto">
            <?php if($categoriesList && $categoriesList->count() > 0): ?>
                <?php $__currentLoopData = $categoriesList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex items-center justify-between py-2 border-b last:border-0">
                        <span class="text-gray-700"><?php echo e($category->name ?? 'Unnamed Category'); ?></span>
                        <div class="flex gap-2">
                            <form action="<?php echo e(route('categories.destroy', $category->id)); ?>" method="POST" class="inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="text-red-600 hover:text-red-800">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <p class="text-gray-500 text-center py-4">No categories found (Total: <?php echo e($categories->count() ?? 0); ?>)</p>
            <?php endif; ?>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\Affiliate-Get-Osusu-Official-Site\resources\views\admin\products\index.blade.php ENDPATH**/ ?>