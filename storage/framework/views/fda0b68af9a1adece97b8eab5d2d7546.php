 <!-- Responsive Navbar -->
            <nav class="flex justify-between items-center w-full px-6 py-4 ">
                <!-- Logo -->
                <a href="/" class="flex items-center">
                    <img src="<?php echo e(asset('images/logo_white.png')); ?>" alt="Logo" class="h-11 w-[125px]" />
                </a>

                <!-- Mobile Menu Button -->
                <button id="navbar-toggle" aria-label="Toggle navigation" type="button"
                    class="inline-flex items-center p-2 ml-3 text-sm text-white rounded-lg lg:hidden  focus:outline-none focus:ring-2 ">
                    <svg id="navbar-open-icon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                    <svg id="navbar-close-icon" class="hidden w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>

                <!-- Centered Links Container -->
                <div id="navbar-menu" class="hidden lg:flex lg:items-center lg:w-auto">
                    <ul class="flex flex-col lg:flex-row lg:space-x-8 mt-4 lg:mt-0 font-medium lg:mx-auto">
                        <li><a href="/" class="block py-2 px-3 lg:p-0 text-white">Home</a></li>
                        <li><a href="#" class="block py-2 px-3 lg:p-0 text-white">How it works</a></li>
                        <li><a href="#" class="block py-2 px-3 lg:p-0 text-white">Features</a></li>
                        <li><a href="#" class="block py-2 px-3 lg:p-0 text-white">FAQs</a></li>
                        <li><a href="#" class="block py-2 px-3 lg:p-0 text-white">Testimonials</a></li>
                        <li><a href="#" class="block py-2 px-3 lg:p-0 text-white">Our Services</a></li>
                    </ul>
                </div>

                <!-- Get Started Button -->
                <a href="<?php echo e(route('login')); ?>"
                    class="hidden lg:inline-block bg-white text-purple-600 font-semibold text-base py-2 px-4 rounded-lg hover:bg-purple-100">
                            Sign In
                </a>
            </nav>

            <!-- Mobile Menu (Dropdown) -->
            <div id="navbar-dropdown" class="hidden lg:hidden mt-4 px-6 w-full">
                <ul class="flex flex-col font-medium space-y-4">
                    <li><a href="/" class="block py-2 px-3 lg:p-0 text-white">Home</a></li>
                        <li><a href="#" class="block py-2 px-3 lg:p-0 text-white">How it works</a></li>
                        <li><a href="#" class="block py-2 px-3 lg:p-0 text-white">Features</a></li>
                        <li><a href="#" class="block py-2 px-3 lg:p-0 text-white">FAQs</a></li>
                        <li><a href="#" class="block py-2 px-3 lg:p-0 text-white">Testimonials</a></li>
                        <li><a href="#" class="block py-2 px-3 lg:p-0 text-white">Our Services</a></li>
                    <li>
                        <a href="<?php echo e(route('login')); ?>" class="block bg-white text-purple-600 font-semibold text-base py-2 px-4 rounded-lg hover:bg-purple-100">
                            Sign In
                        </a>
                    </li>
                </ul>
            </div>





    <script>
        const toggleButton = document.getElementById('navbar-toggle');
        const menu = document.getElementById('navbar-menu');
        const dropdown = document.getElementById('navbar-dropdown');
        const openIcon = document.getElementById('navbar-open-icon');
        const closeIcon = document.getElementById('navbar-close-icon');

        toggleButton.addEventListener('click', () => {
            dropdown.classList.toggle('hidden');
            openIcon.classList.toggle('hidden');
            closeIcon.classList.toggle('hidden');
        });
    </script>







<?php /**PATH C:\xampp\htdocs\Affiliate-Get-Osusu-Official-Site\resources\views\components\guest_navbar.blade.php ENDPATH**/ ?>