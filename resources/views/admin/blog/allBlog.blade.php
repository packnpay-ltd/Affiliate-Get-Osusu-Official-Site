<x-app-layout>
    <main>
        <div id="main-wrapper" class="flex">
            @include('components.adminSideBar')

            <div class="w-full ">
                <header class="container w-full text-sm py-5 xl:px-9 px-5">
                    @include('components.adminNavBar')
                </header>

                <main class="h-full overflow-y-auto max-w-full pt-4 mb-8">
                    <section class="bg-white w-full p-8">
                        <div class="flex justify-between items-center mb-4">
                            <h1 class="text-4xl font-extrabold leading-none text-gray-900">All Blog Posts</h1>
                            <a href="{{ route('admin.blog.create') }}" class="px-4 py-2 bg-green-600 text-white rounded-md">Create New Post</a>
                        </div>

                        @if(session('success'))
                            <div class="mb-4 text-green-600">{{ session('success') }}</div>
                        @endif

                        <form action="{{ route('admin.blog.all') }}" method="GET" class="mb-4 flex space-x-4">
                            <div>
                                <label for="category" class="block text-sm font-medium text-gray-700">Filter by Category</label>
                                <select name="category" id="category" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    <option value="">All</option>
                                    <option value="1" {{ request('category') == 1 ? 'selected' : '' }}>Fresh Produce</option>
                                    <option value="2" {{ request('category') == 2 ? 'selected' : '' }}>Dairy & Eggs</option>
                                    <option value="3" {{ request('category') == 3 ? 'selected' : '' }}>Bakery</option>
                                    <option value="4" {{ request('category') == 4 ? 'selected' : '' }}>Meat & Seafood</option>
                                    <option value="5" {{ request('category') == 5 ? 'selected' : '' }}>Pantry Staples</option>
                                    <option value="6" {{ request('category') == 6 ? 'selected' : '' }}>Beverages</option>
                                    <option value="7" {{ request('category') == 7 ? 'selected' : '' }}>Frozen Foods</option>
                                    <option value="8" {{ request('category') == 8 ? 'selected' : '' }}>Household Essentials</option>
                                </select>
                            </div>
                            <div>
                                <label for="sort" class="block text-sm font-medium text-gray-700">Sort by Created At</label>
                                <select name="sort" id="sort" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    <option value="">Select</option>
                                    <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Oldest First</option>
                                    <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Newest First</option>
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
                                @foreach($blogs as $blog)
                                    <tr>
                                        <td class="border px-4 py-2">{{ Str::limit($blog->title, 35)}}</td>
                                       <td class="border px-4 py-2">
                                            @if($blog->category == 1)
                                                <span class="px-2 text-xs py-1 text-white rounded-lg bg-green-600">Fresh Produce</span>
                                            @elseif($blog->category == 2)
                                                <span class="px-2 text-xs py-1 text-white rounded-lg bg-blue-600">Dairy & Eggs</span>
                                            @elseif($blog->category == 3)
                                                <span class="px-2 text-xs py-1 text-white rounded-lg bg-yellow-600">Bakery</span>
                                            @elseif($blog->category == 4)
                                                <span class="px-2 text-xs py-1 text-white rounded-lg bg-red-600">Meat & Seafood</span>
                                            @elseif($blog->category == 5)
                                                <span class="px-2 text-xs py-1 text-white rounded-lg bg-purple-600">Pantry Staples</span>
                                            @elseif($blog->category == 6)
                                                <span class="px-2 text-xs py-1 text-white rounded-lg bg-indigo-600">Beverages</span>
                                            @elseif($blog->category == 7)
                                                <span class="px-2 text-xs py-1 text-white rounded-lg bg-gray-600">Frozen Foods</span>
                                            @elseif($blog->category == 8)
                                                <span class="px-2 text-xs py-1 text-white rounded-lg bg-pink-600">Household Essentials</span>
                                            @else
                                                <span class="px-2 text-xs py-1 text-white rounded-lg bg-yellow-600">No Category</span>
                                            @endif
                                        </td>

                                        <td class="border px-2 py-2">{{ $blog->created_at->diffForHumans() }}</td>
                                        <td class="border px-2 py-2">
                                            <form action="{{ route('admin.blog.delete', $blog->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this blog post?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mt-4">{{ $blogs->links() }}</div>
                    </section>
                </main>
            </div>
        </div>
    </main>
</x-app-layout>
