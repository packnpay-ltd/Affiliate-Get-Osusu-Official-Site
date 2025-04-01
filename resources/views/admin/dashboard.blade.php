<x-app-layout>
    <main>
    <!--start the project-->
    <div id="main-wrapper" class=" flex">
            @include('components.adminSideBar')

        <div class=" w-full ">

            <!--  Header Start -->
            <header class="container full-container w-full text-sm py-5 xl:px-9 px-5">


                <!-- ========== HEADER ========== -->

            @include('components.adminNavBar')

                <!-- ========== END HEADER ========== -->
            </header>
            <!--  Header End -->

            <!-- Main Content -->
            <main class="h-full overflow-y-auto  max-w-full  pt-4">
                <div class="container mx-auto p-6">
    <h2 class="text-2xl font-semibold mb-4">Dashboard Overview</h2>

    <!-- KPI Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Users -->
        <div class="p-4 bg-white rounded-lg shadow">
            <h3 class="text-lg font-medium">Total Users</h3>
            <p class="text-2xl font-semibold text-blue-600">{{ $totalUsers }}</p>
        </div>

        <!-- Active Savings Plans -->
        <div class="p-4 bg-white rounded-lg shadow">
            <h3 class="text-lg font-medium">Active Savings Plans</h3>
            <p class="text-2xl font-semibold text-green-600">{{ $activePlans }}</p>
        </div>

        <!-- Total Deposits -->
        <div class="p-4 bg-white rounded-lg shadow">
            <h3 class="text-lg font-medium">Total Deposits (Monthly)</h3>
            <p class="text-2xl font-semibold text-indigo-600">₦{{ number_format($totalDeposits, 2) }}</p>
        </div>

        <!-- Total Withdrawals -->
        <div class="p-4 bg-white rounded-lg shadow">
            <h3 class="text-lg font-medium">Total Withdrawals (Monthly)</h3>
            <p class="text-2xl font-semibold text-red-600">₦{{ number_format($totalWithdrawals, 2) }}</p>
        </div>
    </div>

      <!-- Order History Section -->
<div class="grid grid-cols-1 lg:gap-x-6 gap-x-0 lg:gap-y-0 gap-y-6">
    <div class="col-span-2">
        <div class="card h-full">
            <div class="card-body">
                <!-- Card Header with Title and Button -->
                <div class="flex justify-between items-center mb-6">
                    <h4 class="text-gray-600 text-lg font-semibold">Recent Order History</h4>
                    <a href="{{ route('view.purchases') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition-colors">
                        View Purchases
                    </a>
                </div>

                <!-- Table -->
                <div class="relative overflow-x-auto">
                    <table class="text-left w-full whitespace-nowrap text-sm">
                        <thead class="text-gray-700">
                            <tr class="font-semibold text-gray-600">
                                <th scope="col" class="p-2">Order ID</th>
                                <th scope="col" class="p-2">User</th>
                                <th scope="col" class="p-2">Total Amount</th>
                                <th scope="col" class="p-2">Payment Method</th>
                                <th scope="col" class="p-2">Tracking ID</th>
                                <th scope="col" class="p-2">Delivery Fee</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentOrders as $order)
                            <tr class="hover:bg-gray-50">
                                <td class="p-2 font-semibold text-gray-600">{{ $order->id }}</td>
                                <td class="p-2">
                                    <div class="flex flex-col gap-1">
                                        <h3 class="font-semibold text-gray-600">{{ $order->user->name ?? 'Unknown User' }}</h3>
                                        <span class="font-normal text-gray-500">{{ $order->user->email ?? 'N/A' }}</span>
                                    </div>
                                </td>
                                <td class="p-2">
                                    <span class="font-semibold text-base text-gray-600">₦{{ number_format($order->total_amount, 2) }}</span>
                                </td>
                                <td class="p-2">
                                    <span class="font-normal text-gray-500">{{ ucfirst($order->payment_method) }}</span>
                                </td>
                                <td class="p-2">
                                    <span class="font-normal text-gray-500">{{ $order->tracking_id ?? 'N/A' }}</span>
                                </td>
                                <td class="p-2">
                                    <span class="font-semibold text-base text-gray-600">₦{{ number_format($order->delivery_fee, 2) }}</span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="p-4 text-center text-gray-500">No orders found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



</div>
                <div class="container full-container py-5 flex flex-col gap-6">
                      <!-- Order Transaction Section -->
            <div class="grid grid-cols-1 lg:gap-x-6 gap-x-0 lg:gap-y-0 gap-y-6">
    <div class="col-span-2">
        <div class="card h-full">
            <div class="card-body">
                <h4 class="text-gray-600 text-lg font-semibold mb-6">Recent Transaction</h4>
                <div class="relative overflow-x-auto">
                    <!-- table -->
                    <table class="text-left w-full whitespace-nowrap text-sm">
                        <thead class="text-gray-700">
                            <tr class="font-semibold text-gray-600">
                                <th scope="col" class="p-2">Id</th>
                                <th scope="col" class="p-2">User</th>
                                <th scope="col" class="p-2">Type</th>
                                <th scope="col" class="p-2">Status</th>
                                <th scope="col" class="p-2">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentTransactions as $index => $transaction)
                            <tr>
                                <td class="p-2 font-semibold text-gray-600">{{ $transaction->id }}</td>
                                <td class="p-2">
                                    <div class="flex flex-col gap-1">
                                        <h3 class="font-semibold text-gray-600">{{ $transaction->user->name ?? 'Unknown User' }}</h3>
                                        <span class="font-normal text-gray-500">{{ $transaction->user->email ?? 'N/A' }}</span>
                                    </div>
                                </td>
                                <td class="p-2">
                                    <span class="font-normal text-gray-500">{{ $transaction->type }}</span>
                                </td>
                                <td class="p-2">
                                    <span class="inline-flex items-center py-[3px] px-[10px] rounded-2xl font-semibold text-white
                                        @if($transaction->status == 'pending') bg-yellow-500
                                        @elseif($transaction->status == 'approved') bg-green-500
                                        @elseif($transaction->status == 'rejected') bg-red-500
                                        @else bg-gray-500 @endif">
                                        {{ ucfirst($transaction->status) }}
                                    </span>
                                </td>
                                <td class="p-2">
                                    <span class="font-semibold text-base text-gray-600">₦{{ $transaction->amount }}</span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="p-4 text-center text-gray-500">No transactions found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



                    <h4 class="text-gray-600 text-lg font-semibold mb-6">Recently Added Products</h4>

                    <div class="grid grid-cols-1 xl:grid-cols-4 lg:grid-cols-2 gap-6">

                        @if($products->isEmpty())
                            <div class="col-span-4 text-center">
                                <h6 class="text-gray-500 text-lg font-semibold">No new products added yet.</h6>
                            </div>
                        @else

                            @foreach ($products as $product)
                                <div class="card overflow-hidden">
                                    <div class="relative">
                                        <a href="javascript:void(0)">
                                            <img src="{{ asset('storage/' . $product->image) }}"
                                                 alt="{{ $product->name }}" class="size-40">
                                        </a>
                                        <a href="javascript:void(0)"
                                           class="bg-blue-600 w-8 h-8 flex justify-center items-center text-white rounded-full absolute bottom-0 right-0 mr-4 -mb-3">
                                            <i class="ti ti-basket text-base"></i>
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h6 class="text-base font-semibold text-gray-600 mb-1">{{ $product->name }}</h6>
                                        <div class="flex justify-between">
                                            <div class="flex gap-2 items-center">
                                                <h6 class="text-base text-gray-600 font-semibold">
                                                    ${{ number_format($product->price, 2) }}
                                                </h6>
                                                <span class="text-gray-500 text-sm">
                                                    <del>${{ number_format($product->price * 1.2, 2) }}</del> <!-- Example of discount -->
                                                </span>
                                            </div>
                                            <ul class="list-none flex gap-1">
                                                @for ($i = 0; $i < 5; $i++)
                                                    <li>
                                                        <a href="javascript:void(0)">
                                                            <i class="ti ti-star text-yellow-500 text-sm"></i>
                                                        </a>
                                                    </li>
                                                @endfor
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>




                    <footer>
                        <p class="text-base text-gray-500 font-normal p-3 text-center">
                            Design and Developed by <a href="/"
                                class="text-blue-600 underline hover:text-blue-700">Osusu</a>
                        </p>
                    </footer>
                </div>


            </main>
            <!-- Main Content End -->

        </div>
    </div>
    <!--end of project-->
</main>


</x-app-layout>
