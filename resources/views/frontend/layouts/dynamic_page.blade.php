@extends('frontend.layouts.master')
@section('title', $page->meta_title)
@section('meta_keywords', $page->meta_keywords)
@section('meta_description', $page->meta_description)

@section('about')
<section id="about" class="bg-heroBg">
    <!-- Flex Container  -->
    @if($page->slug=='about-us')
    <div
        class="container flex flex-col-reverse items-center justify-between px-6 pt-10 mx-auto space-y-0 md:space-y-0 md:flex-row">
        <!-- Left item -->
        <div class="flex flex-col mb-32 space-y-12 md:w-1/2">

            <h1 class="flex-1 max-w-6xl  font-light font-dm text-lg font-bold text-center font-space md:text-lg md:text-left">
                {{ $page->page_name }}
            </h1>
            <h1 class="flex-1 max-w-6xl text-2xl font-bold text-center font-space md:text-5xl md:text-left">
                {{ $page->title }}
            </h1>
            <p class="max-w-6xl text-center font-dm text-lightGray md:text-left">
                @php
                if (strlen($page->content) > 450) {
                echo substr($page->content, 0, 450) . "<span id=\"dots\">...</span><span class=\"hidden\" id=\"more\">" .
                    substr($page->content, 450, strlen($page->content)) . "</span>";

                } else {
                echo $page->content;
                }
            @endphp
            </p>
            <button class="md:w-1/3 w-full p-2 px-6 text-lg text-white transition ease-in-out delay-150 rounded-lg font-dm hover:-translate-y-1 hover:scale-110 bg-skyBlue baseline hover:bg-orange-500" onclick="myFunction()" id="myBtn">Read more</button>
        </div>
        <!-- Image -->
        <div class="container p-4 md:w-1/2">
            <img class="object-cover rounded-lg " src="{{ asset("images/pages/{$page->image}") }}" alt="banner pic" />
        </div>
    </div>
    @else
    <div
        class="container flex flex-col-reverse items-center justify-between px-6 pt-10 mx-auto space-y-0 md:space-y-0 md:flex-row">
        <!-- Left item -->
        <div class="flex flex-col mb-32 space-y-12">
            <h1 class="flex-1 max-w-6xl text-2xl font-bold text-center font-space md:text-5xl md:text-left">
                {{ $page->title }}
            </h1>
            <p class="max-w-6xl text-center font-dm text-lightGray md:text-left">
                @php
                echo stripslashes($page->content);
                @endphp
            </p>

        </div>

    </div>
    @endif
</section>
@if ($page->slug=='about-us')
<section class="text-gray-600 body-font bg-slate-100">
    <div class="container px-5 py-24 mx-auto">
        <div class="mb-20 text-center">
            <h1 class="mb-4 text-3xl font-medium text-gray-900 md:text-4xl sm:text-3xl title-font font-space">Our Achivements
            </h1>
            <p class="mx-auto text-base leading-relaxed capitalize font-dm font-sembold xl:w-2/4 lg:w-3/4 text-gray-500s">Top rated
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
@else

@endif


<script>
    function myFunction() {
          var dots = document.getElementById("dots");
          var moreText = document.getElementById("more");
          var btnText = document.getElementById("myBtn");

          if (dots.style.display === "none") {
            dots.style.display = "inline";
            btnText.innerHTML = "Read more";
            moreText.style.display = "none";
          } else {
            dots.style.display = "none";
            btnText.innerHTML = "Read less";
            moreText.style.display = "inline";
          }
        }
</script>
@endsection
