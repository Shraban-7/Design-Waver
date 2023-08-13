@extends('frontend.layouts.master')
@section('title', $service->meta_title)
@section('meta_keywords', $service->meta_keywords)
@section('meta_description', $service->meta_description)
@section('logo_design')
<section id="logo_design" class="bg-heroBg">
    <!-- Flex Container  -->
    <div
        class="container flex flex-col-reverse items-start justify-between px-6 pt-10 mx-auto space-y-0 md:space-y-0 md:flex-row">
        <!-- Left item -->

        <div class="container flex flex-col mb-32 space-y-12 md:w-2/3">

            <h1 class="flex-1 max-w-6xl text-3xl font-bold text-center font-space md:text-5xl md:text-left">
                {{ $service->service_title }}
            </h1>
            <div class="max-w-6xl text-center font-dm text-lightGray md:text-left">
                @php echo stripslashes($service->service_description) ;@endphp
            </div>
            <h3 class="flex-1 max-w-md text-lg font-bold text-center font-space md:text-xl md:text-left">
                Our {{ $service->service_name }} Process
            </h3>
            <p class="max-w-6xl text-center capitalize font-dm text-lightGray md:text-left">
                {{ $service->service_process }}
            </p>
            <div class="grid grid-cols-3">
                <div class="">
                    <h1 class="py-4 text-2xl md:text-4xl text-skyBlue font-space">{{ $service->project }}+</h1>
                    <p class="pb-4 text-lightGray font-dm">Projects Completed</p>
                </div>
                <div class="">
                    <h1 class="py-4 text-2xl md:text-4xl text-skyBlue font-space">{{ $service->client }}+</h1>
                    <p class="pb-4 text-lightGray font-dm">Happy Clients</p>
                </div>
                <div class="">
                    <h1 class="flex py-4 text-2xl md:text-4xl text-skyBlue font-space">
                        {{ $service->review }}
                        <i class="mx-2 text-2xl fa-solid fa-star"></i>
                    </h1>
                    <p class="pb-4 text-lightGray font-dm">Positive Rating</p>
                </div>
            </div>
        </div>
        <!-- Image -->
        <div class="container md:w-1/3">
            <img class="object-cover mx-auto" src="{{ asset(" images/service/service_banner/{$service->service_banner}")
            }}"
            alt="{{ $service->service_title }}" />
        </div>

    </div>
</section>
<section id="pricing" class="mt-4">
    <div class="flex items-center justify-center mb-6 text-4xl font-bold font-space text-darkGray">
        Our Pricing Plans
    </div>
    <div
        class="px-4 py-6 space-y-4 md:max-w-6xl md:mx-auto md:gap-2 md:grid md:grid-cols-3 md:space-x-2 sm:px-6 lg:px-4 md:py-8 md:space-y-0">
        @foreach ($service->package as $packages)
        @if ($packages->position == 1)
        <div class="flex flex-col mx-10 border border-gray-300 shadow-lg md:mx-0 rounded-2xl">
            <div class="p-6 text-gray-100 bg-gradient-to-r from-purple-600 to-indigo-600 font-space rounded-t-2xl">
                <h3 class="text-xl text-center uppercase md:text-2xl">Basic package</h3>
                <p class="text-sm font-bold text-center font-space">
                    <span class="text-3xl">$</span>
                    @if ($packages->offer_package_price == null || $packages->offer_price_end_date <= date('Y-m-d'))
                        <span class="text-3xl">{{ $packages->package_price }}</span>
                        <span class="text-sm">/start from</span>
                        @elseif (
                        $packages->offer_package_price != null &&
                        $packages->offer_price_start_date <= date('Y-m-d') && $packages->offer_price_end_date >=
                            date('Y-m-d'))
                            <del class="text-3xl">{{ $packages->package_price }}</del>
                            <span class="text-3xl">{{ $packages->offer_package_price }}</span>
                            <span class="text-sm">/start from</span>
                            @endif
                </p>
            </div>

            <ul class="flex-1 px-6 pt-8 space-y-4">
                @foreach ($packages->attributes as $data)
                <li class="flex items-center text-sm leading-6 capitalize">
                    <i
                        class="text-transparent fa-solid fa-check bg-clip-text bg-gradient-to-r from-purple-600 to-indigo-600"></i><span
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
                class="block p-4 m-6 font-semibold text-center text-gray-100 capitalize rounded-lg bg-gradient-to-r from-purple-600 to-indigo-600 font-dm"
                onclick="addToCart(1);">add to cart</button>
        </div>
        @elseif($packages->position == 2)
        <div class="flex flex-col mx-10 border border-gray-300 shadow-lg md:mx-0 rounded-2xl">
            <div
                class="relative p-6 text-white bg-gradient-to-r from-yellow-400 to-orange-500 font-space rounded-t-2xl">
                <div class="absolute inset-x-0 top-0 flex justify-center -mt-3 ">
                    <div
                        class="inline-block px-3 py-.5 text-xs font-extralight font-dm tracking-wider border-solid border-2 border-yellow-500  text-yellow-500 bg-white  uppercase rounded-full bg-deep-purple-accent-400">
                        Most Popular
                    </div>
                </div>
                <h3 class="text-xl text-center uppercase md:text-2xl">standard package</h3>
                <p class="text-sm font-bold text-center font-space">
                    <span class="text-3xl">$</span>
                    @if ($packages->offer_package_price == null || $packages->offer_price_end_date <= date('Y-m-d'))
                        <span class="text-3xl">{{ $packages->package_price }}</span>
                        <span class="text-sm">/start from</span>
                        @elseif (
                        $packages->offer_package_price != null &&
                        $packages->offer_price_start_date <= date('Y-m-d') && $packages->offer_price_end_date >=
                            date('Y-m-d'))
                            <del class="text-3xl">{{ $packages->package_price }}</del>
                            <span class="text-3xl">{{ $packages->offer_package_price }}</span>
                            <span class="text-sm">/start from</span>
                            @endif
                </p>
            </div>
            <ul class="flex-1 px-6 pt-8 space-y-4">
                @foreach ($packages->attributes as $data)
                <li class="flex items-center text-sm leading-6 capitalize">
                    <i
                        class="text-transparent fa-solid fa-check bg-clip-text bg-gradient-to-r from-yellow-400 to-orange-500"></i><span
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
        <div class="mx-10 border border-gray-300 shadow-lg md:mx-0 rounded-2xl">
            <div class="relative p-6 text-gray-100 bg-gradient-to-r from-redLight to-redDark font-space rounded-t-2xl">
                <div class="absolute inset-x-0 top-0 flex justify-center -mt-3 ">
                    <div
                        class="inline-block px-3 py-.5 text-xs font-extralight font-dm tracking-wider border-solid border-2 border-red-500 text-skyBlue bg-white  uppercase rounded-full bg-deep-purple-accent-400">
                        Highly Recommended
                    </div>
                </div>
                <h3 class="text-xl text-center uppercase md:text-2xl">premium package</h3>
                <p class="text-sm font-bold text-center font-space">
                    <span class="text-3xl">$</span>
                    @if ($packages->offer_package_price == null || $packages->offer_price_end_date <= date('Y-m-d'))
                        <span class="text-3xl">{{ $packages->package_price }}</span>
                        <span class="text-sm">/start from</span>
                        @elseif (
                        $packages->offer_package_price != null &&
                        $packages->offer_price_start_date <= date('Y-m-d') && $packages->offer_price_end_date >=
                            date('Y-m-d'))
                            <del class="text-3xl">{{ $packages->package_price }}</del>
                            <span class="text-3xl">{{ $packages->offer_package_price }}</span>
                            <span class="text-sm">/start from</span>
                            @endif
                </p>
            </div>

            <ul class="flex-1 pt-8 mx-6 space-y-4">
                @foreach ($packages->attributes as $data)
                <li class="flex items-center text-sm leading-6 capitalize">
                    <i
                        class="text-transparent fa-solid fa-check bg-clip-text bg-gradient-to-r from-redLight to-redDark"></i><span
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
    <div class="max-w-6xl px-8 py-12 mx-auto md:px-0">
        <h2 class="text-2xl font-bold text-start md:text-3xl font-space">
            What are the requirements to order a {{ $service->service_name }}?
        </h2>
        <p class="py-4 space-y-4 text-sm font-medium text-lightGray text-start font-dm">
            Your {{ $service->service_name }} Brief >Brand Guidelines>Budget>Timeline>Communication
            .
        </p>
        <p class="py-4 space-y-4 text-sm font-medium text-lightGray text-start font-dm">
            Overall, the more information and guidance the client can provide, the
            better the designer can create a {{ $service->service_name }} that meets their needs and
            achieves their goals.
        </p>
    </div>
</section>


<section id="portfolio" class="p-0 m-0">
    <h1 class="mb-5 text-3xl text-center capitalize md:text-5xl font-space">our portfolios</h1>

    <div class="grid gap-1 p-20 md:grid-cols-4" id="load_more_protfolio">
        @forelse ($portfolio as $data)
        <a href="{{ asset("images/portfolio/{$data->portfolio_image}") }}" data-lightbox="gallery">

            <img src="{{ asset("images/portfolio/{$data->portfolio_image}") }}" alt="portfoloi"
            class="object-cover w-full h-full cursor-pointer" />
        </a>


        @empty
        <div class="container w-full col-span-4 bg-gray-100 rounded-lg shadow-lg">
            <div class="p-4">
                <h2 class="text-2xl font-bold text-center font-space">No Portfolio</h2>
            </div>
        </div>
        @endforelse
    </div>

    <!-- The Modal -->
@if ($count_port>8)
<div class="md:container 2xl:w-full w-[80%] mb-10 mx-auto md:mb-0 flex justify-center md:justify-center">
    <button class="px-4 py-2 font-bold text-white rounded bg-skyBLue hover:bg-orange-400"
        onclick="load_more_protfolio();">
        Load More Portfolio
    </button>
    <input type="hidden" id="load" value="1">
    <input type="hidden" id="service_id" value="{{ $service->id }}">
</div>
@endif






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
                //modal.style.display = "block";
				alert_message();
				window.location.replace("{{ route('order') }}");
            });



            // success: function (response) {
            //    window.location.reload();
            // };

        }
		function alert_message(){
			$.dialog({
                title: 'Alert!',
                content: 'Cart Added Successfully!',
                // dialogClass: "modal-dialog modal-lg"
                boxWidth: '30%',
                useBootstrap: false,
                type: 'green',

            });
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

        // function close_modal() {
        //     modal.style.display = "none";
        // }



</script>
@endsection
