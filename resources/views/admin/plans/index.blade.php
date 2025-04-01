<x-app-layout>
    <main>
        <div id="main-wrapper" class="flex">
            @include('components.adminSideBar')

            <div class="w-full ">
                <header class="container w-full text-sm py-5 xl:px-9 px-5">
                    @include('components.adminNavBar')
                </header>

                <main class="h-full overflow-y-auto max-w-full pt-4 mb-8">
                    <div class="container mx-auto">
                        <h4 class="text-gray-600 text-lg font-semibold mb-6">Savings Plans Management</h4>



                        <!-- Plans Table -->
                        <div class="overflow-x-auto shadow rounded-lg bg-white">
                            <table class="table-auto w-full border-collapse">
                                <thead>
                                    <tr class="bg-gray-100">
                                        <th class="border px-4 py-2 text-left">Plan ID</th>
                                        <th class="border px-4 py-2 text-left">User ID</th>
                                        <th class="border px-4 py-2 text-left">Installment</th>
                                        <th class="border px-4 py-2 text-left">Total Price</th>
                                        <th class="border px-4 py-2 text-left">Created At</th>
                                        <th class="border px-4 py-2 text-left">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($plans as $plan)
                                        <tr class="hover:bg-gray-50">
                                            <td class="border px-4 py-2">{{ $plan->transaction_id }}</td>
                                            <td class="border px-4 py-2">{{ $plan->users?->name ?? 'N/A' }}</td>
                                            <td class="border px-4 py-2">{{ $plan->installment }} Months</td>
                                            <td class="border px-4 py-2">₦{{ number_format($plan->all_total_price, 2) }}</td>
                                            <td class="border px-4 py-2">
                                                {{ $plan->created_at->diffForHumans() }}
                                            </td>
                                            <td class="border px-4 py-2">
                                                <a href="{{ route('plans.show', $plan->id) }}"
                                                   class="text-green-600 hover:text-green-800 font-medium transition duration-200">
                                                    View
                                                </a>
                                                <a href="{{ route('plans.edit', $plan->id) }}"
                                                   class="text-blue-600 hover:text-blue-800 font-medium transition duration-200 ml-2">
                                                    Edit
                                                </a>
                                                <form action="{{ route('plans.destroy', $plan->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-800 font-medium transition duration-200 ml-2">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <div class="mt-4">
                            {{ $plans->links() }}
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </main>
</x-app-layout>
