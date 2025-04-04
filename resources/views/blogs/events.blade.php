<x-guest-layout>



    <section data-config-id="background">

        <div class="py-20 bg-gray-700 radius-for-skewed">
            <div class="container mx-auto px-4">
                <div class="mb-16 max-w-md mx-auto text-center">
                    <h2 class="text-4xl lg:text-5xl font-bold font-heading text-white" data-config-id="header">Events</h2>
                    <p class="text-gray-50 text-lg" data-config-id="desc">Our Upcoming events.</p>
                </div>

            </div>
        </div>

    </section>



    {{-- Contents --}}

    <div class="pt-10 pb-16 lg:py-20 bg-gray-900 px-1">
        <div class="max-w-7xl mx-auto">
            <section>

                <div class="divide-y divide-gray-600">
                    <div class="grid grid-cols-12 gap-x-4 md:gap-x-6 lg:gap-x-7.5 py-11 first:pt-0 last:pb-0">
                        <div class="col-span-2 md:col-span-1 lg:col-span-1 ">
                            <time class="flex flex-col text-center text-xs font-bold md:text-base text-white bg-red-700" datetime="2022-08-06 21:30">
                                <span class="text-2xl lg:text-[32px] md:leading-none h-11 lg:h-[62px] flex items-center justify-center">08</span>
                                <span class="text-white leading-[28px] bg-red-500">Apr</span>
                            </time>
                        </div>
                        <div class="col-span-10 md:col-span-6 lg:col-span-6">
                            <h4 class="text-xl lg:text-2xl font-bold  text-white mb-2 lg:mb-2.5">
                                <a class=" text-white transition-colors hover:text-red-500 " href="{{route('blog.event',['event'=>'live-stream-from-twitchcon-2023'])}}">LiveStream from TwitchCon 2023!</a>
                            </h4>
                            <div class="lg:leading-[26px] text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                        </div>
                        <div class="col-span-full md:col-span-5 md:col-start-8 lg:col-start-8 lg:col-span-5">
                            <ul class="flex flex-wrap gap-y-5 pt-7 md:pt-3 lg:pt-3">
                                <li class="flex flex-1 flex-col items-center gap-y-3.5 text-center">
                                    <div>
                                        <h5 class="font-bold tracking-tight  text-white lg:text-lg lg:leading-tight">NY, USA</h5><span class="text-xs lg:text-sm"></span>
                                    </div>
                                    <div class="lg:pt-1"><svg role="img" class="h-5 w-5 fill-red-400">
                                            <use xlink:href="{{url('images/sprite.svg#pin')}}"></use>
                                        </svg></div>
                                </li>
                                <li class="flex flex-1 flex-col items-center gap-y-3.5 text-center">
                                    <div>
                                        <h5 class="font-bold tracking-tight  text-white lg:text-lg lg:leading-tight">9AM PCT</h5><span class="text-xs lg:text-sm"></span>
                                    </div>
                                    <div class="lg:pt-1"><svg role="img" class="h-5 w-5 fill-red-400">
                                            <use xlink:href="{{url('images/sprite.svg#clock')}}"></use>
                                        </svg></div>
                                </li>
                                <li class="flex flex-1 flex-col items-center gap-y-3.5 text-center">
                                    <div>
                                        <h5 class="font-bold tracking-tight  text-white lg:text-lg lg:leading-tight">$20</h5><span class="text-xs lg:text-sm"></span>
                                    </div>
                                    <div class="lg:pt-1"><svg role="img" class="h-5 w-5 fill-red-400">
                                            <use xlink:href="{{url('images/sprite.svg#credit-card')}}"></use>
                                        </svg></div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="grid grid-cols-12 gap-x-4 md:gap-x-6 lg:gap-x-7.5 py-11 first:pt-0 last:pb-0">
                        <div class="col-span-2 md:col-span-1 lg:col-span-1 ">
                            <time class="flex flex-col text-center text-xs font-bold md:text-base text-white bg-red-700" datetime="2022-08-06 21:30">
                                <span class="text-2xl lg:text-[32px] md:leading-none h-11 lg:h-[62px] flex items-center justify-center">08</span>
                                <span class="text-white leading-[28px] bg-red-500">Apr</span>
                            </time>
                        </div>
                        <div class="col-span-10 md:col-span-6 lg:col-span-6">
                            <h4 class="text-xl lg:text-2xl font-bold  text-white mb-2 lg:mb-2.5">
                                <a class=" text-white transition-colors hover:text-red-500 " href="{{route('blog.event',['event'=>'live-stream-from-twitchcon-2023'])}}">LiveStream from TwitchCon 2023!</a>
                            </h4>
                            <div class="lg:leading-[26px] text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                        </div>
                        <div class="col-span-full md:col-span-5 md:col-start-8 lg:col-start-8 lg:col-span-5">
                            <ul class="flex flex-wrap gap-y-5 pt-7 md:pt-3 lg:pt-3">
                                <li class="flex flex-1 flex-col items-center gap-y-3.5 text-center">
                                    <div>
                                        <h5 class="font-bold tracking-tight  text-white lg:text-lg lg:leading-tight">NY, USA</h5><span class="text-xs lg:text-sm"></span>
                                    </div>
                                    <div class="lg:pt-1"><svg role="img" class="h-5 w-5 fill-red-400">
                                            <use xlink:href="{{url('images/sprite.svg#pin')}}"></use>
                                        </svg></div>
                                </li>
                                <li class="flex flex-1 flex-col items-center gap-y-3.5 text-center">
                                    <div>
                                        <h5 class="font-bold tracking-tight  text-white lg:text-lg lg:leading-tight">9AM PCT</h5><span class="text-xs lg:text-sm"></span>
                                    </div>
                                    <div class="lg:pt-1"><svg role="img" class="h-5 w-5 fill-red-400">
                                            <use xlink:href="{{url('images/sprite.svg#clock')}}"></use>
                                        </svg></div>
                                </li>
                                <li class="flex flex-1 flex-col items-center gap-y-3.5 text-center">
                                    <div>
                                        <h5 class="font-bold tracking-tight  text-white lg:text-lg lg:leading-tight">$20</h5><span class="text-xs lg:text-sm"></span>
                                    </div>
                                    <div class="lg:pt-1"><svg role="img" class="h-5 w-5 fill-red-400">
                                            <use xlink:href="{{url('images/sprite.svg#credit-card')}}"></use>
                                        </svg></div>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </section>

        </div>
    </div>

    {{-- Contents --}}



    <section data-config-id="background">
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
