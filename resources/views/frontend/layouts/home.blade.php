@extends('frontend.layouts.master')
@section('title', 'Home')
@section('meta_keywords', 'DesignWavers')
@section('meta_description', 'DesignWavers')

@section('home')
<!-- Hero Section  -->
<section id="hero" class="bg-heroBg py-0">
    <!-- Flex Container -->
    <div class="container flex flex-col-reverse items-center px-6 pt-10 mx-auto space-y-0 md:space-y-0 md:flex-row">
        <!-- Left item -->
        <div class="flex flex-col mt-4 md:mb-32 mb-24 space-y-12 md:mt-0 md:w-2/3">
            <h1 class="text-3xl font-bold text-center capitalize font-space md:text-5xl md:text-left">
                Unlock Your Brand's creativity with graphic design
            </h1>

            <p class="max-w-xl text-center font-dm text-lightGray md:text-left">
                Provide the best service and without revision restrictions, we are
                ready to help your business grow more with attractive and useful
                visuals.
            </p>
            <div class="flex justify-center md:justify-start">
                <!-- bg-gradient-to-r from-pink-500 to-red-500 -->
                <a href="{{ route('user.contact') }}"
                    class="p-2 px-6 text-lg text-white transition ease-in-out delay-150 rounded-lg font-dm hover:-translate-y-1 hover:scale-110 bg-skyBlue baseline hover:bg-orange-500">Let's
                    Talk</a>
            </div>
        </div>
        <!-- Image -->
        <div class="md:w-1/3">
            <img src="{{ asset('front_end/images/Homepage illustration.png') }}" alt="hero pic" />
        </div>
    </div>
</section>

<section id="brand" class="container flex flex-wrap md:pb-8 mx-auto">
    <div class="container px-6 md:pt-10 pt-0 mx-auto">
        <div class="flex flex-wrap">
            <h2 class="w-full my-auto md:text-3xl text-3xl sm:text-left text-center lg:w-2/6 md:w-1/3 pb-6">Trusted by
                <span class="font-bold">{{ (round(($brand_count+300 )/50))*50}}+</span> Company</h2>

            @foreach ($brands as $brand)
            <div class="w-1/2 p-4 lg:w-1/6 md:w-1/3">
                <div class="grid grid-cols-1">
                    <img alt="brand" class="flex-shrink-0 object-cover object-center w-full mb-4" src="{{ asset("images/brands/{$brand->brand_logo}") }}">
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

<section id="whyChooseUs" class="text-gray-600 body-font">

    <div class="container flex flex-wrap px-6 md:py-12 py-0 mx-auto">
        <div class="w-full p-6 mb-10 overflow-hidden rounded-lg lg:w-1/2 lg:mb-0">
            <img alt="feature" class="object-cover object-center h-full md:max-w-xl p-6 max-w-full" src="{{ asset("images/content/{$why_choose->banner}") }}">
        </div>
        <div class="flex flex-col flex-wrap -mb-10 text-center lg:py-6 lg:w-1/2 lg:pl-12 lg:text-left">
            <h2 class="text-lg font-semibold capitalize text-skyBlue">{{ $why_choose->header }}</h2>
            <h2 class="my-6 text-3xl text-black font-space">{{ $why_choose->title }}</h2>
            <div class="flex gap-5 mb-10">
                <div
                    class="2xl:w-16 2xl:h-16 md:w-16 md:h-12 w-[9rem] h-[3.5rem] inline-flex items-center justify-center rounded-full bg-orange-100 text-skyBlue mb-5">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                    </svg>

                </div>
                <div class="flex-grow">
                    <h2 class="mb-3 text-lg font-medium text-gray-900 title-font">
                        {{ $why_choose->sub_title1 }}</h2>
                    <p class="text-base leading-relaxed">{{ $why_choose->content1 }}</p>

                </div>
            </div>
            <div class="flex gap-5 mb-10">
                <div
                    class="2xl:w-16 2xl:h-16 md:w-16 md:h-12 w-[9rem] h-[3.5rem] flex items-center justify-center rounded-full bg-skyBlue text-red-100 mb-5">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.893 13.393l-1.135-1.135a2.252 2.252 0 01-.421-.585l-1.08-2.16a.414.414 0 00-.663-.107.827.827 0 01-.812.21l-1.273-.363a.89.89 0 00-.738 1.595l.587.39c.59.395.674 1.23.172 1.732l-.2.2c-.212.212-.33.498-.33.796v.41c0 .409-.11.809-.32 1.158l-1.315 2.191a2.11 2.11 0 01-1.81 1.025 1.055 1.055 0 01-1.055-1.055v-1.172c0-.92-.56-1.747-1.414-2.089l-.655-.261a2.25 2.25 0 01-1.383-2.46l.007-.042a2.25 2.25 0 01.29-.787l.09-.15a2.25 2.25 0 012.37-1.048l1.178.236a1.125 1.125 0 001.302-.795l.208-.73a1.125 1.125 0 00-.578-1.315l-.665-.332-.091.091a2.25 2.25 0 01-1.591.659h-.18c-.249 0-.487.1-.662.274a.931.931 0 01-1.458-1.137l1.411-2.353a2.25 2.25 0 00.286-.76m11.928 9.869A9 9 0 008.965 3.525m11.928 9.868A9 9 0 118.965 3.525" />
                      </svg>



                </div>
                <div class="flex-grow">
                    <h2 class="mb-3 text-lg font-medium text-gray-900 title-font">{{ $why_choose->sub_title2 }}</h2>
                    <p class="text-base leading-relaxed">{{ $why_choose->content2 }}</p>

                </div>
            </div>
            <div class="flex gap-5 mb-10">
                <div
                    class="2xl:w-16 2xl:h-16 md:w-16 md:h-12 w-[9rem] h-[3.5rem] inline-flex items-center justify-center rounded-full bg-orange-100 mb-5 bg-orange-100 text-skyBlue mb-5">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                      </svg>

                </div>
                <div class="flex-grow">
                    <h2 class="mb-3 text-lg font-medium text-gray-900 title-font">
                        {{ $why_choose->sub_title3 }}</h2>
                    <p class="text-base leading-relaxed">{{ $why_choose->content3 }}</p>

                </div>
            </div>
        </div>
    </div>

</section>

<!-- Service Section  -->
<service id="service" class="p-0 m-0">
    <div class="w-full p-6 mt-10">
        <h2 class="flex justify-center mx-auto text-4xl font-bold align-baseline font-space text-darkGray">
            Our Services
        </h2>
        <p class="w-2/3 mx-auto mt-10 text-center font-dm">
            Provide the best service and without revision restrictions, we are
            ready to help your business grow more with attractive and useful
            visuals
        </p>
    </div>
    <div class="container grid gap-6 p-6 mx-auto lg:grid-cols-3 md:grid-cols-2">
        @foreach ($services as $service)
        <div class="m-4">
            <img src="{{ asset("images/service/service_image/{$service->service_image}") }}" alt="service2" />
            <h2 class="py-4 text-2xl font-bold text-start text-darkGray font-space hover:text-skyBlue">
                <a href="{{ route('service_details', $service->slug) }}">{{ $service->service_name }}</a>
            </h2>
            <p class="pb-4 text-start text-lightGray font-dm">
                {{ $service->service_title }}
            </p>
            <a href="{{ route('service_details', $service->slug) }}/#pricing"
                class="py-4 font-semibold underline text-start text-darkGray font-dm hover:no-underline hover:text-skyBlue">Pricing
                Details</a>
        </div>
        @endforeach
    </div>
</service>
<section id="about" class="bg-heroBg">
    <!-- Flex Container  -->
    <div
        class="container flex flex-col-reverse items-center justify-between px-6 pt-10 mx-auto space-y-0 md:space-y-0 md:flex-row">
        <!-- Left item -->

        <div class="flex flex-col mb-32 md:w-1/2">
            <h4 class="text-center md:text-left">ABOUT US</h3>
                <h1
                    class="flex-1 max-w-6xl mt-4 mb-6 text-5xl font-bold text-center font-space md:text-5xl md:text-left">
                    {{ $page->title }}
                </h1>
                <p class="max-w-6xl text-center font-dm text-lightGray md:text-left">
                    @php
                    if(strlen($page->content) > 450){
                    echo substr($page->content,0,450) . " ...";
                    }else{
                    echo $page->content;
                    }
                    @endphp
                </p>
                @php
                if(strlen($page->content) > 450){
                @endphp
                <div class="flex justify-center mt-8 md:justify-start ">


                        <a href="{{ URL::to('pages/') . '/about-us' }}"
                            class="md:w-1/4 w-1/2 p-2 px-6 text-center text-lg mx-auto text-white transition ease-in-out delay-150 rounded-lg font-dm hover:-translate-y-1 hover:scale-110 bg-skyBlue baseline hover:bg-orange-500">

                            Read More
                        </a>
                        <div class="md:w-3/4"></div>

                </div>
                @php
                }
                @endphp
        </div>
        <!-- Image -->
        <div class="container p-4 md:w-1/2">
            <img class="object-cover rounded-lg " src="{{ asset("images/pages/{$page->image}") }}" alt="banner pic"
            />
        </div>
    </div>
</section>

<section class="text-gray-600 body-font bg-slate-100">
    <div class="container px-5 py-24 mx-auto">
        <div class="mb-20 text-center">
            <h1 class="mb-4 text-3xl font-medium text-gray-900 md:text-4xl sm:text-3xl title-font font-space">Our
                Achivements
            </h1>
            <p
                class="mx-auto text-base leading-relaxed capitalize font-dm font-sembold xl:w-2/4 lg:w-3/4 text-gray-500s">
                Top rated
                graphics
                design agency with goblal client mangement ,client satisfaction and sucess</p>
            {{-- <div class="flex justify-center mt-6">
                <div class="w-[100%] h-1 rounded-full bg-skyBlue inline-flex"></div>
            </div> --}}
        </div>
        <div class="grid grid-cols-2 gap-4 md:grid-cols-4">
            <div class="text-center item-center">
                <div
                    class="inline-flex items-center justify-center flex-shrink-0 mb-5 text-white border-2 rounded-full md:w-36 md:h-36 w-24 h-24 md:p-0 p-2 bg-skyBLue border-skyBlue">
                    <div class="p-6 md:text-3xl text-lg font-bold capitalize font-dm">
                        @php
                        $start_year=2019;
                        $current_year=date('Y');
                        $experience=$current_year-$start_year;
                        @endphp
                        <p class="md:p-3 text-left p-0">{{ $experience }}+ years</p>
                        <p class="text-xs">experience</p>
                    </div>
                </div>
            </div>

            <div class="text-center item-center">
                <div
                    class="inline-flex items-center justify-center flex-shrink-0 mb-5 bg-indigo-100 border-2 rounded-full text-skyBlue md:w-36 md:h-36 w-24 h-24 md:p-0 p-2 border-skyBlue">
                    <div class="p-6 md:text-3xl text-lg font-bold capitalize font-dm">
                        <p class="md:p-3 text-left p-0">{{ (round(($count_order+1000)/50))*50 }}+ project</p>
                        <p class="text-xs">completed</p>
                    </div>
                </div>

            </div>
            <div class="text-center item-center">
                <div
                    class="inline-flex items-center justify-center flex-shrink-0 mb-5 text-white border-2 rounded-full bg-skyBlue md:w-36 md:h-36 w-24 h-24 md:p-0 p-2 border-skyBlue">
                    <div class="p-6 md:text-3xl text-lg font-bold capitalize font-dm">
                        <p class="md:p-3 text-left p-0">{{ (round(($count_user+700)/100))*100 }}+ Happy</p>
                        <p class="text-xs">Clients</p>
                    </div>

                </div>

            </div>
            <div class="text-center item-center">
                <div
                    class="inline-flex items-center justify-center flex-shrink-0 mb-5 bg-indigo-100 border-2 rounded-full text-skyBlue md:w-36 md:h-36 w-24 h-24 border-[#AACB73]">
                    <div class="p-6 md:text-3xl text-lg font-bold capitalize font-dm">
                        <p class="md:p-3 p-1">4.9*</p>

                        <p class="text-xs">Positive Rating</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<section id="contact">
    <!-- Flex Container  -->

    @if ($message = Session::get('success'))
    <div class="sticky top-15 right-5 z-50 flex justify-end">
        <div id="toast-success"
            class="flex justify-center items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-green-400 rounded-lg shadow"
            role="alert">
            <div
                class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg">
                <svg aria-hidden="true" class="w-5 h-5 text-green-600 " focusable="false" data-prefix="fas"
                    data-icon="paper-plane" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor"
                        d="M511.6 36.86l-64 415.1c-1.5 9.734-7.375 18.22-15.97 23.05c-4.844 2.719-10.27 4.097-15.68 4.097c-4.188 0-8.319-.8154-12.29-2.472l-122.6-51.1l-50.86 76.29C226.3 508.5 219.8 512 212.8 512C201.3 512 192 502.7 192 491.2v-96.18c0-7.115 2.372-14.03 6.742-19.64L416 96l-293.7 264.3L19.69 317.5C8.438 312.8 .8125 302.2 .0625 289.1s5.469-23.72 16.06-29.77l448-255.1c10.69-6.109 23.88-5.547 34 1.406S513.5 24.72 511.6 36.86z">
                    </path>
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ml-3 text-sm font-normal text-white">{{ $message }}</div>
            <button type="button"
                class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8"
                data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    </div>
    @endif

    <div
        class="container mx-auto p-6 flex flex-col justify-center md:justify-between items-start md:flex-row space-y-4 md:space-y-0">
        <div class="space-y-2  sm:space-y-6 mr-10">
            <h1
                class="lg:text-left md:text-center sm:text-center lg:text-5xl sm:text-3xl capitalize font-space font-bold">
                {{ $contact_info->header }}
            </h1>
            <h4 class="font-bold font-space text-xl">{{ $contact_info->sub_title1 }}:</h4>
            <span class="font-dm text-lightGray font-medium capitalize">{{ $contact_info->content1 }}</span>
            <h4 class="font-bold font-space text-xl capitalize">{{ $contact_info->sub_title2 }}:</h4>
            <span class="font-dm text-lightGray font-medium capitalize">{{ $contact_info->content2 }}</span>
            {{-- <span
                class="font-dm text-lightGray font-medium pl-4 capitalize">+8801685828702</span> --}}
            <h4 class="font-bold font-space text-xl capitalize">{{ $contact_info->sub_title3 }}:</h4>
            <span class="font-dm text-lightGray font-medium">{{ $contact_info->content3 }}</span>
        </div>
        <div class="flex-1 ml-4 2xl:container">
            <form action="{{ route('user.contact') }}" method="POST">
                @csrf
                <div class="grid grid-cols-2  gap-6">
                    <div class="mb-6">
                        <label for="name" class="block mb-2 font-dm">Full Name</label>
                        <input type="text"
                            class="bg-gray-50 border border-1 border-blue-500 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            name="name" id="name" placeholder="Enter Your Name" />
                    </div>
                    <div class="mb-6">
                        <label for="email" class="block mb-2 font-dm">Your email</label>
                        <input type="email" id="email" name="email"
                            class="bg-gray-50 border border-blue-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 block w-full"
                            placeholder="name@name.com" />
                    </div>

                </div>
                <div class="grid grid-cols-2 gap-6">
                    <div class="mb-6">
                        <label for="phone" class="block mb-2 font-dm">Phone</label>
                        <input type="text"
                            class="bg-gray-50 border border-1 border-blue-500 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            name="phone" id="name" placeholder="Enter Your Phone Number" />
                    </div>
                    <div class="mb-6">
                        <label for="work" class="block mb-2 font-dm">Types Of Work</label>
                        <select id="work" name="service_name"
                            class="bg-gray-50 border border-blue-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="">---select---</option>
                            @foreach ($services as $service)
                            <option value="{{ $service->service_name }}">{{ $service->service_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-1 w-full">
                    <label for="message" class="block mb-2 font-dm text-gray-900 ">Your message</label>
                    <textarea id="message" name="message" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50  rounded-lg border border-blue-500 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Leave a comment..."></textarea>
                </div>
                <div class="flex items-baseline w-full justify-between my-10">
                    <div class=""></div>
                    <button
                        class="lg:ml-auto lg:w-1/2 w-full py-3 px-5 text-sm font-medium text-center font-dm text-white rounded-lg bg-skyBlue"
                        type="submit">Send Your Message</button>
                </div>
            </form>
        </div>
    </div>
</section>




@endsection
