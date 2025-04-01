<x-app-layout>
    <main>
    <!--start the project-->
    <div id="main-wrapper" class=" flex">
            @include('components.adminSideBar')

        <div class=" w-full ">

            <!--  Header Start -->
            <header class="container full-container w-full text-sm py-5 xl:px-9 px-5">


                <!-- ========== HEADER ========== -->

            @include('components.adminNavBar')

                <!-- ========== END HEADER ========== -->
            </header>
            <!--  Header End -->

            <!-- Main Content -->
            <main class="h-full overflow-y-auto  max-w-full  pt-4">
                <div class="container mx-auto p-6">
    <table>
    <thead>
        <tr>
            <th>Question</th>
            <th>Answer</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($faqs as $faq)
        <tr>
            <td>{{ $faq->question }}</td>
            <td>{{ $faq->answer }}</td>
            <td>
                <a href="{{ route('faqs.edit', $faq->id) }}">Edit</a>
                <form method="POST" action="{{ route('faqs.destroy', $faq->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

                </div>


            </main>
            <!-- Main Content End -->

        </div>
    </div>
    <!--end of project-->
</main>

</x-app-layout>
