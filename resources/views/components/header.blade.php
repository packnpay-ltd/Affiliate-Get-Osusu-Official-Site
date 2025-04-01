    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

@include('sweetalert::alert')


    <!-- Header -->
    <header class="h-[142px] max-[991px]:h-[133px] max-[575px]:h-[173px] bg-[#fff] border-b-[1px] border-solid border-[#e9e9e9]">
        <div class="flex flex-wrap justify-between relative items-center mx-auto min-[1600px]:max-w-[1500px] min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
            <div class="flex flex-wrap w-full">
                <div class="w-full px-[12px]">
                    <div class="top-header py-[20px] flex flex-row gap-[20px] justify-between border-b-[1px] border-solid border-[#e9e9e9] relative z-[4] max-[575px]:py-[15px] max-[575px]:block">
                        <a href="{{ route('dashboard.marketplace') }} " class="cr-logo max-[575px]:mb-[15px] max-[575px]:flex max-[575px]:justify-center">
                            <img src="{{ asset('images/osusu_logo.svg') }}" alt="logo" class="logo block  lg:w-[13rem] md:w-[13rem] w-[7rem]">
                        </a>


                       <div x-data="searchBox()" class="relative w-full">
    <form @submit.prevent="redirectToSearchPage" class="cr-search relative max-[575px]:max-w-[350px] max-[575px]:m-auto">
        <input
            x-model="search"
            @input="debouncedFetchResults"
            @focus="open = true"
            @click.away="open = false"
            class="search-input w-full h-[45px] pl-[15px] pr-[175px] border-[1px] border-solid border-[#64b496] rounded-[5px] outline-[0] max-[991px]:max-w-[350px] max-[575px]:w-full max-[420px]:pr-[45px]"
            type="text"
            placeholder="Search For items..."
        >
        <!-- Search Button -->
        <button type="submit" class="search-btn w-[90px] bg-[#8637B9] absolute right-[0] top-[0] bottom-[0] rounded-r-[5px] flex items-center justify-center">
            <i class="ri-search-line text-[14px] text-[#fff]"></i>
        </button>
    </form>

    <!-- Loading Spinner -->
    <div x-show="loading" class="absolute right-[100px] top-[12px]">
        <svg class="animate-spin h-5 w-5 text-purple-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
    </div>

    <!-- Search Results Dropdown -->
    <div
        x-show="open && results.length > 0"
        x-transition
        @click.away="open = false"
        class="absolute w-full bg-white border border-gray-300 shadow-lg mt-1 rounded-md z-50 max-h-[400px] overflow-y-auto"
    >
        <template x-for="product in results" :key="product.id">
            <a :href="'/marketplace/product/' + product.id" class="flex items-center p-2 border-b hover:bg-gray-100">
                <img :src="'/storage/' + product.image" class="w-10 h-10 rounded-md mr-3 object-cover">
                <div>
                    <p class="text-sm font-semibold" x-text="product.name"></p>
                    <p class="text-xs text-gray-500">₦<span x-text="product.price.toLocaleString()"></span></p>
                </div>
            </a>
        </template>
    </div>
</div>





                        <div class="cr-right-bar flex items-center max-[991px]:hidden">
                            <ul class="navbar-nav m-auto relative z-[3]">
                                <li class="nav-item dropdown relative">
                                    <a href="{{ route('dashboard') }}" class="nav-link  cr-right-bar-item transition-all duration-[0.3s] ease-in-out flex items-center relative text-[14px] font-medium text-[#000] z-[1] relative py-[11px] pr-[30px] pl-[8px] max-[1199px]:py-[8px]" href="javascript:void(0)">
                                        <i class="ri-user-3-line pr-[5px] text-[21px] leading-[17px]"></i>
                                        <span class="transition-all duration-[0.3s] ease-in-out font-Poppins text-[15px] leading-[15px] text-[15px] font-medium text-[#000] tracking-[0.03rem]">Account</span>
                                    </a>

                                </li>
                            </ul>
                            <a href="{{ route('wallet.show') }}" class="cr-right-bar-item pr-[30px] transition-all duration-[0.3s] ease-in-out flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" class="ri--wallet-3-line pr-[5px] text-[21px] leading-[17px]" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M22.005 7h1v10h-1v3a1 1 0 0 1-1 1h-18a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h18a1 1 0 0 1 1 1zm-2 10h-6a5 5 0 0 1 0-10h6V5h-16v14h16zm1-2V9h-7a3 3 0 1 0 0 6zm-7-4h3v2h-3z"/></svg>
                                <span class="transition-all duration-[0.3s] ease-in-out font-Poppins text-[15px] leading-[15px] font-medium text-[#000]">
                                      ₦{{ number_format(Auth::user()->wallet_balance ?? 0, 2) }}</span>
                            </a>
                            @php
                                $cartCount = \App\Models\Cart::where('user_id', auth()->id())->sum('quantity');
                            @endphp

                            <a href="{{ route('cart') }}" class="relative inline-flex items-center p-2 text-sm font-medium text-center text-white bg-purple-700 rounded-lg focus:ring-4 focus:outline-none focus:ring-blue-300">
                                <i class="ri-shopping-cart-line pr-[5px] text-[21px] leading-[17px]"></i>

                                <span class="sr-only">Cart</span>

                                @if($cartCount > 0)
                                    <div id="cart-count" class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-purple-600 border-2 border-white rounded-full -top-2 -end-2">
                                        {{ $cartCount }}
                                    </div>
                                @endif
                            </a>


<script>
    function updateCartCount() {
        fetch("{{ route('cart.count') }}")
            .then(response => response.json())
            .then(data => {
                document.getElementById("cart-count").innerText = data.count;
            });
    }

    document.addEventListener("DOMContentLoaded", function() {
        updateCartCount();
    });
</script>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cr-fix" id="cr-main-menu-desk">
            <div class="flex flex-wrap justify-between relative items-center mx-auto min-[1600px]:max-w-[1500px] min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
                <div class="cr-menu-list w-full px-[12px] relative flex items-center flex-row justify-between">
                    <div class="cr-category-icon-block py-[10px] max-[991px]:hidden">
                        <div class="cr-category-menu relative">
                            <div class="cr-category-toggle w-[35px] h-[35px] border-[1px] border-solid border-[#e9e9e9] rounded-[5px] cursor-pointer flex items-center justify-center">
                                <i class="ri-menu-2-line text-[22px] text-[#2b2b2d] leading-[14px] block"></i>
                            </div>
                        </div>
                        <div class="cr-cat-dropdown transition-all duration-[0.3s] ease-in-out w-[600px] mt-[15px] p-[15px] absolute bg-[#fff] opacity-0 invisible left-[12px] z-[10] rounded-[5px] border-[1px] border-solid border-[#e9e9e9]">
                            <div class="cr-cat-block">
                                <div class="cr-cat-tab grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-4">

                                        @foreach ($categories as $category)
                                            <ul class="cr-tab-list nav flex-column nav-pills min-w-[180px] mr-[12px] rounded-[5px] flex flex-wrap flex-col justify-center" id="myTab">
                                            <li class="transition-all duration-[0.3s] ease-in-out py-[10px] px-[5px] bg-[#fff] border-[1px] border-solid border-[#e9e9e9] rounded-[5px] flex items-center cursor-pointer mb-[3px]">
                                                <a href="{{ url('/category/' . urlencode($category->category)) }}" class="text-[13px] text-[#4b5966] tracking-[0] font-medium text-left capitalize">
                                                    {{ $category->category }} ({{ $category->products_count }})
                                                </a>
                                            </li>
                                    </ul>
                                        @endforeach
                                </div>

                            </div>
                        </div>
                    </div>
                    <nav class="justify-between relative flex flex-wrap items-center max-[991px]:w-full max-[991px]:py-[10px]">
                        <a href="javascript:void(0)" class="navbar-toggler py-[7px] px-[14px] hidden text-[16px] leading-[1] max-[991px]:flex max-[991px]:p-[0] max-[991px]:border-[0]">
                            <i class="ri-menu-3-line max-[991px]:text-[20px]"></i>
                        </a>
                       <div class="cr-header-buttons max-[991px]:flex max-[991px]:items-center flex items-center md:hidden lg:hidden block mb-1">
                            <a href="{{ route('dashboard') }}" class="cr-right-bar-item transition-all duration-[0.3s] ease-in-out mr-[16px] max-[991px]:mr-[20px]">
                                <i class="ri-user-3-line text-[20px]"></i>
                            </a>
                            <a href="javascript:void(0);" class="cr-right-bar-item transition-all duration-[0.3s] ease-in-out mr-[16px] max-[991px]:mr-[20px]">
                                <i class="ri-heart-line text-[20px]"></i>
                            </a>

                            <a href="{{ route('cart') }}" class="relative inline-flex items-center p-2 text-sm font-medium text-center text-white bg-purple-700 rounded-lg focus:ring-4 focus:outline-none focus:ring-blue-300">
                                    <i class="ri-shopping-cart-line pr-[5px] text-[21px] leading-[17px]"></i>

                                <span class="sr-only">Cart</span>
                                <div id="cart-count" class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-purple-600 border-2 border-white rounded-full -top-2 -end-2 ">
                                    {{ \App\Models\Cart::where('user_id', auth()->id())->sum('quantity') }}
                                </div>
                            </a>
                        </div>

                        <div class="min-[992px]:flex min-[992px]:basis-auto grow-[1] items-center hidden" id="navbarSupportedContent">
                            <ul class="navbar-nav flex min-[992px]:flex-row items-center m-auto relative z-[3] min-[992px]:flex-row max-[1199px]:mr-[-5px] max-[991px]:m-[0]">
                                <li class="nav-item relative mr-[25px] max-[1399px]:mr-[20px] max-[1199px]:mr-[30px]">
                                    <a href="/marketplace" class="nav-link font-Poppins text-[14px] font-medium block text-[#000] z-[1] flex items-center relative py-[11px] px-[8px] max-[1199px]:py-[8px] max-[1199px]:px-[0]" >
                                        Home
                                    </a>

                                </li>
                                <li class="nav-item dropdown relative mr-[25px] max-[1399px]:mr-[20px] max-[1199px]:mr-[30px]">
                                        <a class="nav-link dropdown-toggle font-Poppins text-[14px] font-medium block text-[#000] z-[1] flex items-center relative py-[11px] px-[8px] max-[1199px]:py-[8px] max-[1199px]:px-[0]" href="javascript:void(0)">
                                            Category
                                        </a>
                                        <ul class="dropdown-menu transition-all duration-[0.3s] ease-in-out py-[8px] min-w-[160px] mt-[35px] absolute text-left opacity-0 invisible left-auto bg-[#fff] rounded-[5px] block z-[9] border-[1px] border-solid border-[#e9e9e9]">
                                            @foreach($categories as $category)
                                                <li class="w-full mr-[0]">
                                                    <a class="dropdown-item transition-all duration-[0.3s] ease-in-out font-Poppins py-[7px] px-[20px] bg-[#fff] relative capitalize text-[13px] text-[#777] hover:text-[#64b496] whitespace-nowrap tracking-[0.03rem] block w-full"
                                                       href="{{ route('category.products', ['category' => $category->slug]) }}">
                                                        {{ $category->name }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>

                                <li class="nav-item dropdown relative mr-[25px] max-[1399px]:mr-[20px] max-[1199px]:mr-[30px]">
                                    <a href="{{ route('all.products') }}" class="nav-link  font-Poppins text-[14px] font-medium block text-[#000] z-[1] flex items-center relative py-[11px] px-[8px] max-[1199px]:py-[8px] max-[1199px]:px-[0]">
                                        Products
                                    </a>
                                </li>
                                <li class="nav-item dropdown relative mr-[25px] max-[1399px]:mr-[20px] max-[1199px]:mr-[30px]">
                                    <a class="nav-link dropdown-toggle font-Poppins text-[14px] font-medium block text-[#000] z-[1] flex items-center relative py-[11px] px-[8px] max-[1199px]:py-[8px] max-[1199px]:px-[0]" href="javascript:void(0)">
                                        About Us
                                    </a>
                                    <ul class="dropdown-menu transition-all duration-[0.3s] ease-in-out py-[8px] min-w-[160px] mt-[35px] absolute text-left opacity-0 invisible left-auto bg-[#fff] rounded-[5px] block z-[9] border-[1px] border-solid border-[#e9e9e9]">
                                        <li class="w-full mr-[0]">
                                            <a class="dropdown-item transition-all duration-[0.3s] ease-in-out font-Poppins py-[7px] px-[20px] bg-[#fff] relative capitalize text-[13px] text-[#777] hover:text-[#64b496] whitespace-nowrap tracking-[0.03rem] block w-full" href="https://getosusu.com/faqs/">Faq</a>
                                        </li>
                                        <li class="w-full mr-[0]">
                                            <a class="dropdown-item transition-all duration-[0.3s] ease-in-out font-Poppins py-[7px] px-[20px] bg-[#fff] relative capitalize text-[13px] text-[#777] hover:text-[#64b496] whitespace-nowrap tracking-[0.03rem] block w-full" href="{{ route('contact.show') }}">Contact Us</a>
                                        </li>
                                        <li class="w-full mr-[0]">
                                            <a class="dropdown-item transition-all duration-[0.3s] ease-in-out font-Poppins py-[7px] px-[20px] bg-[#fff] relative capitalize text-[13px] text-[#777] hover:text-[#64b496] whitespace-nowrap tracking-[0.03rem] block w-full" href="{{ route('terms') }}">Terms & Condition</a>
                                        </li>
                                        <li class="w-full mr-[0]">
                                            <a class="dropdown-item transition-all duration-[0.3s] ease-in-out font-Poppins py-[7px] px-[20px] bg-[#fff] relative capitalize text-[13px] text-[#777] hover:text-[#64b496] whitespace-nowrap tracking-[0.03rem] block w-full" href="{{ route('privacy.policy') }}">Policy</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown relative mr-[25px] max-[1399px]:mr-[20px] max-[1199px]:mr-[30px]">
                                    <a class="nav-link  font-Poppins text-[14px] font-medium block text-[#000] z-[1] flex items-center relative py-[11px] px-[8px] max-[1199px]:py-[8px] max-[1199px]:px-[0]" href="javascript:void(0)">
                                        Blog
                                    </a>

                                </li>
                                <li class="nav-item dropdown relative">
                                    <a class="nav-link font-Poppins text-[14px] font-medium block text-[#000] z-[1] flex items-center relative py-[11px] px-[8px] max-[1199px]:py-[8px] max-[1199px]:px-[0]" href="javascript:void(0)">
                                        Promotions
                                    </a>

                                </li>
                            </ul>
                        </div>
                    </nav>
                    <div class="cr-calling flex justify-end items-center max-[1199px]:hidden">
                        <i class="ri-phone-line pr-[5px] text-[20px]"></i>
                        <a href="javascript:void(0)" class="text-[15px] font-medium">+2348182528266</a>
                    </div>
                </div>
            </div>
        </div>
    </header>






    <!-- Mobile menu -->
    <div class="cr-sidebar-overlay w-full h-screen hidden fixed top-[0] left-[0] bg-[#000000b3] z-[21]"></div>
    <div id="cr_mobile_menu" class="cr-side-cart cr-mobile-menu transition-all duration-[0.5s] ease h-full p-[15px] fixed top-[0] bg-[#fff] z-[22] overflow-auto w-[400px] left-[-400px] max-[575px]:w-[300px] max-[575px]:left-[-300px] max-[420px]:w-[250px] max-[420px]:left-[-250px]">
        <div class="cr-menu-title w-full mb-[10px] pb-[10px] flex flex-wrap justify-between border-b-[2px] border-solid border-[#e9e9e9]">
            <span class="menu-title text-[18px] font-semibold text-purple-600">My Osusu</span>
            <button type="button" class="cr-close relative border-[0] text-[30px] leading-[1] text-[#999] bg-[#fff]">×</button>
        </div>
        <div class="cr-menu-inner">
            <div class="cr-menu-content">
                <ul>
                    <li class="dropdown drop-list relative leading-[28px]">
                        <a href="/marketplace" class="py-[12px] block capitalize text-[15px] font-medium text-[#444] border-b-[1px] border-solid border-[#e9e9e9]">Home</a>

                    </li>
                    <li class="dropdown drop-list relative leading-[28px]">
                        <span class="menu-toggle h-[48px] absolute top-[0] right-[0] z-[-1] flex justify-center items-center cursor-pointer bg-transparent"></span>
                        <a href="javascript:void(0)" class="dropdown-list py-[12px] block capitalize text-[15px] font-medium text-[#444] border-b-[1px] border-solid border-[#e9e9e9]">Category</a>
                                <ul class="sub-menu w-full mb-[0] p-[0] hidden min-w-auto opacity-[1]">
                                @foreach($categories as $category)
                                                <li class="relative leading-[28px]">
                                                    <a class="transition-all duration-[0.3s] ease-in-out pl-[20px] opacity-[0.8] text-[14px] py-[12px] block capitalize font-medium text-[#444] border-b-[1px] border-solid border-[#e9e9e9]" href="{{ route('category.products', ['category' => $category->slug]) }}">
                                                        {{ $category->name }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>

                    </li>
                    <li class="dropdown drop-list relative leading-[28px]">
                        <a href="{{ route('all.products') }}" class="py-[12px] block capitalize text-[15px] font-medium text-[#444] border-b-[1px] border-solid border-[#e9e9e9]">Products</a>

                    </li>
                    <li class="dropdown drop-list relative leading-[28px]">
                        <span class="menu-toggle h-[48px] absolute top-[0] right-[0] z-[-1] flex justify-center items-center cursor-pointer bg-transparent"></span>
                        <a href="javascript:void(0)" class="dropdown-list py-[12px] block capitalize text-[15px] font-medium text-[#444] border-b-[1px] border-solid border-[#e9e9e9]">About Us</a>
                        <ul class="sub-menu w-full mb-[0] p-[0] hidden min-w-auto opacity-[1]">
                            <li class="relative leading-[28px]">
                                <a href="https://getosusu.com/faqs/" class="transition-all duration-[0.3s] ease-in-out pl-[20px] opacity-[0.8] text-[14px] py-[12px] block capitalize font-medium text-[#444] border-b-[1px] border-solid border-[#e9e9e9]">Faq</a>
                            </li>
                            <li class="relative leading-[28px]">
                                <a href="{{ route('contact.show') }}" class="transition-all duration-[0.3s] ease-in-out pl-[20px] opacity-[0.8] text-[14px] py-[12px] block capitalize font-medium text-[#444] border-b-[1px] border-solid border-[#e9e9e9]">Contact Us</a>
                            </li>
                            <li class="relative leading-[28px]">
                                <a href="{{ route('terms') }}" class="transition-all duration-[0.3s] ease-in-out pl-[20px] opacity-[0.8] text-[14px] py-[12px] block capitalize font-medium text-[#444] border-b-[1px] border-solid border-[#e9e9e9]">Terms & Condition</a>
                            </li>
                            <li class="relative leading-[28px]">
                                <a href="{{ route('privacy.policy') }}" class="transition-all duration-[0.3s] ease-in-out pl-[20px] opacity-[0.8] text-[14px] py-[12px] block capitalize font-medium text-[#444] border-b-[1px] border-solid border-[#e9e9e9]">Policy</a>
                            </li>

                        </ul>
                    </li>
                    <li class="dropdown drop-list relative leading-[28px]">
                        <a href="" class="py-[12px] block capitalize text-[15px] font-medium text-[#444] border-b-[1px] border-solid border-[#e9e9e9]">Blog</a>

                    </li>
                    <li class="dropdown drop-list relative leading-[28px]">
                        <a href="" class="py-[12px] block capitalize text-[15px] font-medium text-[#444] border-b-[1px] border-solid border-[#e9e9e9]">Promotion</a>

                    </li>
                </ul>
            </div>
        </div>
    </div>
<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('searchBox', () => ({
        search: '',
        results: [],
        open: false,
        loading: false,
        timeout: null,

        debouncedFetchResults() {
            this.loading = true;
            clearTimeout(this.timeout);
            this.timeout = setTimeout(() => this.fetchResults(), 300);
        },

        async fetchResults() {
            if (this.search.length < 2) {
                this.results = [];
                this.loading = false;
                return;
            }

            try {
                const response = await fetch(`/search-products?q=${encodeURIComponent(this.search)}`);
                if (!response.ok) throw new Error('Network response was not ok');

                const data = await response.json();
                this.results = data;
            } catch (error) {
                console.error('Search error:', error);
                this.results = [];
            } finally {
                this.loading = false;
            }
        },

        redirectToSearchPage() {
            if (this.search.length > 0) {
                window.location.href = `/search-results?q=${encodeURIComponent(this.search)}`;
            }
        }
    }));
});
</script>