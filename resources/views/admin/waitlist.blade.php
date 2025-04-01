<x-app-layout>
    <main>
    <!--start the project-->
    <div id="main-wrapper" class=" flex">
            @include('components.adminSideBar')

        <div class=" w-full page-wrapper overflow-hidden">

            <!--  Header Start -->
            <header class="container full-container w-full text-sm py-5 xl:px-9 px-5">


                <!-- ========== HEADER ========== -->

            @include('components.adminNavBar')

                <!-- ========== END HEADER ========== -->
            </header>
            <!--  Header End -->

            <!-- Main Content -->
            <main class="h-full overflow-y-auto  max-w-full  pt-4">

    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6 px-8">
        <!-- Total Users -->
        <div class="p-4 bg-white rounded-lg shadow">
            <h3 class="text-lg font-medium">Total Waitlist Users</h3>
            <p class="text-2xl font-semibold text-blue-600">{{ $totalWaitlist }}</p>
        </div>
 
    </div>


                <div class="container full-container py-2 flex flex-col gap-6">
                    <div class="grid grid-cols-1  lg:gap-x-6 gap-x-0 lg:gap-y-0 gap-y-6">
                        <div class="col-span-2">
                            <div class="card h-full">
                                <div class="card-body">
                                    <h4 class="text-gray-600 text-lg font-semibold mb-6">Recent Waitlist</h4>
                                    <div class="relative overflow-x-auto">
                                 <!-- Table -->
                                <table class="text-left w-full whitespace-nowrap text-sm">
                                    <thead class="text-gray-700">
                                        <tr class="font-semibold text-gray-600">
                                            <th scope="col" class="p-2">Full Name</th>
                                            <th scope="col" class="p-2">Email</th>
                                            <th scope="col" class="p-2">Phone Number</th>
                                            <th scope="col" class="p-2">Registered</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($waitlist as $data)
                                        <tr>
                                            <td class="p-2">
                                                <div class="flex flex-col gap-1">
                                                    <h3 class="font-semibold text-gray-600">{{ $data->first_name }}</h3>
                                                    <span class="font-normal text-gray-500">{{ $data->last_name }}</span>
                                                </div>
                                            </td>
                                            <td class="p-2">
                                                <span class="font-normal text-gray-500">{{ $data->email }}</span>
                                            </td>
                                            <td class="p-2">
                                                <span class="font-semibold text-base text-gray-600">{{ $data->phone_number }}</span>
                                            </td>
                                            <td class="p-2">
                                            <span class="font-semibold text-base text-gray-600">
                                                {{ $data->created_at->diffForHumans() }}
                                            </span>
                                        </td>

                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="5" class="p-4 text-center text-gray-500">No Wishlist found</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                
                                <!-- Pagination Links -->
                                <div class="mt-4">
                                    {{ $waitlist->links() }}
                                </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <footer>
                        <p class="text-base text-gray-500 font-normal p-3 text-center">
                            Design and Developed by <a href="/"
                                class="text-blue-600 underline hover:text-blue-700">GetOsusu</a>
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
