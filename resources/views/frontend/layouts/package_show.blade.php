@extends('layouts.app')
@section('title', 'Order Package')
@section('meta_keywords', 'DesignWavers')
@section('meta_description', 'DesignWavers')
@section('order_package')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <div class="bg-white w-full overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h1 class="text-2xl py-4 px-6">Package Details</h1>
                <div class="relative w-full overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center">
                                        package Name

                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center">
                                        Price
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center">
                                        Package Atrributes
                                    </div>
                                </th>


                            </tr>
                        </thead>
                        <tbody>

                            <tr class="bg-white border-b ">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                    {{ $package->package_name }}
                                </th>
                                <td class="px-6 py-4">
                                    @foreach ($package->order_packages as $data)
                                     {{ $data->package_price}}
                                    @endforeach

                                    {{-- {{ $package->order_packages->main_price }} --}}
                                </td>
                                <td class="px-6 py-4">
                                    <ol class="list-decimal list-inside">
                                        @foreach ($package->attributes as $attribute)
                                            <li>{{ $attribute->attribute_name }}</li>
                                        @endforeach
                                    </ol>
                                </td>


                            </tr>


                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
