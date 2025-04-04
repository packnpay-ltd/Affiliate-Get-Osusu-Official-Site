<x-guest-layout>


    <div class="bg-red-50">
        <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto ">
            <!-- Title -->
            <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
                <h2 class="text-2xl font-bold md:text-4xl md:leading-tight ">Our Outreach</h2>
                <p class="mt-1 text-gray-600 ">See how we help the communities around us.</p>
            </div>
            <!-- End Title -->
            <!-- Grid -->
            <div class="grid sm:grid-cols-2 sm:items-center gap-8">
                <div class="sm:order-2">
                    <div class="relative pt-[50%] sm:pt-[100%] rounded-lg">
                        <img class="size-full absolute top-0 start-0 object-cover rounded-lg" src="https://images.unsplash.com/photo-1606868306217-dbf5046868d2?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1981&amp;q=80" alt="Image Description">
                    </div>
                </div>
                <!-- End Col -->

                <div class="sm:order-1">
                    <p class="mb-5 inline-flex items-center gap-1.5 py-1.5 px-3 rounded-md text-xs font-medium bg-gray-100 text-gray-800  ">
                        Business insight
                    </p>

                    <h2 class="text-2xl font-bold md:text-3xl lg:text-4xl lg:leading-tight xl:text-5xl xl:leading-tight text-gray-800 ">
                        <a class="hover:text-orange-600     " href="#">
                            How to get buy-in and budget for direct hiring
                        </a>
                    </h2>

                    <!-- Avatar -->
                    <div class="mt-6 sm:mt-10 flex items-center">
                        <div class="flex-shrink-0">
                            <img class="size-10 sm:h-14 sm:w-14 rounded-full" src="https://images.unsplash.com/photo-1669837401587-f9a4cfe3126e?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=320&amp;h=320&amp;q=80" alt="Image Description">
                        </div>

                        <div class="ms-3 sm:ms-4">
                            <p class="sm:mb-1 font-semibold text-gray-800 ">
                                Louise Donadieu
                            </p>
                            <p class="text-xs text-gray-500">
                                Strategic Marketing Consultant
                            </p>
                        </div>
                    </div>
                    <!-- End Avatar -->

                    <div class="mt-5">
                        <a class="inline-flex items-center gap-x-1.5 text-orange-600 decoration-2 hover:underline font-medium   " href="#">
                            Read more
                            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m9 18 6-6-6-6"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Grid -->
        </div>
    </div>


    <div class="my-10 container mx-auto p-2 pt-2 md:px-8">
        <div class="items-start justify-between gap-x-4 py-4 border-b sm:flex">
            <div class="max-w-lg block">
                <h3 class="text-gray-800 text-2xl font-bold">

                </h3>

            </div>
            <div class="mt-6 sm:mt-0 flex items-center justify-between">
                <!-- Sort Dropdown -->
                <div x-data="{ isOpen: false }" class="relative">
                    <button @click="isOpen = !isOpen" class="flex items-center text-gray-600 focus:outline-none">
                       <span class="text-xs sm:text-sm md:text-md">
                        Sort by
                       </span>
                        <svg x-show="!isOpen" class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                        <svg x-show="isOpen" class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 9l6 6 6-6"></path>
                        </svg>
                    </button>

                    <!-- Dropdown Items -->
                    <div x-show="isOpen" @click.away="isOpen = false" class="absolute z-10 mt-2 bg-white border border-gray-300 rounded-md shadow-lg">
                        <!-- Add your dropdown items here -->
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-indigo-500 hover:text-white">Name</a>
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-indigo-500 hover:text-white">Date</a>
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-indigo-500 hover:text-white">Role</a>
                    </div>
                </div>

                <!-- Search Input -->
                <div class="relative ml-4">
                    <svg class="w-6 h-6 text-gray-400 absolute left-3 inset-y-0 my-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                    </svg>
                    <input
                        type="text"
                        placeholder="Enter your email"
                        class="w-full pl-12 pr-3 py-2 text-gray-500 bg-transparent outline-none border focus:border-indigo-600 rounded-lg sm:max-w-xs"
                    />
                </div>
            </div>
        </div>
    </div>




    <section class="my-10 px-4 container mx-auto">
        <!-- Section Spacer -->
        <div class="w-full">
            <!-- Section Container -->
            <div class="container mx-auto">
                <div class="grid grid-cols-1 gap-x-6 gap-y-10 ">
                    <div class="flex flex-col gap-y-10 lg:gap-y-14 xl:gap-y-20 p-">
                        <!-- Blog Post List -->
                        <div class="grid sm:grid-cols-2 gap-6">
                            <!-- Card -->
                            <div class="grid lg:grid-cols-5 gap-5 lg:gap-10">
                                <div class="lg:col-span-2 col-span-3">
                                    <img src="https://themes.coderthemes.com/prompt_tn/assets/post1-5379b482.jpg" class="w-full h-full rounded-md">
                                </div>
                                <div class="col-span-3">
                                    <div class="flex flex-col gap-14 justify-between xl:h-full">
                                        <div><span class="bg-orange-500/10 text-orange-500 font-medium rounded-md text-xs py-1 px-2"><a href="{{route('blog.outreach', ['outreach' => 'announcing-the-free-upgrade-for-the-subscribed-plans'])}}">Announcement</a></span>
                                            <h1 class="text-lg my-3 transition-all hover:text-primary">
                                                <a href="{{route('blog.outreach', ['outreach' => 'announcing-the-free-upgrade-for-the-subscribed-plans'])}}">Announcing the free upgrade for the subscribed plans</a>
                                            </h1>
                                            <p class="text-sm/relaxed tracking-wider text-gray-500">We are glad to announce that, we are going to upgrade all the subscribed accounts with the premium features this week... <a class="text-primary" href= <a href="{{route('blog.outreach', 'announcing-the-free-upgrade-for-the-subscribed-plans')}}">read more</a></p>
                                        </div>
                                        <div>
                                            <div class="flex items-center gap-2"><img src="https://themes.coderthemes.com/prompt_tn/assets/img-2-3bd8be1c.jpg" class="h-10 w-10 rounded-md">
                                                <div>
                                                    <h6 class="text-sm transition-all hover:text-primary"><a href="#">Emily Blunt</a></h6>
                                                    <p class="text-sm text-gray-500">11 Mar, 2020 · 3 min read</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Card -->
                            <!-- Card -->
                            <div class="grid lg:grid-cols-5 gap-5 lg:gap-10">
                                <div class="lg:col-span-2 col-span-3">
                                    <img src="https://themes.coderthemes.com/prompt_tn/assets/post1-5379b482.jpg" class="w-full h-full rounded-md">

                                </div>
                                <div class="col-span-3">
                                    <div class="flex flex-col gap-14 justify-between xl:h-full">
                                        <div><span class="bg-orange-500/10 text-orange-500 font-medium rounded-md text-xs py-1 px-2"><a href= <a href="{{route('blog.outreach', ['outreach' => 'announcing-the-free-upgrade-for-the-subscribed-plans'])}}">Announcement</a></span>
                                            <h1 class="text-lg my-3 transition-all hover:text-primary"><a href="{{route('blog.outreach', ['outreach' => 'announcing-the-free-upgrade-for-the-subscribed-plans'])}}">Announcing the free upgrade for the subscribed plans</a></h1>
                                            <p class="text-sm/relaxed tracking-wider text-gray-500">We are glad to announce that, we are going to upgrade all the subscribed accounts with the premium features this week... <a class="text-primary" href="https://themes.coderthemes.com/prompt_tn/pages/blogs/list">read more</a></p>
                                        </div>
                                        <div>
                                            <div class="flex items-center gap-2"><img src="https://themes.coderthemes.com/prompt_tn/assets/img-2-3bd8be1c.jpg" class="h-10 w-10 rounded-md">
                                                <div>
                                                    <h6 class="text-sm transition-all hover:text-primary"><a href="#">Emily Blunt</a></h6>
                                                    <p class="text-sm text-gray-500">11 Mar, 2020 · 3 min read</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Card -->
                        </div>
                        <!-- Blog Post List -->

                    </div>

                </div>
            </div>
            <!-- Section Container -->
        </div>
        <!-- Section Spacer -->
    </section>

    <section data-config-id="background">
        <div class="skew skew-top mr-for-radius">
            <svg class="h-8 md:h-12 lg:h-20 w-full text-gray-50" viewbox="0 0 10 10" preserveaspectratio="none">
                <polygon fill="currentColor" points="0 0 10 10 0 10"></polygon>
            </svg>
        </div>
        {{-- <div class="skew skew-top ml-for-radius">
            <svg class="h-8 md:h-12 lg:h-20 w-full text-gray-50" viewbox="0 0 10 10" preserveaspectratio="none">
                <polygon fill="currentColor" points="0 10 10 0 10 10"></polygon>
            </svg>
        </div> --}}
        <div class="py-20 bg-gray-50 radius-for-skewed">
            <div class="container mx-auto px-4">
                <div class="flex flex-wrap items-center">
                    <div class="mb-4 w-full lg:w-auto lg:mr-8 text-center">
                        <div class="flex justify-center items-center p-5 mx-auto w-16 h-16 bg-white rounded">
                            <img class="h-8" src="atis-assets/logo/atis/atis-mono-sign.svg" alt="" data-config-id="icon">
                        </div>
                    </div>
                    <div class="mb-6 w-full lg:w-auto max-w-lg mx-auto lg:ml-0 mr-auto text-center lg:text-left">
                        <h2 class="text-4xl font-bold" data-config-id="header">Stay updated with our</h2>
                        <p class="text-gray-400" data-config-id="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                    <div class="w-full lg:w-2/5">
                        <form action="">
                            <div class="max-w-md lg:max-w-sm mx-auto flex flex-wrap items-center">
                                <input class="flex-grow py-3 px-4 mr-4 text-xs rounded leading-loose" type="email" placeholder="example@shuffle.dev">
                                <button class="flex-none py-2 px-6 rounded-t-xl rounded-l-xl bg-red-600 hover:bg-red-700 text-gray-50 font-bold leading-loose transition duration-200" data-config-id="primary-action">Sign Up</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="skew skew-bottom mr-for-radius">
            <svg class="h-8 md:h-12 lg:h-20 w-full text-gray-50" viewbox="0 0 10 10" preserveaspectratio="none">
                <polygon fill="currentColor" points="0 0 10 0 0 10"></polygon>
            </svg>
        </div>
        <div class="skew skew-bottom ml-for-radius">
            <svg class="h-8 md:h-12 lg:h-20 w-full text-gray-50" viewbox="0 0 10 10" preserveaspectratio="none">
                <polygon fill="currentColor" points="0 0 10 0 10 10"></polygon>
            </svg>
        </div> --}}
    </section>


</x-guest-layout>
