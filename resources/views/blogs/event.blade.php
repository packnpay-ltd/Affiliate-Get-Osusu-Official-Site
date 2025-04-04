<x-guest-layout>



    <section data-config-id="background">

        <div class="py-20 bg-gray-700 radius-for-skewed">
            <div class="container mx-auto px-4">
                <div class="mb-1 max-w-md mx-auto text-center my-auto">
                    <h2 class="text-4xl lg:text-5xl font-bold font-heading text-white" data-config-id="header">Event Details</h2>
                    {{-- <p class="text-gray-50 text-lg" data-config-id="desc">Our Upcoming events.</p> --}}
                    {{-- <ol class="relative flex flex-wrap gap-x-6 text-sm leading-none text-gray-50 lg:gap-x-8 lg:text-lg [&amp;>li>a]:text-white hover:[&amp;>li>a]:text-red-500 dark:[&amp;>li>a]:text-white dark:hover:[&amp;>li>a]:text-red-500 [&amp;>li]:relative">
                        <li class="font-bold"><a href="_str1-index.html">Home</a> <svg role="img" class="fill-gray absolute -right-4 top-1/2 aspect-[3/5] w-1.5 -translate-y-1/2 lg:-right-5"><use xlink:href="{{url('images/sprite.svg#arrow-right-pixel-alt')}}"></use></svg></li>
                    <li class="font-bold"><a href="_str1-events.html.html">Events</a> <svg role="img" class="fill-gray absolute -right-4 top-1/2 aspect-[3/5] w-1.5 -translate-y-1/2 lg:-right-5">
                            <use xlink:href="{{url('images/sprite.svg#arrow-right-pixel-alt')}}"></use>
                        </svg></li>
                    <li>LiveStream from TwitchCon 2023!</li>
                    </ol> --}}
                </div>

            </div>
        </div>

    </section>



    {{-- Contents --}}

    <div class="pt-10 pb-16 lg:py-20 bg-gray-900 px-1 mx-auto">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-12 gap-x-5 md:gap-x-6 lg:gap-x-7.5 gap-y-16 mx-auto">
                <div class="col-span-full md:col-span-8 md:pr-[38px] lg:pr-[50px] xl:pr-[70px]">
                    <div class="mb-10 md:mb-12 lg:mb-16 xl:mb-[72px]">
                        <h3 class="text-xl font-bold tracking-tight text-gray-100 before:text-red-500 before:content-['.']sm:text-1.5xl md:text-2xl lg:leading-none lg:text-[32px]">LiveStream from TwitchCon 2023!</h3>
                    </div>
                    <figure class="relative mb-6 md:mb-8 lg:mb-10 xl:mb-12">
                        <img class="w-full object-cover" src="https://valkivid.dan-fisher.dev/assets/img/str1/samples/post-img-1-700x340.jpg" alt="">
                    </figure>
                    <div class="[&amp;_p]:mb-[2em] text-gray-100">
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
                        <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>
                    </div>
                    {{-- <div class="pt-5 lg:pt-9 grid grid-cols-1 md:grid-cols-2 gap-5 lg:gap-7.5 lg:max-w-xl">
                        <a href="_str1-single-event.html" class="inline-flex text-center font-bold leading-none transition-colors uppercase justify-center gap-x-3 py-4 px-4 md:py-[18px] lg:px-8 text-sm text-white bg-red-600 hover:bg-red-600/90 flex-1">Buy Tickets </a>
                        <a href="_str1-single-event.html" class="inline-flex text-center font-bold leading-none transition-colors uppercase justify-center gap-x-3 py-4 px-4 md:py-[18px] lg:px-8 text-sm text-white bg-accent hover:bg-accent/90 flex-1">Add to Google Calendar</a>
                    </div> --}}
                </div>
                <div class="col-span-full md:col-span-4">
                    <div class="mb-10 md:mb-12 lg:mb-16 xl:mb-[72px]">
                        <h3 class="text-xl font-bold tracking-tight text-white  sm:text-1.5xl md:text-2xl lg:leading-none lg:text-[32px]">Event Details</h3>
                    </div>
                    <dl class="mb-8 flex flex-col gap-y-3.5 font-medium md:mb-10 lg:mb-12">
                        <div class="flex flex-wrap justify-between">
                            <dt class="text-gray-50 opacity-60">Date</dt>
                            <dd class="text-white [&amp;_a]:text-red-500 [&amp;_a]:hover:text-red-500">Friday April 8th, 2023</dd>
                        </div>
                        <div class="flex flex-wrap justify-between">
                            <dt class="text-gray-50 opacity-60">Start</dt>
                            <dd class="text-white [&amp;_a]:text-red-500 [&amp;_a]:hover:text-red-500">9:00AM PCT</dd>
                        </div>
                        <div class="flex flex-wrap justify-between">
                            <dt class="text-gray-50 opacity-60">End</dt>
                            <dd class="text-white [&amp;_a]:text-red-500 [&amp;_a]:hover:text-red-500">11:00PM PCT</dd>
                        </div>
                        <div class="flex flex-wrap justify-between">
                            <dt class="text-gray-50 opacity-60">Organizer</dt>
                            <dd class="text-white [&amp;_a]:text-red-500 [&amp;_a]:hover:text-red-500">Twitch</dd>
                        </div>
                        <div class="flex flex-wrap justify-between">
                            <dt class="text-gray-50 opacity-60">Cost</dt>
                            <dd class="text-white [&amp;_a]:text-red-500 [&amp;_a]:hover:text-red-500">$20 USD</dd>
                        </div>
                        <div class="flex flex-wrap justify-between">
                            <dt class="text-gray-50 opacity-60">Website</dt>
                            <dd class="text-white [&amp;_a]:text-red-500 [&amp;_a]:hover:text-red-500"><a href="http://www.twitchcon.com">www.twitchcon.com</a></dd>
                        </div>
                        <div class="flex flex-wrap justify-between">
                            <dt class="text-gray-50 opacity-60">Address</dt>
                            <dd class="text-white [&amp;_a]:text-red-500 [&amp;_a]:hover:text-red-500">Fake W Street 123</dd>
                        </div>
                        <div class="flex flex-wrap justify-between">
                            <dt class="text-gray-50 opacity-60">State/Country</dt>
                            <dd class="text-white [&amp;_a]:text-red-500 [&amp;_a]:hover:text-red-500">New York, USA</dd>
                        </div>
                    </dl>
                </div>
            </div>

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
                                <button class="flex-none py-2 px-6 rounded-t-xl rounded-l-xl bg-red-600 hover:bg-red-700 text-gray-50 font-bold leading-loose transition duration-200" data-config-id="red-600-action">Sign Up</button>
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
