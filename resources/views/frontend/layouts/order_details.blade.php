@extends('layouts.app')
@section('title', 'Order Details')
@section('meta_keywords', 'DesignWavers')
@section('meta_description', 'DesignWavers')

@section('order_customer')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12 w-full">
        <div class="bg-white w-full overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h1 class="text-2xl py-4 px-6">Order Details</h1>
                <div class="relative  overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    service Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center">
                                        package Name

                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center">
                                        quantity

                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center">
                                        Package Price
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center">
                                        Total Price
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center">
                                        Order Date
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center">
                                        Order Dateline
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center">
                                        Order Package Details
                                    </div>
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order_packages as $data)
                                <tr class="bg-white border-b ">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        {{ $data->services->service_name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $data->packages->package_name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $data->package_quantity }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @if ($data->package_price == $data->main_price)
                                            {{ $data->package_price }}
                                        @else
                                            <del>{{ $data->main_price }}</del> {{ $data->package_price }}
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $data->package_price * $data->package_quantity }}
                                    </td>
                                    @php
                                        $start_date = \Carbon\Carbon::parse($data->created_at);
                                    @endphp
                                    <td class="px-6 py-4">
                                        {{ $start_date->format('d F Y') }}
                                    </td>
                                    @php
                                            $start_date = \Carbon\Carbon::parse($data->created_at);
                                            $deliveryTimeInDays = $data->packages->delivery_time;
                                            $expire_date =
                                            $start_date->copy()->addDays($deliveryTimeInDays);

                                            $remaining = $expire_date->diff(\Carbon\Carbon::now());
                                            $daysLeft = $remaining->d;
                                            $hoursLeft = $remaining->h;

                                            $current_date = \Carbon\Carbon::now();
                                            @endphp

                                            <td class="px-6 py-4">
                                                @if ($expire_date <= $current_date) <span>
                                                    Order Delivery Time expired
                                                    </span>
                                                    @else
                                                    <span>
                                                        @if ($daysLeft > 0)
                                                        {{ $daysLeft }} day{{ $daysLeft > 1 ? 's' :
                                                        '' }}
                                                        @endif

                                                        @if ($hoursLeft > 0)
                                                        {{ $hoursLeft }} hour{{ $hoursLeft > 1 ? 's'
                                                        : '' }}
                                                        @endif

                                                        left
                                                    </span>
                                                    @endif
                                            </td>
                                    
                                    <td class="px-6 py-4">
                                        <a href="{{ route('package_details', $data->package_id) }}"
                                            class="text-blue-600 hover:underline">View</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
