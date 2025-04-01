<x-app-layout>
    <main>
        <div id="main-wrapper" class="flex">
            @include('components.adminSideBar')

            <div class="w-full ">
                <header class="container full-container w-full text-sm py-5 xl:px-9 px-5">
                    @include('components.adminNavBar')
                </header>

                <main class="h-full overflow-y-auto max-w-full pt-4">
                    <div class="container mx-auto p-6 bg-white shadow-lg rounded-md">
                        <h2 class="text-lg font-semibold mb-4 text-gray-700">Support Tickets</h2>
                        <table class="min-w-full bg-white border border-gray-200 rounded-lg overflow-hidden">
                            <thead>
                                <tr class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                                    <th class="py-1 px-2 text-left">Username</th>
                                    <th class="py-1 px-2 text-left">Subject</th>
                                    <th class="py-1 px-2 text-center">Status</th>
                                    <th class="py-1 px-2 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm font-light">
                                @foreach ($tickets as $ticket)
                                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                                        <td class="py-1 px-2 text-left whitespace-nowrap">
                                            <span class="font-medium text-gray-800">{{ $ticket->user->name }}</span>
                                        </td>
                                        <td class="py-1 px-2 text-left">
                                            {{ $ticket->subject }}
                                        </td>
                                        <td class="py-1 px-2 text-center">
                                            <span class="px-2 py-1 text-sm rounded-full
                                                {{ $ticket->status == 'open' ? 'bg-red-100 text-red-600' : '' }}
                                                {{ $ticket->status == 'in progress' ? 'bg-yellow-100 text-yellow-600' : '' }}
                                                {{ $ticket->status == 'resolved' ? 'bg-green-100 text-green-600' : '' }}">
                                                {{ ucfirst($ticket->status) }}
                                            </span>
                                        </td>
                                        <td class="py-1 px-2 text-center gap-4">
                                            <a href="{{ route('support_tickets.show', $ticket->id) }}"
                                               class="bg-blue-500 text-white py-1 px-3 rounded-md hover:bg-blue-600">
                                               View Ticket
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>



                </main>
            </div>
        </div>
    </main>
</x-app-layout>
