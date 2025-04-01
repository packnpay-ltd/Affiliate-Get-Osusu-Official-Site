<x-app-layout>
    <div class="flex">
        @include('components.userSidebar')

        <main class="flex-1 bg-gray-100 lg:ml-0">
            <div class="px-6 py-8">
                <h1 class="text-2xl font-bold text-gray-900 mb-6">Affiliate Overview</h1>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <!-- Stats cards from the dashboard -->
                    <!-- You can copy them from the dashboard.blade.php file -->
                </div>

                <!-- Performance Chart -->
                <div class="bg-white rounded-lg shadow p-6 mb-8">
                    <h2 class="text-lg font-semibold mb-4">Performance Overview</h2>
                    <div class="h-64 flex items-center justify-center bg-gray-50">
                        <p class="text-gray-500">Chart will be implemented here</p>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-lg font-semibold mb-4">Quick Actions</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <a href="#" class="block p-4 border rounded-lg hover:bg-purple-50">
                            <h3 class="font-semibold mb-2">Share Referral Link</h3>
                            <p class="text-sm text-gray-600">Quick share your referral link</p>
                        </a>
                        <a href="#" class="block p-4 border rounded-lg hover:bg-purple-50">
                            <h3 class="font-semibold mb-2">Download Marketing Kit</h3>
                            <p class="text-sm text-gray-600">Access marketing materials</p>
                        </a>
                        <a href="#" class="block p-4 border rounded-lg hover:bg-purple-50">
                            <h3 class="font-semibold mb-2">View Tutorials</h3>
                            <p class="text-sm text-gray-600">Learn how to maximize earnings</p>
                        </a>
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>