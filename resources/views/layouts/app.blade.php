@extends('frontend.layouts.master')


@section('app')
    <div class="bg-slate-200 block md:flex">
        <div class="lg:h-screen hidden md:block">
            @include('layouts.side_nav')

        </div>
        <div class="md:block p-2 md:p-0 w-full">
            @yield('dashboard')
            @yield('order_customer')
            @yield('order_package')
            @yield('profile')
            @yield('cart')
        </div>
    </div>
@endsection
