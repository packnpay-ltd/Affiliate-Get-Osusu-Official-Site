<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>


        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Initialize Swiper
                var mySwiper = new Swiper(".gallery-top", {
                    spaceBetween: 20,
                    slidesPerView: 3,
                    parallax: true,
                    centeredSlides: true,
                    loop: true,
                    autoplay: {
                        delay: 3000,
                        disableOnInteraction: false,
                    },
                    slideToClickedSlide: true,
                    navigation: {
                        nextEl: ".swiper-button-next",
                        prevEl: ".swiper-button-prev"
                    },
                    breakpoints: {
                        1920: {
                            slidesPerView: 3,
                            spaceBetween: 20,
                        },
                        1400: {
                            slidesPerView: 3,
                            spaceBetween: 20,
                            centeredSlides: true
                        },
                        900: {
                            slidesPerView: 3,
                            spaceBetween: 15,
                            centeredSlides: true
                        },
                        200: {
                            slidesPerView: 2,
                            spaceBetween: 15
                        }
                    },
                });

                // Optional: Add event listeners for custom navigation buttons
                var leftButton = document.getElementById('slider-button-left');
                var rightButton = document.getElementById('slider-button-right');

                if (leftButton) {
                    leftButton.addEventListener('click', function() {
                        mySwiper.slidePrev();
                    });
                }

                if (rightButton) {
                    rightButton.addEventListener('click', function() {
                        mySwiper.slideNext();
                    });
                }
            });
            </script>

        @stack('modals')

        @livewireScripts
    </body>
</html>
