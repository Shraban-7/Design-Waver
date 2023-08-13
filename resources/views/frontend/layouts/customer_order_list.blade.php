@extends('layouts.app')
@section('title', 'My Orders')
@section('meta_keywords', 'DesignWavers')
@section('meta_description', 'DesignWavers')
<style>
    #dataTable_paginate {
        padding: 20px;
    }

    #dataTable_filter {
        padding: 20px;
    }
</style>

@section('order_customer')
<div class="p-3">

    @if ($message = Session::get('success'))
    <div id="alert-3" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50" role="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
            viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Info</span>
        <div class="ml-3 text-sm font-medium">
            {{ $message }}
        </div>
        <button type="button"
            class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8   "
            data-dismiss-target="#alert-3" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
    @endif
</div>
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 p-6">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
            <h1 class="text-2xl py-4 px-6">Your Order List</h1>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 p-6" id="dataTable">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Email

                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Phone

                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Total Price
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Order Status
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Order Date
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Order Detals
                                </div>
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $data )
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                {{ $data->customer_name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $data->customer_email }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $data->customer_phone }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $data->total_price }}
                            </td>
                            <td class="px-6 py-4">
                                @if ($data->work_status == 'completed')
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    {{ $data->work_status }}
                                </span>

                                @elseif ($data->work_status == 'pending')
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    {{ $data->work_status }}
                                </span>
                                @elseif ($data->work_status == 'processing')
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                    {{ $data->work_status }}
                                </span>
                                @elseif ($data->work_status == 'decline')
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                    {{ $data->work_status }}
                                </span>

                                @endif
                                {{-- {{ $data->status }} --}}
                            </td>
                            @php
                            $start_date = \Carbon\Carbon::parse($data->created_at);
                            @endphp
                            <td class="px-6 py-4">
                                {{ $start_date->format('d F Y') }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('order_details',$data->id) }}"
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

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.css" />

<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>
<script>
    let table = new DataTable('#dataTable', {
        "order": [[ 0, "desc" ]],
                    "pageLength": 10,
                    "bLengthChange": false,
                    "bFilter": true,
                    "bInfo": false,
                    "bAutoWidth": false,
                    "language": {
                        "paginate": {
                            "previous": "<<<",
                            "next": ">>>"
                        }
                    },
                    "columnDefs": [
                        { "orderable": false, "targets": 6 }
                    ],
                    "aoColumns": [ null, null, null, null, null, null,{ "bSortable": false } ],
                    "pagingType": "full_numbers",
                    "oLanguage": {
                        "sEmptyTable": "No data available"
                    },
});
</script>
@endsection
