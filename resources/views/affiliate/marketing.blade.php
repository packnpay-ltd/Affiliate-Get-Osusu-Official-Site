<x-app-layout>
    <div class="flex">
        @include('components.userSidebar')

        <main class="flex-1 bg-gray-100 lg:ml-0">
            <div class="px-6 py-8">
                <h1 class="text-2xl font-bold text-gray-900 mb-6">Marketing Tools</h1>

                <!-- Referral Link Section -->
                <div class="bg-white rounded-lg shadow p-6 mb-8">
                    <h2 class="text-lg font-semibold mb-4">Your Referral Link</h2>
                    <div class="flex items-center gap-4">
                        <input type="text" value="https://yourdomain.com/ref/{{ Auth::user()->id }}" class="flex-1 p-2 border rounded-lg bg-gray-50" readonly>
                        <button class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700" onclick="copyToClipboard()">
                            Copy Link
                        </button>
                    </div>
                </div>

                <!-- Marketing Materials -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Banners -->
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold">Banners</h3>
                            <button class="text-purple-600 hover:text-purple-700">Download All</button>
                        </div>
                        <div class="space-y-4">
                            <div class="border rounded-lg p-4">
                                <div class="bg-gray-100 h-32 mb-2 flex items-center justify-center">
                                    <p class="text-gray-500">Banner Preview</p>
                                </div>
                                <button class="w-full bg-purple-600 text-white px-4 py-2 rounded-md">Download</button>
                            </div>
                        </div>
                    </div>

                    <!-- Email Templates -->
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-lg font-semibold mb-4">Email Templates</h3>
                        <div class="space-y-4">
                            <div class="border rounded-lg p-4">
                                <h4 class="font-medium mb-2">Welcome Email</h4>
                                <p class="text-sm text-gray-600 mb-2">Perfect for introducing the program</p>
                                <button class="w-full bg-purple-600 text-white px-4 py-2 rounded-md">Copy Template</button>
                            </div>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-lg font-semibold mb-4">Social Media Kit</h3>
                        <div class="space-y-4">
                            <div class="border rounded-lg p-4">
                                <h4 class="font-medium mb-2">Social Media Posts</h4>
                                <p class="text-sm text-gray-600 mb-2">Ready-to-use social media content</p>
                                <button class="w-full bg-purple-600 text-white px-4 py-2 rounded-md">Download Kit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        function copyToClipboard() {
            const referralLink = document.querySelector('input[readonly]');
            referralLink.select();
            document.execCommand('copy');
            alert('Referral link copied to clipboard!');
        }
    </script>
</x-app-layout>