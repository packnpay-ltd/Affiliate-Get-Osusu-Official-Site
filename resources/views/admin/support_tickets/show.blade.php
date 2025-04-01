<x-app-layout>
    <div id="main-wrapper" class="flex">
        @include('components.adminSideBar')

        <div class="w-full ">
            <header class="container full-container w-full text-sm py-5 xl:px-9 px-5">
                @include('components.adminNavBar')
            </header>
            <main class="container mx-auto p-6 bg-white shadow-lg rounded-md">
                <h2 class="text-lg font-semibold mb-4 text-gray-700">Ticket: {{ $ticket->subject }}</h2>

                <!-- Ticket Details -->
                <div class="p-4 bg-gray-100 rounded-md mb-6">
                    <p><strong>User:</strong> {{ $ticket->user->name }}</p>
                    <p><strong>Subject:</strong> {{ $ticket->subject }}</p>
                    <p><strong>Status:</strong> <span class="text-indigo-600">{{ ucfirst($ticket->status) }}</span></p>
                    <p><strong>Description:</strong> {{ $ticket->issue_description }}</p>
                </div>

                <!-- Chat History -->
                <h3 class="text-lg font-semibold mb-4 text-gray-700">Chat History</h3>
                <div class="border rounded-md p-4 mb-6 max-h-96 overflow-y-scroll">
                    @foreach ($ticket->replies as $reply)
                        <div class="mb-4">
                            <p class="text-sm font-semibold">
                                {{ $reply->user->name ?? 'Admin' }}
                                <span class="text-gray-500 text-xs">{{ $reply->created_at->diffForHumans() }}</span>
                            </p>
                            <p class="bg-gray-200 p-3 rounded-md">{!! $reply->message !!}</p>
                        </div>
                    @endforeach
                </div>

                <!-- Reply Form -->
                <h3 class="text-lg font-semibold mb-4 text-gray-700">Send a Reply</h3>
                <form method="POST" action="{{ route('support_tickets.reply') }}" class="py-4">
                    @csrf
                    <input type="hidden" name="support_ticket_id" value="{{ $ticket->id }}">
                    <input type="hidden" name="email" value="{{ $ticket->user->email }}">
                    <textarea name="message" rows="4" class="w-full border-gray-300 rounded-md mb-4" placeholder="Write your reply..."></textarea>
                    <button type="submit" class="bg-indigo-500 text-white py-2 px-4 rounded-md hover:bg-indigo-600">Send</button>
                </form>
            </main>
        </div>
    </div>

    <!-- TinyMCE Script -->
    <script src="https://cdn.tiny.cloud/1/777y55az7scak8uz2l4h3bek84juepd8wt1xdy78p0v50038/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            tinymce.init({
                selector: 'textarea[name="message"]',
                height: 300,
                plugins: 'lists link image preview code',
                toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | link image | code',
                menubar: false,
                branding: false,
            });
        });
    </script>
</x-app-layout>
