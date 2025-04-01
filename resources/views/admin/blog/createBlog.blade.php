<x-app-layout>
    <main>
        <div id="main-wrapper" class="flex">
            @include('components.adminSideBar')

            <div class="w-full ">
                <header class="container w-full text-sm py-5 xl:px-9 px-5">
                    @include('components.adminNavBar')
                </header>

                <main class="h-full overflow-y-auto max-w-full pt-4 mb-8">
    <div class="p-4 px-2">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg">

            <section class="bg-white w-full p-8">
                <h1 class="mt-20 mb-4 text-4xl p-4 font-extrabold leading-none text-center tracking-tight text-gray-900 md:text-5xl ">
                    Create Post
                </h1>
                <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text" id="title" name="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                        <textarea id="content" name="content" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" rows="5" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="categories" class="block text-sm font-medium text-gray-700">Category</label>
                        <select id="categories" name="categories" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                            <option value="" disabled selected>Select a Category</option>
                            <option value="9">General</option>
                            <option value="1">Fresh Produce</option>
                            <option value="2">Dairy & Eggs</option>
                            <option value="3">Bakery</option>
                            <option value="4">Meat & Seafood</option>
                            <option value="5">Pantry Staples</option>
                            <option value="6">Beverages</option>
                            <option value="7">Snacks & Sweets</option>
                            <option value="8">Frozen Foods</option>
                            <option value="9">Organic & Health</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                        <input type="file" id="image" name="image" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Submit</button>
                    </div>
                </form>
            </section>
        </div>
    </div>

                </main>
            </div>
        </div>
    </main>
    <!-- Include TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/777y55az7scak8uz2l4h3bek84juepd8wt1xdy78p0v50038/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#content',
            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            toolbar_mode: 'floating',
            setup: function (editor) {
                editor.on('change', function () {
                    editor.save();
                });
            }
        });
    </script>
</x-app-layout>
