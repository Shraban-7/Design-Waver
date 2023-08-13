@extends('frontend.layouts.master')


@section('logo_design')
    @if (session('success'))
        <div id="session" class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <section id="logo_design" class="bg-heroBg">
        <!-- Flex Container  -->
        <div
            class="container flex flex-col-reverse justify-between items-center px-6 mx-auto pt-10 space-y-0 md:space-y-0 md:flex-row">
            <!-- Left item -->

            <div class="flex flex-col mb-32 space-y-12 md:w-2/3">

                <h1 class="max-w-6xl text-3xl font-bold font-space text-center md:text-5xl md:text-left flex-1">
                    {{ $service->service_title }}
                </h1>
                <p class="max-w-6xl text-center font-dm text-lightGray md:text-left">
                    {{ $service->service_description }}
                </p>
                <h3 class="max-w-md text-lg font-bold font-space text-center md:text-xl md:text-left flex-1">
                    Our Logo Design Process
                </h3>
                <p class="max-w-6xl text-center font-dm text-lightGray md:text-left">
                    Research and Analysis > Brainstorming > Concept Development > Feedback and Revisions > Finalize and
                    Deliver.
                </p>
                <div class="grid grid-cols-3">
                    <div class="">
                        <h1 class="text-2xl md:text-4xl text-skyBlue font-space py-4">{{ $service->project }}+</h1>
                        <p class="text-lightGray pb-4 font-dm">Projects Completed</p>
                    </div>
                    <div class="">
                        <h1 class="text-2xl md:text-4xl text-skyBlue font-space py-4">{{ $service->client }}+</h1>
                        <p class="text-lightGray pb-4 font-dm">Happy Clients</p>
                    </div>
                    <div class="">
                        <h1 class="text-2xl md:text-4xl text-skyBlue font-space py-4 flex">
                            {{ $service->review }}
                            <i class="fa-solid fa-star mx-2"></i>
                        </h1>
                        <p class="text-lightGray pb-4 font-dm">Positive Rating</p>
                    </div>
                </div>
            </div>
            <!-- Image -->
            <div class="md:w-1/3 space-y-12 flex flex-col justify-center ">
                <img class="" src="{{ asset('images/service') }}/{{$service->service_image}}" alt="{{ $service->service_title }}" />
                <span><img class="" src="images/Star 1.png" alt=""></span>
            </div>

        </div>
    </section>
    <section id="pricing">

        <div class="container w-full mt-10 p-6">
            <h1 class="text-center font-bold font-space text-4xl text-darkGray mb-10">
                Pricing Plans
            </h1>
        </div>
        <div
            class="md:max-w-7xl md:mx-auto md:gap-4 py-6 px-4 md:grid md:grid-cols-3 sm:px-6 lg:px-8 md:py-12 space-y-6 md:space-y-0">
            @foreach ($package as $packages)
                @if ($packages->position == 1)
                    <div class="border border-gray-300 mx-10 shadow-lg rounded-2xl flex flex-col">
                        <div
                            class="bg-gradient-to-r from-purple-600 to-indigo-600 font-space p-6  text-gray-100 rounded-t-2xl">
                            <h3 class="text-center text-xl md:text-2xl  uppercase">Basic package</h3>
                            <p class="text-sm font-bold font-space text-center">
                                <span class="text-3xl">$</span>
                                @if ($packages->offer_package_price == null)
                                <span class="text-3xl">{{ $packages->package_price }}</span>
                                <span class="text-sm">/start from</span>
                                @elseif ($packages->offer_package_price != null&&$packages->offer_price_start_date <= date('Y-m-d') && $packages->offer_price_end_date >= date('Y-m-d'))
                                    <del class="text-3xl">{{ $packages->package_price }}</del>
                                    <span class="text-3xl">{{ $packages->offer_package_price }}</span>
                                    <span class="text-sm">/start from</span>
                                @endif
                            </p>
                        </div>

                        <ul class="pt-8 px-6 space-y-4 flex-1">
                            @foreach ($packages->attributes as $data)
                                <li class="flex items-center text-sm leading-6 capitalize">
                                    <i
                                        class="fa-solid fa-check text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-indigo-600"></i><span
                                        class="pl-4">{{ $data->attribute_name }}</span>
                                </li>
                            @endforeach

                        </ul>

                        <input type="hidden" name="service_id" id="service_id_1" value="{{ $service->id }}">
                        <input type="hidden" name="id" id="id_1" value="{{ $packages->id }}">
                        <input type="hidden" name="name" id="name_1" value="{{ $packages->package_name }}">
                        <input type="hidden" name="price" id="price_1" value="{{ $packages->package_price }}">
                        <input type="hidden" value="1" id="quantity_1" name="quantity">
                        <button
                            class="text-center block rounded-lg m-6 p-4 bg-gradient-to-r from-purple-600 to-indigo-600 font-dm font-semibold text-gray-100 capitalize"
                            onclick="addToCart(1);">add to cart</button>
                    </div>
                @elseif($packages->position == 2)
                    <div class="border border-gray-300 mx-10 shadow-lg rounded-2xl flex flex-col">
                        <div
                            class="bg-gradient-to-r from-yellow-400 to-orange-500 font-space rounded-t-2xl text-white p-6 relative">
                            <div class="absolute inset-x-0 top-0 flex  justify-center -mt-3 ">
                                <div
                                    class="inline-block px-3 py-.5 text-xs font-extralight font-dm tracking-wider border-solid border-2 border-yellow-500  text-yellow-500 bg-white  uppercase rounded-full bg-deep-purple-accent-400">
                                    Most Popular
                                </div>
                            </div>
                            <h3 class="text-center text-xl md:text-2xl uppercase">standard package</h3>
                            <p class="text-sm font-bold font-space text-center">
                                <span class="text-3xl">$</span>@if ($packages->offer_package_price == null)
                                <span class="text-3xl">{{ $packages->package_price }}</span>
                                <span class="text-sm">/start from</span>
                                @elseif ($packages->offer_package_price != null&&$packages->offer_price_start_date <= date('Y-m-d') && $packages->offer_price_end_date >= date('Y-m-d'))
                                    <del class="text-3xl">{{ $packages->package_price }}</del>
                                    <span class="text-3xl">{{ $packages->offer_package_price }}</span>
                                    <span class="text-sm">/start from</span>
                                @endif
                            </p>
                        </div>
                        <ul class="pt-8 px-6 space-y-4 flex-1">
                            @foreach ($packages->attributes as $data)
                                <li class="flex items-center text-sm leading-6 capitalize">
                                    <i
                                        class="fa-solid fa-check text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-orange-500"></i><span
                                        class="pl-4">{{ $data->attribute_name }}</span>
                                </li>
                            @endforeach

                        </ul>

                        <input type="hidden" name="service_id" id="service_id_2" value="{{ $service->id }}">
                        <input type="hidden" name="id" id="id_2" value="{{ $packages->id }}">
                        <input type="hidden" name="name" id="name_2" value="{{ $packages->package_name }}">
                        <input type="hidden" name="price" id="price_2" value="{{ $packages->package_price }}">
                        <input type="hidden" value="1" id="quantity_2" name="quantity">
                        <button type="button" onclick="addToCart(2);"
                            class="text-center block w-[80%] rounded-lg mx-auto my-6 p-4 bg-gradient-to-r from-yellow-400 to-orange-500 font-dm font-semibold text-gray-200 capitalize">add
                            to cart</button>
                    </div>
                @elseif($packages->position == 3)
                    <div class="border border-gray-300 mx-10 shadow-lg rounded-2xl">
                        <div
                            class="bg-gradient-to-r from-redLight to-redDark font-space rounded-t-2xl text-gray-100 p-6 relative">
                            <div class="absolute inset-x-0 top-0 flex  justify-center -mt-3 ">
                                <div
                                    class="inline-block px-3 py-.5 text-xs font-extralight font-dm tracking-wider border-solid border-2 border-red-500 text-red-500 bg-white  uppercase rounded-full bg-deep-purple-accent-400">
                                    Highly Recommended
                                </div>
                            </div>
                            <h3 class="text-center text-xl md:text-2xl uppercase">premium package</h3>
                            <p class="text-sm font-bold font-space text-center">
                                <span class="text-3xl">$</span>
                                @if ($packages->offer_package_price == null)
                                <span class="text-3xl">{{ $packages->package_price }}</span>
                                <span class="text-sm">/start from</span>
                                @elseif ($packages->offer_package_price != null&&$packages->offer_price_start_date <= date('Y-m-d') && $packages->offer_price_end_date >= date('Y-m-d'))
                                    <del class="text-3xl">{{ $packages->package_price }}</del>
                                    <span class="text-3xl">{{ $packages->offer_package_price }}</span>
                                    <span class="text-sm">/start from</span>
                                @endif
                            </p>
                        </div>

                        <ul class="pt-8 mx-6 space-y-4 flex-1">
                            @foreach ($packages->attributes as $data)
                                <li class="flex items-center text-sm leading-6 capitalize">
                                    <i
                                        class="fa-solid fa-check text-transparent bg-clip-text bg-gradient-to-r from-redLight to-redDark"></i><span
                                        class="pl-4">{{ $data->attribute_name }}</span>
                                </li>
                            @endforeach
                        </ul>
                        <input type="hidden" name="service_id" id="service_id_3" value="{{ $service->id }}">
                        <input type="hidden" name="id" id="id_3" value="{{ $packages->id }}">
                        <input type="hidden" name="name" id="name_3" value="{{ $packages->package_name }}">
                        <input type="hidden" name="price" id="price_3" value="{{ $packages->package_price }}">
                        <input type="hidden" value="1" id="quantity_3" name="quantity">

                        <button type="button" onclick="addToCart(3);"
                            class="text-center block w-[80%] rounded-lg mx-auto my-6 p-4 bg-gradient-to-r from-redLight to-redDark font-dm font-semibold text-gray-200 capitalize">add
                            to cart</button>

                    </div>
                @endif
            @endforeach





        </div>
    </section>
    <section id="order">
        <div class="max-w-6xl mx-auto py-12 px-8 md:px-0">
            <h2 class="text-start text-2xl md:text-3xl font-space font-bold">
                What are the requirements to order a logo design?
            </h2>
            <p class="text-lightGray text-start font-dm space-y-4 py-4 text-sm font-medium">
                Your Logo Design Brief >Brand Guidelines>Budget>Timeline>Communication
                .
            </p>
            <p class="text-lightGray text-start font-dm space-y-4 py-4 text-sm font-medium">
                Overall, the more information and guidance the client can provide, the
                better the designer can create a logo that meets their needs and
                achieves their goals.
            </p>
        </div>
    </section>


    <section id="portfolio">
        <h1 class="text-center text-3xl md:text-5xl font-space capitalize">our portfolios</h1>
        <div class="container lg:max-w-7xl grid grid-cols-1  md:mx-auto my-10   lg:grid-cols-4 gap-5  md:max-w-6xl md:px-6 md:grid  md:grid-cols-4 sm:grid sm:grid-cols-2"
            id="load_more_protfolio">
            @forelse ($portfolio as $data)
                <img class="mx-auto px-4" src="{{ asset("images/portfolio/{$data->portfolio_image}") }}"
                    alt="portfolio" />

                {{-- <img class="mx-auto px-4" src="{{ asset("images/portfolio/{$data->portfolio_image}" ) }}" alt="portfolio" /> --}}
            @empty
                <div class="bg-gray-100 rounded-lg shadow-lg col-span-4 place-items-center">
                    <div class="p-4">
                        <h2 class="text-2xl font-bold font-space text-center">No Portfolio</h2>
                    </div>
                </div>
            @endforelse
        </div>
        <div class="container m-10">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded"
                onclick="load_more_protfolio();">
                Load Button
            </button>
            <input type="hidden" id="load" value="1">
            <input type="hidden" id="service_id" value="{{ $service->id }}">
        </div>
    </section>
    <script>
        function addToCart(i) {
            var service_id = document.getElementById('service_id_' + '' + i).value;
            var id = document.getElementById('id_' + '' + i).value;
            var quantity = document.getElementById('quantity_' + '' + i).value;

            $.get("{{ route('addCart') }}", {
                'service_id': service_id,
                'id': id,
                'quantity': quantity,


            }, function(result) {
                $('#cartNumber').html(result);
                modal.style.display = "block";
            });
            // success: function (response) {
            //    window.location.reload();
            // };


        }

        function load_more_protfolio(i) {
            var service_id = document.getElementById('service_id').value;
            var load = document.getElementById('load').value;
            $.post("{{ route('load_more') }}", {
                '_token': "{{ csrf_token() }}",
                'service_id': service_id,
                'load': load,
            }, function(result) {
                $('#load_more_protfolio').append(result);
                $('#load').val(+load + 1);
            });
            // success: function (response) {
            //    window.location.reload();
            // };


        }

        function close_modal() {
            modal.style.display = "none";
        }
    </script>
@endsection
