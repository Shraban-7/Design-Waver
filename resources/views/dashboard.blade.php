@extends('layouts.app')
@section('dashboard')
<div class="w-full mx-auto sm:px-6 lg:px-8 py-12">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

        <!-- Main Content Area -->
        <div class="flex-1 p-8">
            <h2 class="text-3xl font-semibold mb-4">Welcome, {{ Auth::user()->name }}</h2>
            <div class="bg-white rounded-lg shadow p-4">
                <!-- Your content goes here -->
                @if ($orders)
                    <p>your total orders {{ $orders->count() }}</p>
                    <p>for your information go to <a class="text-indigo-700" href="{{ route('customer_order_list') }}">your order <i class="fas fa-long-arrow-alt-right"></i></a></p>
                @endif
                <p></p>
            </div>
        </div>
    </div>
</div>


@endsection



