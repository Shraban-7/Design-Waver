@section('title', 'Cart Page')
@section('meta_keywords', 'Cart,Cart Page')
@section('meta_description', 'Cart page')
@extends('layouts.app')
@section('cart')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-2 md:mt-6">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                            <tr>
                                <th scope="col" class="px-6 py-3">Service Name</th>
                                <th scope="col" class="px-6 py-3">Package Name</th>
                                <th scope="col" class="px-6 py-3">Package Price</th>
                                <th scope="col" class="px-6 py-3">Quantity</th>
                                <th scope="col" class="px-6 py-3">Actions</th>

                            </tr>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total = 0;
                            @endphp
                            @foreach ($cartItems as $item)
                                <tr class="bg-white border-b justify-center">
                                    <td class="px-6 py-3">{{ $item->service_name }}</td>
                                    <td class="px-6 py-3">{{ $item->name }}</td>
                                    <td class="px-6 py-3">{{ $item->price }}</td>
                                    <td class="px-6 py-3"><button class="mr-4 font-bold text-2xl"
                                            onclick="dcrement({{ $item->id }});">-</button><input class="w-5 mx text-md"
                                            readonly id="current_quantity_{{ $item->id }}"
                                            name="current_quantity_{{ $item->id }}"
                                            value="{{ $item->quantity }}" /><button class="font-bold text-xl"
                                            onclick="increment({{ $item->id }});">+</button></td>
                                    <td class="px-6 py-3">
                                        <a href="{{ route('removeCart', $item->id) }}">Delete</a>

                                    </td>
                                </tr>
                                @php

                                    $total = $total + $item->price * $item->quantity;
                                @endphp
                            @endforeach
                            <tr>
                                <td colspan="2"></td>
                                <td class="px-6 py-3 font-bold" colspan="2">Total</td>
                                <td class="px-6 py-3 font-bold">{{ $total }}</td>
                            </tr>
                            <tr>
                                <td colspan="4"></td>
                                <td>
                                    <a href="{{ route('order') }}"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg">
                                        order now
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <Script>
        function dcrement(id) {
            var quantity = -1;
            var current_quantity = $('#current_quantity_' + id).val();
            $.get("{{ route('updateCart') }}", {
                'id': id,
                'current_quantity': current_quantity,
                'quantity': quantity
            }, function(result) {
                //$('#cartNumber').html(result);
                alert('success');
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
                alert('success');
            });
        }
    </Script>
@endsection
