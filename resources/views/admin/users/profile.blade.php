<x-app-layout>
    <main>
        <!-- Start the project -->
        <div id="main-wrapper" class="flex">
            @include('components.adminSideBar')

            <div class="w-full ">

                <!-- Header Start -->
                <header class="container w-full text-sm py-5 xl:px-9 px-5">
                    <!-- ========== HEADER ========== -->
                    @include('components.adminNavBar')
                    <!-- ========== END HEADER ========== -->
                </header>
                <!-- Header End -->

                <!-- Main Content -->
                <main class="h-full overflow-y-auto max-w-full pt-4">
                    <div class="container mx-auto">
                        <!-- Header Section with User Overview -->
                        <div class="flex flex-col md:flex-row justify-between items-start gap-4 mb-6">
                            <div>
                                <h4 class="text-gray-800 text-2xl font-bold">User Profile</h4>
                                <p class="text-gray-500">ID: #{{ $user->id }} | Member since {{ $user->created_at->format('M d, Y') }}</p>
                            </div>
                            <div class="flex gap-3">
                                <a href="{{ route('admin.users.list') }}"
                                    class="flex items-center gap-2 px-4 py-2 bg-gray-100 text-gray-600 rounded-lg hover:bg-gray-200 transition-all duration-200">
                                    <i class="ti ti-arrow-left text-lg"></i>
                                    Back to Users
                                </a>
                                @if($user->verify_status !== 'suspended')
                                    <button class="px-4 py-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition-all duration-200">
                                        <i class="ti ti-ban mr-2"></i>Suspend Account
                                    </button>
                                @else
                                    <button class="px-4 py-2 bg-green-50 text-green-600 rounded-lg hover:bg-green-100 transition-all duration-200">
                                        <i class="ti ti-check-circle mr-2"></i>Reactivate Account
                                    </button>
                                @endif
                            </div>
                        </div>

                        <!-- User Information Grid -->
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                            <!-- Left Column - Basic Info -->
                            <div class="lg:col-span-2">
                                <div class="bg-white rounded-xl shadow-sm border border-gray-100">
                                    <!-- User Basic Info -->
                                    <div class="p-6 border-b border-gray-100">
                                        <div class="flex justify-between items-center mb-4">
                                            <h5 class="text-lg font-semibold text-gray-700">Personal Information</h5>
                                            <span class="px-3 py-1 rounded-full text-sm font-medium {{
                                                $user->verify_status === 'active' ? 'bg-green-100 text-green-800' :
                                                ($user->verify_status === 'suspended' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800')
                                            }}">
                                                {{ ucfirst($user->verify_status) }}
                                            </span>
                                        </div>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                            <div class="space-y-4">
                                                <div>
                                                    <label class="text-sm text-gray-500">Full Name</label>
                                                    <p class="text-gray-800 font-medium">{{ $user->name }}</p>
                                                </div>
                                                <div>
                                                    <label class="text-sm text-gray-500">Email Address</label>
                                                    <p class="text-gray-800 font-medium">{{ $user->email }}</p>
                                                </div>
                                                <div>
                                                    <label class="text-sm text-gray-500">Phone Number</label>
                                                    <p class="text-gray-800 font-medium">{{ $user->phone_number }}</p>
                                                </div>
                                            </div>
                                            <div class="space-y-4">
                                                <div>
                                                    <label class="text-sm text-gray-500">Account Type</label>
                                                    <p class="text-gray-800 font-medium capitalize">{{ $user->user_type ?? 'Individual' }}</p>
                                                </div>
                                                <div>
                                                    <label class="text-sm text-gray-500">Last Login</label>
                                                    <p class="text-gray-800 font-medium">{{ $user->last_login_at ? $user->last_login_at->format('M d, Y H:i') : 'Never' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Corporate Information (if applicable) -->
                                    @if($user->user_type === 'corporate')
                                    <div class="p-6 border-b border-gray-100">
                                        <h5 class="text-lg font-semibold text-gray-700 mb-4">Organization Details</h5>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                            <div>
                                                <label class="text-sm text-gray-500">Organization Name</label>
                                                <p class="text-gray-800 font-medium">{{ $user->organisation_name }}</p>
                                            </div>
                                            <div>
                                                <label class="text-sm text-gray-500">Organization Type</label>
                                                <p class="text-gray-800 font-medium">{{ $user->organisation_type }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Right Column - Statistics -->
                            <div class="lg:col-span-1">
                                <div class="bg-white rounded-xl shadow-sm border border-gray-100">
                                    <div class="p-6 border-b border-gray-100">
                                        <h5 class="text-lg font-semibold text-gray-700 mb-4">Account Overview</h5>
                                        <div class="space-y-6">
                                            <!-- Wallet Balance -->
                                            <div class="bg-blue-50 p-4 rounded-lg">
                                                <label class="text-sm text-blue-600">Current Balance</label>
                                                <p class="text-2xl font-bold text-blue-700">₦{{ number_format($user->wallet_balance, 2) }}</p>
                                            </div>

                                            <!-- Statistics Cards -->
                                            <div class="grid grid-cols-2 gap-4">
                                                <div class="bg-green-50 p-4 rounded-lg">
                                                    <label class="text-sm text-green-600">Total Deposits</label>
                                                    {{ $totalDeposits }}
                                                </div>
                                                <div class="bg-purple-50 p-4 rounded-lg">
                                                    <label class="text-sm text-purple-600">Active Plans</label>
                                                    <p class="text-xl font-bold text-purple-700">
                                                        {{ $installments->where('status', 'active')->count() }}
                                                    </p>
                                                </div>
                                            </div>

                                            <!-- Activity Summary -->
                                            <div class="space-y-3">
                                                <div class="flex justify-between items-center">
                                                    <span class="text-gray-600">Total Transactions</span>
                                                    <span class="font-medium">{{ $transactions->total() }}</span>
                                                </div>
                                                <div class="flex justify-between items-center">
                                                    <span class="text-gray-600">Completed Orders</span>
                                                    <span class="font-medium">{{ $transactions->where('status', 'completed')->count() }}</span>
                                                </div>
                                                <div class="flex justify-between items-center">
                                                    <span class="text-gray-600">Last Transaction</span>
                                                    <span class="font-medium">
                                                        {{ $transactions->first() ? $transactions->first()->created_at->format('M d, Y') : 'N/A' }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Transactions & History Section -->
                        <div class="space-y-6">
                            <!-- Wallet History -->
                            <div class="bg-white rounded-xl shadow-sm border border-gray-100">
                                <div class="p-6 border-b border-gray-100">
                                    <div class="flex justify-between items-center mb-4">
                                        <h5 class="text-lg font-semibold text-gray-700">Wallet History</h5>
                                        <span class="text-sm text-gray-500">Total Records: {{ $wallethistory->total() }}</span>
                                    </div>
                                    @if($wallethistory->isEmpty())
                                        <div class="text-center py-4">
                                            <p class="text-gray-500">No wallet history found.</p>
                                        </div>
                                    @else
                                        <div class="overflow-x-auto">
                                            <table class="min-w-full">
                                                <thead class="bg-gray-50">
                                                    <tr>
                                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Amount</th>
                                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Type</th>
                                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Reference</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="divide-y divide-gray-100">
                                                    @foreach($wallethistory as $history)
                                                        <tr class="hover:bg-gray-50">
                                                            <td class="px-4 py-3 text-sm text-gray-900">{{ $history->created_at->format('M d, Y H:i') }}</td>
                                                            <td class="px-4 py-3 text-sm font-medium">₦{{ $history->amount }}</td>
                                                            <td class="px-4 py-3 text-sm">
                                                                <span class="px-2 py-1 rounded-full text-xs font-medium {{ $history->type === 'deposit' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                                    {{ ucfirst($history->type) }}
                                                                </span>
                                                            </td>
                                                            <td class="px-4 py-3 text-sm">{{ ucfirst($history->status) }}</td>
                                                            <td class="px-4 py-3 text-sm text-gray-500">{{ $history->transaction_reference }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="mt-4">
                                            {{ $wallethistory->links() }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Installment Plans -->
                            <div class="bg-white rounded-xl shadow-sm border border-gray-100">
                                <div class="p-6 border-b border-gray-100">
                                    <div class="flex justify-between items-center mb-4">
                                        <h5 class="text-lg font-semibold text-gray-700">Installment Plans</h5>
                                        <span class="text-sm text-gray-500">Total Plans: {{ $installments->total() }}</span>
                                    </div>
                                    @if($installments->isEmpty())
                                        <div class="text-center py-4">
                                            <p class="text-gray-500">No installment plans found.</p>
                                        </div>
                                    @else
                                        <div class="overflow-x-auto">
                                            <table class="min-w-full">
                                                <thead class="bg-gray-50">
                                                    <tr>
                                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Start Date</th>
                                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Due Date</th>
                                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total Price</th>
                                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Monthly Payment</th>
                                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="divide-y divide-gray-100">
                                                    @foreach($installments as $plan)
                                                        <tr class="hover:bg-gray-50">
                                                            <td class="px-4 py-3 text-sm">{{ $plan->created_at->format('M d, Y') }}</td>
                                                            <td class="px-4 py-3 text-sm">{{ $plan->due_date->format('M d, Y') }}</td>
                                                            <td class="px-4 py-3 text-sm font-medium">₦{{ number_format($plan->all_total_price, 2) }}</td>
                                                            <td class="px-4 py-3 text-sm">₦{{ number_format($plan->monthly_payment, 2) }}</td>
                                                            <td class="px-4 py-3 text-sm">
                                                                <span class="px-2 py-1 rounded-full text-xs font-medium {{ $plan->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                                                    {{ ucfirst($plan->status) }}
                                                                </span>
                                                            </td>
                                                            <td class="px-4 py-3 text-sm">
                                                                <button onclick="openModal('{{ $plan->details }}')"
                                                                    class="text-blue-600 hover:text-blue-800 font-medium">
                                                                    View Details
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="mt-4">
                                            {{ $installments->links() }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Transactions -->
                            <div class="bg-white rounded-xl shadow-sm border border-gray-100">
                                <div class="p-6 border-b border-gray-100">
                                    <div class="flex justify-between items-center mb-4">
                                        <h5 class="text-lg font-semibold text-gray-700">Recent Transactions</h5>
                                        <span class="text-sm text-gray-500">Total Transactions: {{ $transactions->total() }}</span>
                                    </div>
                                    @if($transactions->isEmpty())
                                        <div class="text-center py-4">
                                            <p class="text-gray-500">No transactions found.</p>
                                        </div>
                                    @else
                                        <div class="overflow-x-auto">
                                            <table class="min-w-full">
                                                <thead class="bg-gray-50">
                                                    <tr>
                                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Amount</th>
                                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Type</th>
                                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="divide-y divide-gray-100">
                                                    @foreach($transactions as $transaction)
                                                        <tr class="hover:bg-gray-50">
                                                            <td class="px-4 py-3 text-sm">{{ $transaction->created_at->format('M d, Y H:i') }}</td>
                                                            <td class="px-4 py-3 text-sm font-medium">₦{{ number_format($transaction->amount, 2) }}</td>
                                                            <td class="px-4 py-3 text-sm">{{ ucfirst($transaction->type) }}</td>
                                                            <td class="px-4 py-3 text-sm">
                                                                <span class="px-2 py-1 rounded-full text-xs font-medium {{ $transaction->status === 'completed' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                                                    {{ ucfirst($transaction->status) }}
                                                                </span>
                                                            </td>
                                                            <td class="px-4 py-3 text-sm">
                                                                <button onclick="openTModal('{{ $transaction->note }}')"
                                                                    class="text-blue-600 hover:text-blue-800 font-medium">
                                                                    View Details
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="mt-4">
                                            {{ $transactions->links() }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Abandoned Carts -->
                            <div class="bg-white rounded-xl shadow-sm border border-gray-100">
                                <div class="p-6 border-b border-gray-100">
                                    <div class="flex justify-between items-center mb-4">
                                        <h5 class="text-lg font-semibold text-gray-700">Abandoned Cart Items</h5>
                                        <span class="text-sm text-gray-500">Total Items: {{ $user->cart?->count() ?? 0 }}</span>
                                    </div>
                                    @if(empty($user->cart) || $user->cart->isEmpty())
                                        <div class="text-center py-4">
                                            <p class="text-gray-500">No items in cart.</p>
                                        </div>
                                    @else
                                        <div class="overflow-x-auto">
                                            <table class="min-w-full">
                                                <thead class="bg-gray-50">
                                                    <tr>
                                                        <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase">Product</th>
                                                        <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase">Quantity</th>
                                                        <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase">Price</th>
                                                        <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase">Added On</th>
                                                        <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase">Payment Plan</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="divide-y divide-gray-100">
                                                    @foreach($user->cart as $item)
                                                        <tr class="hover:bg-gray-50">
                                                            <td class="px-2 py-3 text-sm">{{ $item->product->name }}</td>
                                                            <td class="px-2 py-3 text-sm">{{ $item->quantity }}</td>
                                                            <td class="px-2 py-3 text-sm font-medium">₦{{ number_format($item->price, 2) }}</td>
                                                            <td class="px-2 py-3 text-sm">{{ $item->created_at->format('M d, Y H:i') }}</td>
                                                            <td class="px-2 py-3 text-sm">
                                                                @if($item->installment_period)
                                                                    <span class="px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                                        {{ $item->installment_period }} Months Installment
                                                                    </span>
                                                                @else
                                                                    <span class="px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                                                        One-time Payment
                                                                    </span>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <!-- Main Content End -->
            </div>
        </div>
        <!-- End of project -->
    </main>

    <!-- Installment Modal -->
    <div id="detailsModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-11/12 max-w-2xl">
            <h3 class="text-xl font-semibold mb-4">Purchase Details</h3>
            <div id="modalContent" class="overflow-x-auto">
                <!-- Details will be inserted here -->
            </div>
            <div class="mt-4 text-right">
                <button
                    onclick="closeModal()"
                    class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition-colors"
                >
                    Close
                </button>
            </div>
        </div>
    </div>

    <!-- Transaction Modal -->
    <div id="noteTModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-11/12 max-w-2xl">
            <h3 class="text-xl font-semibold mb-4">Purchase Details</h3>
            <div id="modalContentt" class="overflow-x-auto">
                <!-- Details will be inserted here -->
            </div>
            <div class="mt-4 text-right">
                <button
                    onclick="closeTModal()"
                    class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition-colors"
                >
                    Close
                </button>
            </div>
        </div>
    </div>

    <!-- TinyMCE CDN -->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        // Initialize TinyMCE editor
        tinymce.init({
            selector: '#message',
            menubar: false,
            plugins: ['link', 'table', 'lists', 'code', 'emoticons', 'image'],
            toolbar: 'undo redo | bold italic underline | link image | bullist numlist | emoticons | code',
            height: 300,
        });

        // Function to open the installment modal and display details
        function openModal(details) {
            const modal = document.getElementById('detailsModal');
            const modalContent = document.getElementById('modalContent');
            modalContent.innerHTML = details;
            modal.classList.remove('hidden');
        }

        // Function to close the installment modal
        function closeModal() {
            const modal = document.getElementById('detailsModal');
            modal.classList.add('hidden');
        }

        // Function to open the transaction modal and display details
        function openTModal(note) {
            const modalt = document.getElementById('noteTModal');
            const modalContentt = document.getElementById('modalContentt');
            modalContentt.innerHTML = note;
            modalt.classList.remove('hidden');
        }

        // Function to close the transaction modal
        function closeTModal() {
            const modalt = document.getElementById('noteTModal');
            modalt.classList.add('hidden');
        }
    </script>
</x-app-layout>