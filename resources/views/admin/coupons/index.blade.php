<x-app-layout>
    <main>
        <div id="main-wrapper" class="flex">
            @include('components.adminSideBar')

            <div class="w-full ">

                <!-- Header -->
                <header class="container w-full text-sm py-5 xl:px-9 px-5">
                    @include('components.adminNavBar')
                </header>

                <!-- Main Content -->
                <main class="h-full overflow-y-auto max-w-full pt-4">
                    <div class="container mx-auto">
                        <div class="flex justify-between items-center mb-6">
                            <h4 class="text-gray-800 text-2xl font-semibold">Coupon Management</h4>
                            <a href="{{ route('admin.coupons.create') }}" class="px-6 py-3 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition">
                                + Create New Coupon
                            </a>
                        </div>

                        <!-- Coupon Search and Filters -->
                        <form method="GET" action="{{ route('admin.coupons.index') }}" class="mb-6 bg-white p-4 rounded-lg shadow">
                            <div class="flex gap-4 items-center flex-wrap">
                                <input
                                    type="text"
                                    name="search"
                                    value="{{ request('search') }}"
                                    class="p-3 w-64 border border-gray-300 rounded-lg"
                                    placeholder="Search by code"
                                />
                                <select name="type" class="p-3 border border-gray-300 rounded-lg">
                                    <option value="">All Types</option>
                                    <option value="percentage" {{ request('type') == 'percentage' ? 'selected' : '' }}>Percentage</option>
                                    <option value="fixed" {{ request('type') == 'fixed' ? 'selected' : '' }}>Fixed Amount</option>
                                    <option value="free_shipping" {{ request('type') == 'free_shipping' ? 'selected' : '' }}>Free Shipping</option>
                                </select>
                                <select name="status" class="p-3 border border-gray-300 rounded-lg">
                                    <option value="">All Statuses</option>
                                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="expired" {{ request('status') == 'expired' ? 'selected' : '' }}>Expired</option>
                                    <option value="redeemed" {{ request('status') == 'redeemed' ? 'selected' : '' }}>Redeemed</option>
                                </select>
                                <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                                    Filter
                                </button>
                                <a href="{{ route('admin.coupons.index') }}" class="px-6 py-3 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">
                                    Reset
                                </a>
                            </div>
                        </form>

                        <!-- Coupons Table -->
                        <div class="overflow-x-auto shadow rounded-lg bg-white">
                            <table class="table-auto w-full border-collapse">
                                <thead class="bg-blue-50">
                                    <tr>
                                        <th class="px-4 py-3 text-left font-medium">Code</th>
                                        <th class="px-4 py-3 text-left font-medium">Discount</th>
                                        <th class="px-4 py-3 text-left font-medium">Expires At</th>
                                        <th class="px-4 py-3 text-left font-medium">Usage</th>
                                        <th class="px-4 py-3 text-left font-medium">Status</th>
                                        <th class="px-4 py-3 text-left font-medium">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($coupons as $coupon)
                                        <tr class="hover:bg-gray-50 border-t">
                                            <td class="px-4 py-3 font-mono">{{ $coupon->code }}</td>
                                            <td class="px-4 py-3">
                                                @if($coupon->type === 'percentage')
                                                    {{ $coupon->discount_percentage }}%
                                                @elseif($coupon->type === 'fixed')
                                                    ${{ number_format($coupon->discount_fixed, 2) }}
                                                @else
                                                    Free Shipping
                                                @endif
                                            </td>
                                            <td class="px-4 py-3">{{ $coupon->expires_at->format('M d, Y H:i') }}</td>
                                            <td class="px-4 py-3">
                                                {{ $coupon->used_count }} / {{ $coupon->max_uses ?? '∞' }}
                                            </td>
                                            <td class="px-4 py-3">
                                                <span class="px-2 py-1 rounded-full text-sm
                                                    @if($coupon->status === 'Active') bg-green-100 text-green-800
                                                    @elseif($coupon->status === 'Expired') bg-red-100 text-red-800
                                                    @else bg-yellow-100 text-yellow-800 @endif">
                                                    {{ $coupon->status }}
                                                </span>
                                            </td>
                                            <td class="px-4 py-3 flex gap-3">
                                                <a href="{{ route('admin.coupons.edit', $coupon) }}" class="text-blue-600 hover:text-blue-800">
                                                    Edit
                                                </a>
                                                <a href="{{ route('admin.coupons.show', $coupon) }}" class="text-gray-600 hover:text-gray-800">
                                                    Preview
                                                </a>
                                                <form action="{{ route('admin.coupons.destroy', $coupon) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-800"
                                                        onclick="return confirm('Delete this coupon permanently?')">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="px-4 py-3 text-center text-gray-700">No coupons found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <div class="mt-6">
                            {{ $coupons->links() }}
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </main>
</x-app-layout>