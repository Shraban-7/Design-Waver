<style>
    .elementor-shape-top {
        top: -1px;
    }

    .elementor-shape {
        overflow: hidden;
        position: relative;
        left: 0;
        bottom: 0;
        width: 100%;
        line-height: 0;
        direction: ltr;
    }

    .elementor *,
    .elementor :after,
    .elementor :before {
        box-sizing: border-box;
    }

    *,
    :after,
    :before {
        box-sizing: border-box;
    }

    div {
        display: block;
    }

    #visual{
        margin: 0 auto;
    }
    .elementor-524 .elementor-element.elementor-element-787a776>.elementor-shape-top svg {
        width: calc(190% + 1.3px);
        height: 165px;
        transform: translateX(-50%) rotateY(180deg);
    }

    .elementor-shape svg {
        display: block;
        width: calc(100% + 1.3px);
        position: relative;
        left: 50%;
        transform: translateX(-50%);
    }

    .elementor *,
    .elementor :after,
    .elementor :before {
        box-sizing: border-box;
    }

    *,
    :after,
    :before {
        box-sizing: border-box;
    }

    user agent stylesheet svg:not(:root) {
        overflow-clip-margin: content-box;
        overflow: hidden;
    }


    .tooltip {
  position: relative;
  display: inline-block;
  border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: black;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;

  /* Position the tooltip */
  position: absolute;
  z-index: 1;
  top: -5px;
  right: 105%;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
}
</style>
{{-- <button class="tooltip" data-tooltip-target="tooltip-left" data-tooltip-placement="left">
    <div class="fixed z-50 right-10 bottom-40">
        <a aria-label="Chat on WhatsApp"
            class="transititext-primary text-primary transition duration-150 ease-in-out hover:text-primary-600 focus:text-primary-600 active:text-primary-700"
            href="https://wa.me/+8801868471647">
            <img alt="Chat on whatsapp" class="w-10 h-10 rounded-full lg:h-16 lg:w-16"
                src="{{ asset('front_end/images/WhatsAppButtonGreenLarge.jpg') }}"   />
        </a>
    </div>

</button>
<div id="tooltip-left" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
    Tooltip on left
    <div class="tooltip-arrow" data-popper-arrow></div>
</div> --}}

<div class="fixed md:right-10 right-0 bottom-20 ">

    <div class="flex justify-end items-center">

        <a href="https://wa.me/+8801868471647" target="_blank" aria-label="Chat on WhatsApp" data-tooltip-target="tooltip-left" data-tooltip-placement="left"  class="transititext-primary text-primary transition duration-150 active:text-primary-700 ease-in-out hover:text-primary-600  relative mb-2 md:mb-0 text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center " >


            <img alt="Chat on whatsapp" class="lg:w-16 w-10 z-50"
                src="{{ asset('front_end/images/Whatsapp png version.png') }}"   />
    </a>
        <div id="tooltip-left" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-900 bg-slate-200 rounded-lg shadow-lg opacity-1 tooltip ">
            Need Help?
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>
    </div>
</div>




<div class="hidden overflow-hidden sm:w-full sm:block" data-negative="false">

    <svg id="visual" viewBox="0 0 1920 200" width="1920" class="mx-auto" height="200" xmlns="http://www.w3.org/2000/svg"
        xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1">
        <path
            d="M0 55L29.2 61.7C58.3 68.3 116.7 81.7 174.8 90.5C233 99.3 291 103.7 349.2 101.8C407.3 100 465.7 92 523.8 91.5C582 91 640 98 698.2 102.2C756.3 106.3 814.7 107.7 872.8 106.8C931 106 989 103 1047.2 93.2C1105.3 83.3 1163.7 66.7 1221.8 63.7C1280 60.7 1338 71.3 1396.2 81.2C1454.3 91 1512.7 100 1570.8 100.7C1629 101.3 1687 93.7 1745.2 94.3C1803.3 95 1861.7 104 1890.8 108.5L1920 113L1920 201L1890.8 201C1861.7 201 1803.3 201 1745.2 201C1687 201 1629 201 1570.8 201C1512.7 201 1454.3 201 1396.2 201C1338 201 1280 201 1221.8 201C1163.7 201 1105.3 201 1047.2 201C989 201 931 201 872.8 201C814.7 201 756.3 201 698.2 201C640 201 582 201 523.8 201C465.7 201 407.3 201 349.2 201C291 201 233 201 174.8 201C116.7 201 58.3 201 29.2 201L0 201Z"
            fill="#dde6ed"></path>
        <path
            d="M0 98L29.2 102.7C58.3 107.3 116.7 116.7 174.8 114.2C233 111.7 291 97.3 349.2 100.8C407.3 104.3 465.7 125.7 523.8 130.7C582 135.7 640 124.3 698.2 115.7C756.3 107 814.7 101 872.8 100.7C931 100.3 989 105.7 1047.2 115C1105.3 124.3 1163.7 137.7 1221.8 133.7C1280 129.7 1338 108.3 1396.2 108.3C1454.3 108.3 1512.7 129.7 1570.8 133.5C1629 137.3 1687 123.7 1745.2 115.5C1803.3 107.3 1861.7 104.7 1890.8 103.3L1920 102L1920 201L1890.8 201C1861.7 201 1803.3 201 1745.2 201C1687 201 1629 201 1570.8 201C1512.7 201 1454.3 201 1396.2 201C1338 201 1280 201 1221.8 201C1163.7 201 1105.3 201 1047.2 201C989 201 931 201 872.8 201C814.7 201 756.3 201 698.2 201C640 201 582 201 523.8 201C465.7 201 407.3 201 349.2 201C291 201 233 201 174.8 201C116.7 201 58.3 201 29.2 201L0 201Z"
            fill="#83898b"></path>
        <path
            d="M0 141L29.2 144.5C58.3 148 116.7 155 174.8 153.8C233 152.7 291 143.3 349.2 137.3C407.3 131.3 465.7 128.7 523.8 128.8C582 129 640 132 698.2 135.3C756.3 138.7 814.7 142.3 872.8 143.3C931 144.3 989 142.7 1047.2 140.3C1105.3 138 1163.7 135 1221.8 136.2C1280 137.3 1338 142.7 1396.2 145.3C1454.3 148 1512.7 148 1570.8 153.2C1629 158.3 1687 168.7 1745.2 170.7C1803.3 172.7 1861.7 166.3 1890.8 163.2L1920 160L1920 201L1890.8 201C1861.7 201 1803.3 201 1745.2 201C1687 201 1629 201 1570.8 201C1512.7 201 1454.3 201 1396.2 201C1338 201 1280 201 1221.8 201C1163.7 201 1105.3 201 1047.2 201C989 201 931 201 872.8 201C814.7 201 756.3 201 698.2 201C640 201 582 201 523.8 201C465.7 201 407.3 201 349.2 201C291 201 233 201 174.8 201C116.7 201 58.3 201 29.2 201L0 201Z"
            fill="#353636"></path>
    </svg>
</div>
<footer class="text-gray-100 body-font bg-[#353636]">

    <div class="container px-5 py-5 mx-auto">
        <div class="flex flex-wrap order-first text-center md:text-left">
            <div class="w-full px-4 lg:w-1/4 md:w-1/2">
                <a class="w-full mb-6" href="{{ route('home') }}">
                    <img class="w-[70%] object-cover sm:ml-0 mx-auto"
                        src="{{ asset('front_end/images/Logo v5 white version.png') }}" alt="logo" />
                </a>
                <div class="md:w-[70%]">

                    <p class="container text-[10px] text-center mt-6 md:mx-auto font-dm">Designwaver, a digital design
                        agency, serves clients worldwide. We embrace collaboration, treating clients as creative
                        partners in every project</p>
                </div>
                <div
                    class="mt-6 md:flex md:gap-5 md:w-full 2xl:w-[70%] lg:w-[90%] flex lg:justify-start w-[70%] justify-around mx-auto my-8  lg:gap-5">
                    <a href="https://web.facebook.com/designwaver" target="_blank" class="text-2xl text-white "><i
                            class="fa-brands fa-facebook"></i></a>
                    <a href="https://twitter.com/designwaver" target="_blank" class="text-2xl text-white "><i
                            class="fa-brands fa-twitter"></i></a>

                    <a href="https://www.instagram.com/designwaver/" target="_blank" class="text-2xl text-white "><i
                            class="fa-brands fa-instagram"></i></a>
                    <a href="https://www.linkedin.com/in/designwaver/" target="_blank" class="text-2xl text-white"><i
                            class="fa-brands fa-linkedin"></i></a>
                </div>

            </div>
            <div class="w-full px-6 lg:w-1/4 md:w-1/2">
                <h2 class="mb-3 text-lg font-medium tracking-widest text-white title-font">Other Pages</h2>
                <nav class="mb-10 list-none">
                    <li><i class="fa-solid fa-angle-right text-skyBlue"></i>
                        <a href="{{ route('home') }}" class="font-semibold text-gray-300 text-baseline">Home</a>
                    </li>
                    <li><i class="fa-solid fa-angle-right text-skyBlue"></i>
                        <a href="{{ route('home') }}/#service" class="font-semibold text-gray-300 text-baseline">Our
                            Service</a>
                    </li>
                    <li><i class="fa-solid fa-angle-right text-skyBlue"></i>
                        <a href="{{ URL::to('pages/') . '/about-us' }}"
                            class="font-semibold text-gray-300 text-baseline">About Us</a>
                    </li>
                    <li>
                        <i class="fa-solid fa-angle-right text-skyBlue"></i>
                        <a href="{{ route('user.contact') }}" class="font-semibold text-gray-300 text-baseline">Contact
                            Us</a>
                    </li>
                </nav>
            </div>
            <div class="w-full px-6 lg:w-1/4 md:w-1/2">
                <h2 class="mb-3 text-lg font-medium tracking-widest text-white title-font">Quick Links</h2>
                <nav class="mb-10 list-none">
                    <li><i class="fa-solid fa-angle-right text-skyBlue"></i>
                        <a href="{{ route('term_condition') }}" class="font-semibold text-gray-300 text-baseline">Terms
                            &
                            Condition</a>
                    </li>
                    <li>
                        <i class="fa-solid fa-angle-right text-skyBlue"></i>
                        <a href="{{ route('privacy_policy') }}"
                            class="font-semibold text-gray-300 text-baseline">Privacy Policy</a>
                    </li>
                    <li>
                        <i class="fa-solid fa-angle-right text-skyBlue"></i>
                        <a href="{{ route('refund-policy') }}" class="font-semibold text-gray-300 text-baseline">Refund
                            Policy</a>
                    </li>
                    <li>
                        <i class="fa-solid fa-angle-right text-skyBlue"></i>
                        <a href="{{ route('order_cancel_policy') }}" class="font-semibold text-gray-300 text-baseline">Order Cancelation Policy</a>
                    </li>
                    <li>
                        <i class="fa-solid fa-angle-right text-skyBlue"></i>
                        <a href="{{ URL::to('pages/') . '/faq' }}"
                            class="font-semibold text-gray-300 text-baseline">FAQ</a>
                    </li>

                </nav>
            </div>
            <div class="w-full lg:w-1/4 md:w-1/2">
                <h2 class="mb-3 text-sm font-medium tracking-widest text-gray-100 title-font">SUBSCRIBE</h2>
                <div
                    class="flex flex-wrap items-end justify-center xl:flex-nowrap md:flex-nowrap lg:flex-wrap md:justify-start">
                    <form class="flex" action="{{ route('subscribe') }}" method="POST">
                        @csrf
                        <div class="relative w-40 mr-2 sm:w-auto xl:mr-4 lg:mr-0 sm:mr-4">

                            <input type="text" id="footer-field" name="subscriber_email"
                                class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-white bg-opacity-100 border border-gray-300 rounded outline-none focus:bg-white focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500">
                        </div>
                        <button type="submit"
                            class="inline-flex flex-shrink-0 px-6 py-2 text-white border-0 rounded lg:mt-2 xl:mt-0 bg-skyBlue focus:outline-none hover:bg-orange-400">Button</button>
                    </form>
                </div>
                <p class="mt-2 text-sm text-center text-gray-300 capitalize md:text-left">Get news faster
                    <br class="hidden lg:block">Design Waver.com
                </p>
            </div>
        </div>
    </div>
    <hr class="w-[90%] mx-auto">
    <div class="bg-[#353636]">
        <div class="container px-5 py-6 mx-auto">
            <p class="mt-4 text-sm text-center text-gray-100 sm:ml-6 sm:mt-0">Copyright © 2019-<?php
                $currentYear = date('Y');
                echo $currentYear; // This will display the current year
                ?> Designwaver.com
                reserves
            </p>
        </div>
    </div>
</footer>


