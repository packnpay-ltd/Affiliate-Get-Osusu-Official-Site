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

    {{-- <link rel="stylesheet" href="{{url('/css/tailwind.css')}}"> --}}

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="{{url('/js/main.js')}}"></script>

    <!-- Styles -->
    @livewireStyles
</head>
<body>

    {{-- <div class="bg-white mb-2"> --}}
    {{-- <nav x-data="{ isOpen: false }" class="z-100 md:z-20 relative items-center pt-5 px-4 mx-auto max-w-screen-xl md:px-8 md:flex md:space-x-6">
            <div class="flex justify-between">
                <a href="{{url('/')}}" class="flex items-center">
    <img src="{{url('/images/logo.png')}}" class="max-w-[50px]" alt="logo" />
    <span class="ml-1 font-sans font-bold text-xl">Medihealth</span>
    </a>
    <button class="text-gray-500 outline-none md:hidden" @click="isOpen = !isOpen">
        <template x-if="isOpen">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </template>
        <template x-if="!isOpen">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </template>
    </button>
    </div>
    <ul :class="isOpen ? 'absolute inset-x-0 px-4 border-b bg-white md:border-none md:static py-3' : 'hidden'" class="flex-1 justify-between mt-3 md:text-sm md:font-medium md:flex md:mt-0 md:items-center">
        <div class="items-center space-y-5 md:flex md:space-x-6 md:space-y-0 md:ml-12">
            <li class="text-gray-500 hover:text-red-600">
                <a href="{{route('landing')}}">Home</a>
            </li>
            <li class="text-gray-500 hover:text-red-600">
                <a href="{{route('landing.about')}}">About Us</a>
            </li>
            <li class="text-gray-500 hover:text-red-600">
                <a href="{{route('blog.service')}}">Our Services</a>
            </li>

            <div class="hs-dropdown [--strategy:static] md:[--strategy:fixed] [--adaptive:none] md:[--trigger:hover] md:py-4">
                <button type="button" class="flex items-center w-full text-gray-500 hover:text-gray-400 font-medium dark:text-gray-400 dark:hover:text-gray-500 ">
                    Blogs
                    <svg class="ms-2 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m6 9 6 6 6-6"></path>
                    </svg>
                </button>

                <div class="hs-dropdown-menu transition-[opacity,margin] duration-[0.1ms] md:duration-[150ms] hs-dropdown-open:opacity-100 opacity-0 md:w-48 z-10 bg-white md:shadow-md rounded-lg p-2 dark:bg-gray-800 md:dark:border dark:border-gray-700 dark:divide-gray-700 before:absolute top-full md:border before:-top-5 before:start-0 before:w-full before:h-5 block" data-popper-escaped="" data-popper-placement="bottom-start" style="position: fixed; inset: 0px auto auto 0px; margin: 0px; transform: translate(900px, 95px);">
                    <a href="{{route('blog.articles')}}" class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:text-red-600 focus:ring-2 focus:ring-red-500 ">
                        Articles
                    </a>

                    <a href="{{route('blog.events')}}" class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-red-500 ">
                        Events
                    </a>
                    <a href="{{route('blog.outreaches')}}" class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-red-500 ">
                        Outreach
                    </a>
                </div>
            </div>

        </div>
        <li class="order-2 py-5 md:py-0">
            <a href="{{route('landing.contact')}}" class="py-2 px-5 rounded-lg font-medium text-white text-center bg-red-600 hover:bg-red-500 active:bg-red-700 duration-150 block md:py-3 md:inline">
                Get In Touch
            </a>
        </li>
    </ul>
    </nav> --}}


    <!-- ========== HEADER ========== -->
    <header class="flex flex-wrap md:justify-start md:flex-nowrap z-50 w-full bg-white border-b border-gray-200 text-sm py-3 md:py-3 ">
        <nav class="relative max-w-[85rem] w-full mx-auto px-4 md:flex md:items-center md:justify-between md:px-6 lg:px-8" aria-label="Global">
            <div class="flex justify-between items-center">
                <a href="{{url('/')}}" class="flex items-center">
                    <img src="{{url('/images/logo.png')}}" class="max-w-[50px]" alt="logo" />
                    <span class="ml-1 font-sans font-bold text-xl">Medihealth</span>
                </a>
                <div class="md:hidden">
                    <button type="button" class="hs-collapse-toggle size-9 flex justify-center items-center text-sm font-semibold rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none  " data-hs-collapse="#navbar-collapse-with-animation" aria-controls="navbar-collapse-with-animation" aria-label="Toggle navigation">
                        <svg class="hs-collapse-open:hidden flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="3" x2="21" y1="6" y2="6" />
                            <line x1="3" x2="21" y1="12" y2="12" />
                            <line x1="3" x2="21" y1="18" y2="18" /></svg>
                        <svg class="hs-collapse-open:block hidden flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18" />
                            <path d="m6 6 12 12" /></svg>
                    </button>
                </div>
            </div>
            {{-- <div id="navbar-collapse-with-animation" class="hs-collapse hidden  overflow-hidden transition-all duration-300 basis-full grow md:block"> --}}
            <ul id="navbar-collapse-with-animation" class=" hs-collapse hidden px-4  overflow-hidden transition-all duration-300 basis-full grow  flex-1 justify-between mt-3 md:text-sm md:font-medium md:flex md:mt-0 md:items-center">
                <div class="items-center space-y-5 md:flex md:space-x-6 md:space-y-0 md:ml-12">
                    <li class="text-gray-500 hover:text-red-600">
                        <a href="{{route('landing')}}">Home</a>
                    </li>
                    <li class="text-gray-500 hover:text-red-600">
                        <a href="{{route('landing.about')}}">About Us</a>
                    </li>
                    <li class="text-gray-500 hover:text-red-600">
                        <a href="{{route('blog.service')}}">Our Services</a>
                    </li>

                    <div class="hs-dropdown [--strategy:static] sm:[--strategy:fixed] [--adaptive:none] sm:[--trigger:hover] sm:py-4">
                        <button type="button" class="flex items-center w-full text-gray-500 hover:text-gray-500 font-medium">
                            Our Blog
                            <svg class="flex-shrink-0 ms-2 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m6 9 6 6 6-6"></path>
                            </svg>
                        </button>

                        <div class="hs-dropdown-menu transition-[opacity,margin] duration-[0.1ms] sm:duration-[150ms] hs-dropdown-open:opacity-100 opacity-0 sm:w-48 hidden z-10 bg-white sm:shadow-md rounded-lg p-2 before:absolute top-full sm:border before:-top-5 before:start-0 before:w-full before:h-5">
                            <a  href="{{route('blog.articles')}}"  class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-500 hover:text-red-600 hover:bg-red-100 focus:ring-2 focus:ring-red-500 ">
                                News and Articles
                            </a>

                            <a href="{{route('blog.events')}}"  class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-500 hover:text-red-600 hover:bg-red-100 focus:ring-2 focus:ring-red-500 ">
                                Our Events
                            </a>


                            <a  href="{{route('blog.outreaches')}}" class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-500 hover:text-red-600 hover:bg-red-100 focus:ring-2 focus:ring-red-500 ">
                                Our Outreaches
                            </a>



                        </div>
                    </div>
                </div>

                </div>
                <li class="order-2 py-5 md:py-0">
                    <a href="{{route('landing.contact')}}" class="py-2 px-5 rounded-lg font-medium text-white text-center bg-red-600 hover:bg-red-500 active:bg-red-700 duration-150 block md:py-3 md:inline">
                        Get In Touch
                    </a>
                </li>
            </ul>
            {{-- </div> --}}
        </nav>
    </header>
    <!-- ========== END HEADER ========== -->
    {{-- </div> --}}



    <div class="font-sans text-gray-900 antialiased">
        {{ $slot }}
    </div>



    <footer class="bg-white">
        <div class="container mx-auto p-6">
            <div class="grid xl:grid-cols-5 gap-6 py-12">
                <div class="xl:col-span-2">
                    <a href="{{url('/')}}" class="flex items-center">
                        <img src="{{url('/images/logo.png')}}" class="min-h-8 max-w-[100px]">
                        <span class="ml-1 font-sans font-bold text-xl">Medihealth</span>
                    </a>
                    <p class="text-gray-500  mt-5 lg:w-4/5">Empowering Healthcare Globally with Precision and Innovation</p>
                </div>
                <div class="xl:col-span-3 col-span-4">
                    <div class="flex flex-col md:flex-row gap-6 flex-wrap justify-between">
                        <div>
                            <div class="flex flex-col gap-3">
                                <h5 class="mb-3 uppercase">Platform</h5>
                                <div class="text-gray-500 hover:text-red-600"><a href="{{url('/')}}">Home</a></div>
                                <div class="text-gray-500 hover:text-red-600"><a href="#">About</a></div>
                                <div class="text-gray-500 hover:text-red-600"><a href="#">Services</a></div>
                                <div class="text-gray-500 hover:text-red-600"><a href="#">Contact Us</a></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex flex-col gap-3">
                                <h5 class="mb-3 uppercase">Knowledge Base</h5>
                                <div class="text-gray-500 hover:text-red-600"><a href="#">Articles</a></div>
                                <div class="text-gray-500 hover:text-red-600"><a href="#">Outreaches</a></div>
                                <div class="text-gray-500 hover:text-red-600"><a href="#">Help Center</a></div>
                                {{-- <div class="text-gray-500 hover:text-red-600"><a href="#">Sales Tools catalog</a></div>
                                <div class="text-gray-500 hover:text-red-600"><a href="#">API</a></div> --}}
                            </div>
                        </div>
                        <div>
                            <div class="flex flex-col gap-3">
                                <h5 class="mb-3 uppercase">Company</h5>
                                <div class="text-gray-500 hover:text-red-600"><a href="#">About us</a></div>
                                {{-- <div class="text-gray-500 hover:text-red-600"><a href="#">Career</a></div> --}}
                                <div class="text-gray-500 hover:text-red-600"><a href="#">Contact Us</a></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex flex-col gap-3">
                                <h5 class="mb-3 uppercase">Legal</h5>
                                <div class="text-gray-500 hover:text-red-600"><a href="#">Usage Policy</a></div>
                                <div class="text-gray-500 hover:text-red-600"><a href="#">Privacy Policy</a></div>
                                <div class="text-gray-500 hover:text-red-600"><a href="#">Terms of Service</a></div>
                                {{-- <div class="text-gray-500 hover:text-red-600"><a href="#">Trust</a></div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-t py-6">
                <div class="grid md:grid-cols-2 text-center md:text-start gap-6">
                    <div>
                        <p class="text-gray-500 hover:text-red-600 text-sm">{{date('Y')}}© Medihealth. All rights reserved. </p>
                    </div>
                    <div class="flex justify-center md:justify-end gap-7">
                        <div><a href="#"><svg class="w-5 h-5 text-gray-500 hover:text-red-600 transition-all" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                </svg></a></div>
                        <div><a href="#"><svg class="w-5 h-5 text-gray-500 hover:text-red-600 transition-all" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                                </svg></a></div>
                        <div><a href="#"><svg class="w-5 h-5 text-gray-500 hover:text-red-600 transition-all" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                                    <rect x="2" y="9" width="4" height="12"></rect>
                                    <circle cx="4" cy="4" r="2"></circle>
                                </svg></a></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    @livewireScripts
</body>
</html>
