<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <title>Error - Marketplace</title>
        
    
    <script>
        window.location.replace("{{ url('/login') }}");
    </script>
    
    
    
    @include('components.marketplace_head')
</head>
<body class="body-bg-6">
    @include('components.header')

    <div class="flex flex-col items-center justify-center h-screen text-center">
        <a href="{{ url('/') }}" class="mt-6 px-6 py-3 bg-[#64b496] text-white rounded-lg">Go Home</a>
    </div>

    <!-- Back to Top Button -->
    <a href="#Top" class="back-to-top ...">
        <i class="ri-arrow-up-line text-[20px]"></i>
        <div class="back-to-top-wrap">...</div>
    </a>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
        <!-- Vendor Custom -->
    <script src="{{ asset('assets/js/vendor/jquery-3.6.4.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/mixitup.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/range-slider.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/aos.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/slick.min.js') }}"></script>

    <!-- Main Custom -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>
</html>
