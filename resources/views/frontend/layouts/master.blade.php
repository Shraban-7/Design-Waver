<head class="scroll-smooth md:scroll-auto">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="@yield('meta_keywords','some default keywords')">
    <meta name="description" content="@yield('meta_description','default description')">
    <link rel="canonical" href="{{url()->current()}}" />
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('front_end/dist/main.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('front_end/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('lightbox2/dist/css/lightbox.min.css') }}">

    <link rel="stylesheet" href="{{ asset('jquery-confirm/dist/jquery-confirm.min.css') }}">

    {{-- <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}"> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.8.1/cdn.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
  
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

    <!-- Fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500&family=Space+Grotesk:wght@700&display=swap"
        rel="stylesheet" />
    <!-- Font Awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Design Waver @yield('title')</title>
</head>

<body>
@include('frontend.inc.navbar')
<div class=" mt-16">

    @yield('home')
    @yield('logo_design')
    @yield('terms_condition')
    @yield('privacy_policy')
    @yield('refund_policy')
    @yield('about')
    @yield('contact')
    @yield('app')
    @yield('order')
    @yield('content')
    <div id="login-page">

        @yield('register')
        @yield('login')
    </div>
</div>






@include('frontend.inc.footer')

    <script src="{{ asset('front_end/js/scripts.js') }}"></script>
    <script src="{{ asset('lightbox2/dist/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('js/lightbox.js') }}"></script>
    <script src="{{ asset('jquery-confirm/dist/jquery-confirm.min.js') }}"></script>

    {{-- <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script> --}}

</body>

</html>
