<x-app-layout>
    <div id="main-wrapper" class="flex">
        <!-- Sidebar -->
        <aside class="w-1/4">
            @include('components.adminSideBar')
        </aside>

        <!-- Main content -->
        <div class="w-3/4 page-wrapper overflow-hidden">
            <header class="container w-full text-sm py-5 xl:px-9 px-5">
                @include('components.adminNavBar')
            </header>

            <main class="h-full overflow-y-auto max-w-full pt-4">
                <!-- Plans Table -->
                <div class="overflow-x-auto shadow rounded-lg bg-white">
                    <h4 class="text-gray-600 text-lg font-semibold mb-6">Create New Savings Plan</h4>

                    <div class="shadow rounded-lg bg-white p-6">
                        <form action="{{ route('plans.store') }}" method="POST">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Plan Name -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Plan Name</label>
                                    <input type="text" name="plan_type" 
                                           class="mt-1 p-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" 
                                           required>
                                </div>

                                <!-- Minimum Savings -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Minimum Savings Amount</label>
                                    <input type="number" name="min_savings" 
                                           class="mt-1 p-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" 
                                           required>
                                </div>

                                <!-- Maximum Savings -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Maximum Savings Amount</label>
                                    <input type="number" name="max_savings" 
                                           class="mt-1 p-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" 
                                           required>
                                </div>

                                <!-- Frequency -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Frequency</label>
                                    <select name="frequency" 
                                            class="mt-1 p-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" 
                                            required>
                                        <option value="daily">Daily</option>
                                        <option value="weekly">Weekly</option>
                                        <option value="monthly">Monthly</option>
                                    </select>
                                </div>

                                <!-- Start Date -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Start Date</label>
                                    <input type="date" name="start_date" 
                                           class="mt-1 p-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" 
                                           required>
                                </div>

                                <!-- End Date -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">End Date</label>
                                    <input type="date" name="end_date" 
                                           class="mt-1 p-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" 
                                           required>
                                </div>

                                <!-- Description -->
                                <div class="col-span-1 md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700">Description</label>
                                    <textarea name="description" 
                                              class="mt-1 p-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" 
                                              rows="3" required></textarea>
                                </div>

                                <!-- Submit Button -->
                                <div class="col-span-1 md:col-span-2 text-right">
                                    <button type="submit" 
                                            class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition duration-300">
                                        Create Plan
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div> 
                </div>
            </main>
        </div>
    </div>
</x-app-layout>
