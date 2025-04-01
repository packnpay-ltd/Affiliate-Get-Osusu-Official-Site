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
                    <section class="bg-white w-full p-8">
                        <div class="flex justify-between items-center mb-4">
                            <h1 class="text-4xl font-extrabold leading-none text-gray-900">All Blog Posts</h1>
                            <a href="<?php echo e(route('admin.blog.create')); ?>" class="px-4 py-2 bg-green-600 text-white rounded-md">Create New Post</a>
                        </div>

                        <?php if(session('success')): ?>
                            <div class="mb-4 text-green-600"><?php echo e(session('success')); ?></div>
                        <?php endif; ?>

                        <form action="<?php echo e(route('admin.blog.all')); ?>" method="GET" class="mb-4 flex space-x-4">
                            <div>
                                <label for="category" class="block text-sm font-medium text-gray-700">Filter by Category</label>
                                <select name="category" id="category" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    <option value="">All</option>
                                    <option value="1" <?php echo e(request('category') == 1 ? 'selected' : ''); ?>>Fresh Produce</option>
                                    <option value="2" <?php echo e(request('category') == 2 ? 'selected' : ''); ?>>Dairy & Eggs</option>
                                    <option value="3" <?php echo e(request('category') == 3 ? 'selected' : ''); ?>>Bakery</option>
                                    <option value="4" <?php echo e(request('category') == 4 ? 'selected' : ''); ?>>Meat & Seafood</option>
                                    <option value="5" <?php echo e(request('category') == 5 ? 'selected' : ''); ?>>Pantry Staples</option>
                                    <option value="6" <?php echo e(request('category') == 6 ? 'selected' : ''); ?>>Beverages</option>
                                    <option value="7" <?php echo e(request('category') == 7 ? 'selected' : ''); ?>>Frozen Foods</option>
                                    <option value="8" <?php echo e(request('category') == 8 ? 'selected' : ''); ?>>Household Essentials</option>
                                </select>
                            </div>
                            <div>
                                <label for="sort" class="block text-sm font-medium text-gray-700">Sort by Created At</label>
                                <select name="sort" id="sort" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    <option value="">Select</option>
                                    <option value="asc" <?php echo e(request('sort') == 'asc' ? 'selected' : ''); ?>>Oldest First</option>
                                    <option value="desc" <?php echo e(request('sort') == 'desc' ? 'selected' : ''); ?>>Newest First</option>
                                </select>
                            </div>
                            <div class="flex items-end">
                                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Apply</button>
                            </div>
                        </form>

                        <table class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th class="py-2">Title</th>
                                    <th class="py-2">Category</th>
                                    <th class="py-2">Created At</th>
                                    <th class="py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="border px-4 py-2"><?php echo e(Str::limit($blog->title, 35)); ?></td>
                                       <td class="border px-4 py-2">
                                            <?php if($blog->category == 1): ?>
                                                <span class="px-2 text-xs py-1 text-white rounded-lg bg-green-600">Fresh Produce</span>
                                            <?php elseif($blog->category == 2): ?>
                                                <span class="px-2 text-xs py-1 text-white rounded-lg bg-blue-600">Dairy & Eggs</span>
                                            <?php elseif($blog->category == 3): ?>
                                                <span class="px-2 text-xs py-1 text-white rounded-lg bg-yellow-600">Bakery</span>
                                            <?php elseif($blog->category == 4): ?>
                                                <span class="px-2 text-xs py-1 text-white rounded-lg bg-red-600">Meat & Seafood</span>
                                            <?php elseif($blog->category == 5): ?>
                                                <span class="px-2 text-xs py-1 text-white rounded-lg bg-purple-600">Pantry Staples</span>
                                            <?php elseif($blog->category == 6): ?>
                                                <span class="px-2 text-xs py-1 text-white rounded-lg bg-indigo-600">Beverages</span>
                                            <?php elseif($blog->category == 7): ?>
                                                <span class="px-2 text-xs py-1 text-white rounded-lg bg-gray-600">Frozen Foods</span>
                                            <?php elseif($blog->category == 8): ?>
                                                <span class="px-2 text-xs py-1 text-white rounded-lg bg-pink-600">Household Essentials</span>
                                            <?php else: ?>
                                                <span class="px-2 text-xs py-1 text-white rounded-lg bg-yellow-600">No Category</span>
                                            <?php endif; ?>
                                        </td>

                                        <td class="border px-2 py-2"><?php echo e($blog->created_at->diffForHumans()); ?></td>
                                        <td class="border px-2 py-2">
                                            <form action="<?php echo e(route('admin.blog.delete', $blog->id)); ?>" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this blog post?');">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>

                        <div class="mt-4"><?php echo e($blogs->links()); ?></div>
                    </section>
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
<?php /**PATH C:\xampp\htdocs\Affiliate-Get-Osusu-Official-Site\resources\views\admin\blog\allBlog.blade.php ENDPATH**/ ?>