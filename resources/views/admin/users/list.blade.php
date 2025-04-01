<x-app-layout>
    <main>
        <div id="main-wrapper" class="flex flex-col xl:flex-row">
            <!-- Sidebar -->
            @include('components.adminSideBar')

            <!-- Main Content -->
            <div class="w-full ">
                <!-- Header -->
                <header class="w-full text-sm py-5 xl:px-9 px-5">
                    @include('components.adminNavBar')
                </header>

                <!-- Main Content -->
                <main class="h-full pt-4">
                    <div class="xl:px-9 px-5">
                        <h4 class="text-gray-800 text-2xl font-semibold mb-6">User Management</h4>

                        <!-- User Search and Filters -->
                        <div class="flex justify-between items-center mb-6">
                            <a
                                href="{{ route('admin.users.create') }}"
                                class="px-2 py-1 bg-green-600 text-white font-medium rounded-lg shadow hover:bg-green-700 transition duration-300"
                            >
                                Create New User
                            </a>
                        </div>

                        <form method="GET" action="{{ route('admin.users.list') }}" class="mb-6 bg-white p-4 rounded-lg shadow">
                            <div class="flex flex-col md:flex-row gap-4 items-center">
                                <input
                                    type="text"
                                    name="search"
                                    value="{{ request('search') }}"
                                    class="p-3 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                                    placeholder="Search users by name, email, or phone"
                                />
                                <select
                                    name="status"
                                    class="p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                                >
                                    <option value="">Filter by Status</option>
                                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="suspended" {{ request('status') == 'suspended' ? 'selected' : '' }}>Suspended</option>
                                </select>
                                <select
                                    name="sort"
                                    class="p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                                >
                                    <option value="">Sort by</option>
                                    <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest First</option>
                                    <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest First</option>
                                    <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Name (A-Z)</option>
                                    <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Name (Z-A)</option>
                                    <option value="status" {{ request('sort') == 'status' ? 'selected' : '' }}>Status</option>
                                </select>
                                <button
                                    type="submit"
                                    class="px-6 py-3 bg-blue-600 text-white font-medium rounded-lg shadow hover:bg-blue-700 transition duration-300"
                                >
                                    Search
                                </button>
                                <a
                                    href="{{ route('admin.users.list') }}"
                                    class="px-6 py-3 bg-gray-200 text-gray-700 font-medium rounded-lg shadow hover:bg-gray-300 transition duration-300"
                                >
                                    Reset
                                </a>
                            </div>
                        </form>

                        <!-- Bulk Delete Form -->
                        <form method="POST" action="{{ route('admin.users.bulk.delete') }}" id="bulk-delete-form" class="mb-4">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="mb-4 px-6 py-2 bg-red-600 text-white font-medium rounded-lg shadow hover:bg-red-700 transition duration-300" onclick="return confirm('Are you sure you want to delete the selected users?');">
                                Delete Selected Users
                            </button>

                            <!-- User Table -->
                            <div class="overflow-x-auto shadow rounded-lg bg-white">
                                <table class="table-auto w-full border-collapse rounded-lg overflow-hidden">
                                    <thead class="bg-blue-50">
                                        <tr>
                                            <th class="border px-2 py-2 text-left font-bold text-gray-700">
                                                <input type="checkbox" id="select-all">
                                            </th>
                                            <th class="border px-2 py-2 text-left font-bold text-gray-700">Full Name</th>
                                            <th class="border px-2 py-2 text-left font-bold text-gray-700">Email</th>
                                            <th class="border px-2 py-2 text-left font-bold text-gray-700">Phone</th>
                                            <th class="border px-2 py-2 text-left font-bold text-gray-700">Address</th>
                                            <th class="border px-2 py-2 text-left font-bold text-gray-700">Status</th>
                                            <th class="border px-2 py-2 text-left font-bold text-gray-700">
                                                <a href="{{ route('admin.users.list', ['sort' => request('sort') === 'newest' ? 'oldest' : 'newest', 'search' => request('search'), 'status' => request('status')]) }}">
                                                    Date
                                                    @if(request('sort') === 'newest')
                                                        <span>&#9650;</span> <!-- Up arrow -->
                                                    @elseif(request('sort') === 'oldest')
                                                        <span>&#9660;</span> <!-- Down arrow -->
                                                    @endif
                                                </a>
                                            </th>
                                            <th class="border px-2 py-2 text-left font-medium text-gray-700">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($users as $user)
                                            <tr class="hover:bg-gray-50">
                                                <td class="border px-2 py-2 text-gray-700 text-sm">
                                                    <input type="checkbox" name="users[]" value="{{ $user->id }}" class="user-checkbox">
                                                </td>
                                                <td class="border px-2 py-2 text-gray-700 text-sm">{{ $user->name }}</td>
                                                <td class="border px-2 py-2 text-gray-700 text-sm">{{ $user->email }}</td>
                                                <td class="border px-2 py-2 text-gray-700 text-sm">{{ $user->phone_number }}</td>
                                                <td class="border px-2 py-2 text-gray-700 text-sm">{{ $user->billingAddress->address_line_1 ?? 'no address' }}</td>
                                                <td class="border px-2 py-2">
                                                    <span class="text-sm font-medium
                                                        {{ $user->verify_status === 'active' ? 'text-green-600' : ($user->status === 'suspended' ? 'text-red-600' : 'text-gray-600') }}
                                                    ">
                                                        {{ ucfirst($user->verify_status ?? 'pending') }}
                                                    </span>
                                                </td>
                                                <td class="border px-2 py-2 text-gray-700 text-sm">{{ $user->created_at->diffForHumans() }}</td>
                                                <td class="flex gap-2 border px-2 py-2">
                                                    <a
                                                        href="{{ route('admin.users.profile', $user) }}"
                                                        class="text-blue-600 hover:text-blue-800 text-sm font-medium transition duration-200"
                                                    >
                                                        Profile
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="border px-4 py-2 text-center text-gray-700">No users found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </form>

                        <!-- Pagination -->
                        <div class="mt-6">
                            {{ $users->links() }}
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </main>
</x-app-layout>

<script>
    document.getElementById('select-all').addEventListener('change', function() {
        const checkboxes = document.querySelectorAll('.user-checkbox');
        checkboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
    });

    document.getElementById('bulk-delete-form').addEventListener('submit', function(event) {
        const checkboxes = document.querySelectorAll('.user-checkbox:checked');
        if (checkboxes.length === 0) {
            alert('Please select at least one user to delete.');
            event.preventDefault();
        }
    });
</script>