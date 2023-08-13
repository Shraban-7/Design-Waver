@extends('frontend.layouts.master')
@section('title', 'Order')
@section('meta_keywords', 'DesignWavers')
@section('meta_description', 'DesignWavers')
@section('order')
<div class="container">
    <form action="{{ route('order_store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid lg:grid-cols-3 grid-cols-1">
            <div class="row-span-2 gap-3 max-w-7xl sm:px-3 lg:px-4">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="mx-10 lg:gap-3 sm:gap-y-3">
                            <h2 class="mb-6 text-2xl font-bold font-dm">Customer Details</h2>
                            <div class="mb-6">
                                <label for="name" class="block mb-2 font-dm">Customer Name</label>
                                <input type="text"
                                    class="bg-gray-50 border border-1 border-blue-500 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    name="customer_name" id="name" readonly value="{{ Auth::user()->name }}" />
                            </div>
                            <div class="mb-6">
                                <label for="email" class="block mb-2 font-dm">Customer Email</label>
                                <input type="email"
                                    class="ng-gray-50 border w-full border-1 border-blue-500 rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5"
                                    name="customer_email" id="email" readonly value="{{ Auth::user()->email }}" />
                            </div>
                            <div class="mb-6">
                                <label for="phone" class="block mb-2 font-dm">Customer Phone</label>
                                <input type="text" name="customer_phone" id="phone"
                                    class="bg-gray-50 border border-blue-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 block w-full"
                                    value="{{ Auth::user()->phone }}" />
                            </div>


                            <div class="mb-6 capitalize font-dm">
                                If you have any additional requirements, please upload them here. And if you have any questions please <a class="text-blue-500" href="{{ route('user.contact') }}">contact us</a>.
                            </div>

                            <div class="mb-6">

                                <label class="block mb-2 text-sm font-medium text-gray-900 "
                                    for="file_input">Upload file</label>
                                <input
                                    class=""
                                    id="file_input" name="requirement_file" type="file" value=""/>
                                    <span class="mt-4 text-gray-500 text-xs-left">upload here your requirement file zip</span>

                            </div>
                            <div class="mb-6">


                                <label for="message"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">Your
                                    message</label>
                                <textarea id="message" name="requirement_desc" rows="4"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500  "
                                    placeholder="Write your thoughts here..."></textarea>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-2 max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="mx-10 lg:gap-6 sm:gap-y-3">
                            <h2 class="mb-6 text-2xl font-bold font-dm">Order Summary</h2>
                            <div class="relative overflow-x-auto">
                                <table class="w-full text-sm text-left text-gray-500">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">

                                        <tr class="text-center">
                                            <th scope="col" class="px-6 py-3">Service Name</th>
                                            <th scope="col" class="px-6 py-3">Package Name</th>
                                            <th scope="col" class="px-6 py-3">Package Price</th>
                                            <th scope="col" class="px-6 py-3">Quantity</th>
                                            <th scope="col" class="px-6 py-3">Actions</th>

                                        </tr>

                                    </thead>
                                    <tbody>
                                        @php
                                            $total = 0;
                                        @endphp
                                        @foreach ($cart_item as $item)
                                            <tr class="justify-center text-center bg-white border-b">
                                                <td class="px-6 py-3">{{ $item->service_name }}</td>
                                                <input type="text" name="service_id" hidden
                                                    value="{{ $item->service_id }}">
                                                <td class="px-6 py-3">{{ $item->name }}</td>
                                                <input type="text" name="package_id" hidden value="{{ $item->id }}">
                                                <td class="px-6 py-3">
                                                    @if ($item->price == $item->main_price)
                                                        {{ $item->price }}
                                                    @else
                                                        <del>{{ $item->main_price }}</del> {{ $item->price }}
                                                    @endif
                                                </td>

                                                <td class="px-6 py-3">
                                                        <input
                                                        class="w-5 mx  text-md" readonly
                                                        id="current_quantity_{{ $item->id }}"
                                                        name="current_quantity_{{ $item->id }}"
                                                        value="{{ 1 }}" /></td>
                                                <td class="px-6 py-3">
                                                    <a href="{{ route('removeCart', $item->id) }}">Delete</a>

                                                </td>
                                            </tr>
                                            @php

                                                $total = $total + $item->price * 1;
                                            @endphp
                                        @endforeach
                                        <tr id="coupon_tr">
                                            <td colspan="4"></td>
                                        </tr>
                                        <tr id="coupon_dis_tr">
                                            <td colspan="4"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td class="px-6 py-3 font-bold" colspan="2">Total</td>
                                            <td class="px-6 py-3 font-bold"><span
                                                    id="total_price_main">{{ $total }}</span>
                                                <input type="text" hidden name="total_price" id="total_price"
                                                    value="{{ $total }}">
                                                <input type="text" hidden name="total_price_value"
                                                    id="total_price_value" value="{{ $total }}">
                                                <input type="text" hidden name="coupon_code" id="coupon_code_token"
                                                    value="">
                                                <input type="text" hidden name="coupon_type" id="coupon_type"
                                                    value="">
                                                <input type="text" hidden name="coupon_value" id="coupon_value"
                                                    value="">
                                                <input type="text" hidden name="coupon_discount" id="coupon_discount"
                                                    value="">

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-span-2 mt-6">
                <div class="max-w-7xl sm:px-6 lg:px-8">
                    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <div class="p-6  text-gray-900">

                            <h2 class="mb-6 text-2xl font-bold font-dm">Payment option</h2>
                            <div class="container md:flex space-x-3">

                                <label for="coupon_code" class="font-semibold">Apply Coupon</label>
                                <input type="text"  class=" border rounded-lg mt-2 md:-mt-2" id="coupon_code">
                                <button type="button"
                                    class="text-white  bg-blue-700 md:w-[20%]  hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"
                                    onclick="coupon_code_search();">Apply</button>
                            </div>

                            <div class="flex items-baseline justify-between mx-10 my-10">

                                @if ($total != 0)
                                    <button
                                        class="w-full px-5 py-3 text-sm font-medium text-center text-white rounded-lg lg:ml-auto lg:w-full font-dm bg-skyBlue"
                                        type="submit">Checkout</button>
                                @else
                                    <a class="w-full px-5 py-3 text-sm font-medium text-center text-white rounded-lg lg:ml-auto lg:w-full font-dm bg-skyBlue"
                                        href="{{ route('home') }}">Checkout</a>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </form>
</div>


    <Script>
        function decrement(id) {
            var quantity = -1;
            var current_quantity = $('#current_quantity_' + id).val();
            if (current_quantity == 0) {
                return;
            }
            $.get("{{ route('updateCart') }}", {
                'id': id,
                'current_quantity': current_quantity,
                'quantity': quantity
            }, function(result) {
                $(current_quantity).val(result);
            });
        }


        function increment(id) {
            var quantity = 1;
            var current_quantity = $('#current_quantity_' + id).val();
            $.get("{{ route('updateCart') }}", {
                'id': id,
                'current_quantity': current_quantity,
                'quantity': quantity
            }, function(result) {
                $(current_quantity).val(result);
            });
        }



        function coupon_code_search() {
            var coupon_code = $('#coupon_code').val();
            var total_price_value = $('#total_price_value').val();
            $.post("{{ route('coupon_check') }}", {
                'coupon_code': coupon_code,
                '_token': "{{ csrf_token() }}"
            }, function(result) {
                //alert(result);
                if (result.coupon_code) {
                    document.getElementById("coupon_code_token").value = result.coupon_code;
                    document.getElementById("coupon_type").value = result.coupon_type;
                    document.getElementById("coupon_value").value = result.coupon_value;
                    if (result.coupon_type == 'percent') {
                        var discount_amount = total_price_value * result.coupon_value / 100;
                        var total_price = total_price_value - Math.round(discount_amount);
                    } else {
                        var discount_amount = result.coupon_value;
                        var total_price = total_price_value - discount_amount;
                    }
                    document.getElementById("coupon_discount").value = result.discount_amount;
                    document.getElementById("total_price").value = total_price;
                    $('#coupon_tr').html('<td colspan="4">Coupon Code</td><td>' + coupon_code + '</td>');
                    if (result.coupon_type == 'percent') {
                        $('#coupon_dis_tr').html('<td colspan="4">Coupon Discount</td><td>' + Math.round(
                            discount_amount) + '(' + result.coupon_value + '%)</td>');
                    } else {
                        $('#coupon_dis_tr').html('<td colspan="4">Coupon Discount</td><td>' + discount_amount +
                            '</td>');
                    }
                    $('#total_price_main').html('<del>' + total_price_value + '</del> ' + total_price + '');

                } else {
                    $('#coupon_tr').html('<td>' + result.error + '</td>');
                }

            });
        }
    </Script>
@endsection
