<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>

    <title>Add Money | Osusu Marketplace</title>

    @include('components.head')

</head>

<body class="body-bg-6">

    

 @include('components.header')
    <!-- Breadcrumb -->
    <section class="section-breadcrumb">
        <div class="cr-breadcrumb-image w-full h-[70px] bg-[#a566d1] z-[0] relative flex items-center max-[575px]:h-[100px]">
            <div class="container min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px] w-full m-auto">
                <div class="flex flex-wrap w-full">
                    <div class="w-full px-[12px]">
                        <div class="cr-breadcrumb-title flex items-center justify-between flex-row max-[575px]:flex-col">
                            <h2 class="mb-[0] font-Manrope text-[19px] leading-[1] font-bold text-[#fff] max-[1199px]:text-[18px] max-[767px]:text-[17px] max-[575px]:mb-[5px] max-[575px]:text-[20px]">Checkout</h2>
                            <span class="font-Poppins text-[14px] leading-[1.3] font-medium text-[#fff] capitalize max-[991px]:mt-[4px]"> <a href="/" class="text-[#fff]">Home</a> - Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
<!-- Wallet Section -->
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h3 class="text-xl font-semibold text-gray-700 mb-4">Wallet Balance</h3>
            <div class="bg-gray-50 p-4 rounded-lg mb-6">
                <p class="text-2xl font-bold text-green-600">₦{{ number_format(Auth::user()->wallet_balance ?? 0, 2) }}</p>
            </div>
            <form action="{{ route('wallet.deposit') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="amount" class="block text-gray-600 font-medium mb-2">Enter Amount to Deposit</label>
                    <input 
                        type="number" 
                        name="amount" 
                        id="amount"
                        placeholder="Enter amount" 
                        class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-purple-500"
                        required
                    >
                </div>
                <button 
                    type="submit" 
                    class="w-full bg-purple-600 text-white py-2 rounded-lg hover:bg-purple-700 transition-all">
                    Proceed to Paystack
                </button>
            </form>
        </div>

        <!-- Transactions Table -->
        <div class="mt-8 bg-white shadow-md rounded-lg p-6">
            <h3 class="text-xl font-semibold text-gray-700 mb-4">Transaction History</h3>
            <table class="min-w-full table-auto">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left text-gray-600">Transaction Type</th>
                        <th class="px-4 py-2 text-left text-gray-600">Amount</th>
                        <th class="px-4 py-2 text-left text-gray-600">Status</th>
                        <th class="px-4 py-2 text-left text-gray-600">Transaction Reference</th>
                        <th class="px-4 py-2 text-left text-gray-600">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $transaction)
                        <tr>
                            <td class="px-4 py-2">{{ ucfirst($transaction->type) }}</td>
                            <td class="px-4 py-2">₦{{ $transaction->amount }}</td>
                            <td class="px-4 py-2">{{ ucfirst($transaction->status) }}</td>
                            <td class="px-4 py-2">{{ $transaction->transaction_reference }}</td>
                            <td class="px-4 py-2">{{ $transaction->created_at->format('Y-m-d H:i:s') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include('components.marketplace_footer')


    <!-- Tab to top -->
    <a href="#Top" class="back-to-top result-placeholder h-[38px] w-[38px] hidden fixed right-[15px] bottom-[15px] z-[10] cursor-pointer rounded-[20px] bg-[#fff] text-[#a566d1] border-[1px] border-solid border-[#a566d1] text-center text-[22px] leading-[1.6] hover:transition-all hover:duration-[0.3s] hover:ease-in-out">
        <i class="ri-arrow-up-line text-[20px]"></i>
        <div class="back-to-top-wrap">
            <svg viewBox="-1 -1 102 102" class="w-[36px] h-[36px] fixed right-[16px] bottom-[16px]">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" class="fill-transparent stroke-[#a566d1] stroke-[5px]" />
            </svg>
        </div>
    </a>


    <!-- Vendor Custom -->
    <script src="{{ asset('assets/js/vendor/jquery-3.6.4.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/mixitup.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/range-slider.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/aos.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/slick.min.js') }}"></script>

    <!-- Main Custom -->
    <script src="{{ asset('assets/js/main.js') }}"></script>



</body>

</html>
