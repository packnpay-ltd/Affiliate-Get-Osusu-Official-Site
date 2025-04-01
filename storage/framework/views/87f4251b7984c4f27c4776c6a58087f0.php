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
        <aside class="w-1/4">
            <?php echo $__env->make('components.adminSideBar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </aside>

        <div class="w-full overflow-hidden">
            <header class="container w-full text-sm py-5 xl:px-9 px-5">
                <?php echo $__env->make('components.adminNavBar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </header>

            <main class="h-full overflow-y-auto max-w-full pt-4 px-6">
                <h4 class="text-gray-600 text-lg font-semibold mb-6">Edit Product</h4>

                <div class="shadow rounded-lg bg-white p-6">
                    <form action="<?php echo e(route('products.update', $product->id)); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Name -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Product Name</label>
                                <input type="text" name="name" value="<?php echo e($product->name); ?>"
                                       class="mt-1 p-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                                       required>
                            </div>

                            <!-- Brand -->


                            <div class="flex flex-col">
                                <label for="brand" class="block text-sm font-medium text-gray-700">Brand</label>


                            <select name="brand_id" id="brand"
                                    class="mt-1 p-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                                    required>
                                <option value="" disabled selected><?php echo e($product->brand->name); ?></option>
                                <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($brand->id); ?>"><?php echo e($brand->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <button type="button"
                                        class="text-blue-600 underline text-sm font-medium"
                                        onclick="toggleModal('addBrandModal')">
                                    Add New Brand
                                </button>
                            </div>





                            <!-- Category -->

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Category</label>
                                <select name="category_id" class="form-control px-2 py-2 rounded-lg">
                                    <?php $__currentLoopData = $categoriesList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category->id); ?>" <?php echo e($product->category_id == $category->id ? 'selected' : ''); ?>>
                                            <?php echo e($category->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <!-- Price -->
                           <div>
    <label class="block text-sm font-medium text-gray-700">Price</label>
    <input type="number" name="price" value="<?php echo e(old('price', $product->price)); ?>"
           step="0.01" min="0"
           class="mt-1 p-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
           required>
</div>


                            <!-- Short Description -->
                            <div class="col-span-2">
                                <label class="block text-sm font-medium text-gray-700">Short Description</label>
                                <textarea name="short_description"
                                          class=" mt-1 p-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                                          rows="4"><?php echo e($product->short_description); ?></textarea>
                            </div>


                            <!-- Description -->
                            <div class="col-span-2">
                                <label class="block text-sm font-medium text-gray-700">Description</label>
                                <textarea name="description"
                                          class="tinymce-editor mt-1 p-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                                          rows="6"><?php echo e($product->description); ?></textarea>
                            </div>

                            <!-- Image -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Cover Image</label>
                                <input type="file" name="image" class="mt-1 p-2 w-full border border-gray-300 rounded-lg">
                                <img src="<?php echo e(asset('storage/' . $product->image)); ?>" class="w-20 mt-2">
                            </div>

                                                        <!-- Additional Images -->
                            <?php for($i = 2; $i <= 5; $i++): ?>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Product Image <?php echo e($i); ?></label>
                                <input type="file" name="image<?php echo e($i); ?>" class="mt-1 p-2 w-full border border-gray-300 rounded-lg">
                                <?php if($product->{'image'.$i}): ?>
                                    <img src="<?php echo e(asset('storage/' . $product->{'image'.$i})); ?>" class="w-20 mt-2">
                                <?php endif; ?>
                            </div>
                            <?php endfor; ?>


                            <!-- Submit Button -->
                            <div class="col-span-2 text-right">
                                <button type="submit"
                                        class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition duration-300">
                                    Update Product
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>


    <script src="https://cdn.tiny.cloud/1/777y55az7scak8uz2l4h3bek84juepd8wt1xdy78p0v50038/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea.tinymce-editor',
        height: 300,
        plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        toolbar_mode: 'floating',
        toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat',
        branding: false
    });
</script>
    <div id="addBrandModal" class="hidden fixed inset-0 z-50 bg-gray-800 bg-opacity-50 flex justify-center items-center">
    <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
        <h2 class="text-lg font-semibold mb-4">Add New Brand</h2>
        <form id="addBrandForm" method="POST" action="<?php echo e(route('brands.store')); ?>">
            <?php echo csrf_field(); ?>
            <div class="mb-4">
                <label for="brandName" class="block text-sm font-medium text-gray-700">Brand Name</label>
                <input type="text" name="name" id="brandName"
                       class="mt-1 p-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                       placeholder="Enter brand name" required>
            </div>
            <div class="flex justify-end">
                <button type="button"
                        onclick="toggleModal('addBrandModal')"
                        class="bg-gray-500 text-white px-4 py-2 rounded-lg mr-2">
                    Cancel
                </button>
                <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded-lg">
                    Add Brand
                </button>
            </div>
        </form>
    </div>
</div>
<script>
    function toggleModal(modalId) {
        const modal = document.getElementById(modalId);
        modal.classList.toggle('hidden');
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
<?php /**PATH C:\xampp\htdocs\Affiliate-Get-Osusu-Official-Site\resources\views\admin\products\edit.blade.php ENDPATH**/ ?>