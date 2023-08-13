<!-- Navbar  -->
<nav class="fixed top-0 z-50 p-6 mx-auto w-full bg-white">
    <!-- Flex Container -->
    <div class="container flex items-center justify-between px-6 mx-auto">
        <!-- Logo  -->
        <div class="text-2xl">
            <a href="{{ route('home') }}">
                <img class="object-cover h-10" src="{{ asset('front_end/images/Logo v5.png') }}" alt="logo" />
            </a>
        </div>


        <!-- Menu Item -->
        <div class="hidden space-x-6 lg:flex">
            <a href="{{ route('home') }}" class="text-lg font-semibold text-lightGray hover:text-darkGray">Home</a>
            <!-- DropdownMenu  -->
            <div class="relative inline-block dropdown">
                <button
                    class="inline-flex items-center text-lg font-medium bg-white border-none rounded text-lightGray font-dm">
                    <span class="mr-1">Our Service</span>
                    <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                    </svg>
                </button>
                <ul class="absolute hidden pt-1 text-gray-700 origin-top-right bg-white rounded-md shadow-lg dropdown-menu w-52 ring-1 ring-black ring-opacity-5 focus:outline-none"
                    id="our-services-menu">
                </ul>
            </div>

            <!-- DropdownMenu  -->

            <a href="/blog" class="text-lg font-semibold text-lightGray">Our Blog</a>
            <a href="{{ URL::to('pages/') . '/about-us' }}" class="text-lg font-semibold text-lightGray">About Us</a>

            <a href="{{ route('user.contact') }}" class="text-lg font-semibold text-lightGray ">Contact Us</a>



        </div>

        <!-- Cart & Login  -->
        <div class="hidden space-x-6 md:flex md:items-center md:justify-between">
            @if (Auth::check())
            @if (Auth::user()->role == 'admin')


            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                class="text-white bg-skyBlue hover:redDark focus:ring-none focus:outline-none font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-skyBlue dark:hover:bg-redDark"
                type="button">{{ Auth::user()->name }} <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                    </path>
                </svg></button>
            <!-- Dropdown menu -->
            <div id="dropdown"
                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                    <li>
                        <a href="{{ route('admin.dashboard') }}"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Admin
                            Dashboard</a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard') }}"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                    </li>
                    <li>
                        <a href="{{ route('profile.edit') }}"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profile</a>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign
                                out</button>
                        </form>
                    </li>
                </ul>
            </div>
            @else
            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                class="text-white bg-skyBlue hover:redDark focus:ring-none focus:outline-none font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-skyBlue dark:hover:bg-redDark"
                type="button">{{ Auth::user()->name }} <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                    </path>
                </svg></button>
            <!-- Dropdown menu -->
            <div id="dropdown"
                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                    <li>
                        <a href="{{ route('dashboard') }}"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                    </li>
                    <li>
                        <a href="{{ route('profile.edit') }}"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profile</a>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign
                                out</button>
                        </form>
                    </li>
                </ul>
            </div>

            @endif
            @else
            <a href="{{ route('register') }}"
                class="p-3 px-6 pt-2 text-white rounded-lg bg-skyBlue ring-2 ring-skyBlue md:block hover:bg-transparent hover:text-skyBlue">Register</a>
            <a href="{{ route('login') }}"
                class="p-3 px-6 pt-2 bg-transparent rounded-lg text-skyBlue ring-2 ring-skyBlue md:block hover:bg-skyBlue hover:text-white">Login</a>
            @endif

        </div>
        <!-- Hamburger Menu  -->
        <button id="menu-btn" class="block hamburger md:hidden focus:outline-none">
            <span class="hamburger-top"></span>
            <span class="hamburger-middle"></span>
            <span class="hamburger-bottom"></span>
        </button>
    </div>
    <!-- Mobile Menu -->
    <div class="md:hidden">
        <div id="menu"
            class="absolute flex-col items-center self-end hidden py-8 mt-10 space-y-6 font-bold bg-white sm:w-auto sm:self-center left-6 right-6 drop-shadow-md">
            <a href="{{ route('home') }}" class="text-lightGray hover:text-darkGray">Home</a>
            <!-- <a href="#" class="text-lightGray">Our Service</a> -->
            <!-- DropdownMenu  -->
            <div class="relative inline-block dropdown">
                <button class="inline-flex items-center bg-white rounded text-lightGray font-dm">
                    <span class="mr-1">Our Service</span>
                    <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                    </svg>
                </button>
                <ul class="absolute hidden pt-1 z-50 text-gray-700 origin-top-right bg-white rounded-md shadow-lg dropdown-menu -left-2 w-52 font-dm ring-1 ring-black ring-opacity-5 focus:outline-none"
                    id="our-services-menu-mobile">

                </ul>
            </div>
            <a href="/blog" class="text-lightGray">Our Blog</a>
            <a href="{{ URL::to('pages/') . '/about-us' }}" class="text-lightGray">About Us</a>
            <a href="{{ route('user.contact') }}" class="text-lightGray">Contact Us</a>

            <div class="flex flex-col items-center justify-between space-y-6">
                @if (Auth::check())
                @if (Auth::user()->role == 'admin')
                <div class="relative inline-block dropdown">
                    <button class="inline-flex items-center bg-white rounded text-lightGray font-dm">
                        <span class="mr-1">{{ Auth::user()->name }}</span>
                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                    </button>
                    <ul
                        class="absolute hidden pt-1 text-gray-700 origin-top-right bg-white rounded-md shadow-lg dropdown-menu -left-2 w-52 font-dm ring-1 ring-black ring-opacity-5 focus:outline-none">
                        <li class="hover:bg-slate-100"><a class="block px-4 py-2 text-sm text-gray-700"
                                href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="hover:bg-slate-100"><a class="block px-4 py-2 text-sm text-gray-700"
                                href="{{ route('profile.edit') }}">Profile</a></li>
                        <li class="hover:bg-slate-100"><a class="block px-4 py-2 text-sm text-gray-700"
                                href="{{ route('admin.logout') }}">Logout</a></li>

                    </ul>
                </div>
                @else
                <div class="relative inline-block dropdown">
                    <button class="inline-flex items-center bg-white rounded text-lightGray font-dm">
                        <span class="mr-1">{{ Auth::user()->name }}</span>
                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                    </button>
                    <ul
                        class="absolute hidden pt-1 text-gray-700 origin-top-right bg-white rounded-md shadow-lg dropdown-menu -left-2 w-52 font-dm ring-1 ring-black ring-opacity-5 focus:outline-none">
                        <li class="hover:bg-slate-100"><a class="block px-4 py-2 text-sm text-gray-700"
                                href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="hover:bg-slate-100"><a class="block px-4 py-2 text-sm text-gray-700"
                                href="{{ route('profile.edit') }}">Profile</a></li>
                        <li class="hover:bg-slate-100">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="block px-4 py-2 text-sm text-gray-700">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
                @endif
                @else
                <a href="{{ route('register') }}"
                    class="p-3 px-6 pt-2 text-white rounded-lg bg-skyBlue ring-2 ring-skyBlue md:block hover:bg-transparent hover:text-skyBlue">Register</a>
                <a href="{{ route('login') }}"
                    class="p-3 px-6 pt-2 bg-transparent rounded-lg text-skyBlue ring-2 ring-skyBlue md:block">Login</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
<script>
    $(document).ready(function() {
        $.get("{{ route('menu_services') }}", {}, function(result) {
            $('#our-services-menu').html(result);
        });
    })
    $(document).ready(function() {
        $.get("{{ route('menu_services') }}", {}, function(result) {
            $('#our-services-menu-mobile').html(result);
        });
    })

    // $(document).ready(function() {
    //     $.get("{{ route('menu_pages') }}", {
    //     }, function(result) {
    //         $('#our-pages-menu').html(result);
    //     });
    // })
</script>
