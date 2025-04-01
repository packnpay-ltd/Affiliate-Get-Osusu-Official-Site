<x-app-layout>
    <div id="main-wrapper" class="flex">
        <aside class="w-1/4">
            @include('components.adminSideBar')
        </aside>

        <div class="w-full overflow-hidden">
            <header class="container w-full text-sm py-5 xl:px-9 px-5">
                @include('components.adminNavBar')
            </header>

            <main class="h-full overflow-y-auto max-w-full pt-4 px-6">
                <h4 class="text-gray-600 text-lg font-semibold mb-6">Edit Product</h4>

                <div class="shadow rounded-lg bg-white p-6">
                    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Name -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Product Name</label>
                                <input type="text" name="name" value="{{ $product->name }}"
                                       class="mt-1 p-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                                       required>
                            </div>

                            <!-- Brand -->


                            <div class="flex flex-col">
                                <label for="brand" class="block text-sm font-medium text-gray-700">Brand</label>


                            <select name="brand_id" id="brand"
                                    class="mt-1 p-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                                    required>
                                <option value="" disabled selected>{{ $product->brand->name }}</option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
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
                                    @foreach($categoriesList as $category)
                                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Price -->
                           <div>
    <label class="block text-sm font-medium text-gray-700">Price</label>
    <input type="number" name="price" value="{{ old('price', $product->price) }}"
           step="0.01" min="0"
           class="mt-1 p-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
           required>
</div>


                            <!-- Short Description -->
                            <div class="col-span-2">
                                <label class="block text-sm font-medium text-gray-700">Short Description</label>
                                <textarea name="short_description"
                                          class=" mt-1 p-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                                          rows="4">{{ $product->short_description }}</textarea>
                            </div>


                            <!-- Description -->
                            <div class="col-span-2">
                                <label class="block text-sm font-medium text-gray-700">Description</label>
                                <textarea name="description"
                                          class="tinymce-editor mt-1 p-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                                          rows="6">{{ $product->description }}</textarea>
                            </div>

                            <!-- Image -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Cover Image</label>
                                <input type="file" name="image" class="mt-1 p-2 w-full border border-gray-300 rounded-lg">
                                <img src="{{ asset('storage/' . $product->image) }}" class="w-20 mt-2">
                            </div>

                                                        <!-- Additional Images -->
                            @for($i = 2; $i <= 5; $i++)
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Product Image {{ $i }}</label>
                                <input type="file" name="image{{ $i }}" class="mt-1 p-2 w-full border border-gray-300 rounded-lg">
                                @if ($product->{'image'.$i})
                                    <img src="{{ asset('storage/' . $product->{'image'.$i}) }}" class="w-20 mt-2">
                                @endif
                            </div>
                            @endfor


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
        <form id="addBrandForm" method="POST" action="{{ route('brands.store') }}">
            @csrf
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
</x-app-layout>
