@extends('frontend.layouts.master')
@section('title', 'Design Waver Login')
@section('meta_keywords', 'DesignWavers')
@section('meta_description', 'DesignWavers')
@section('login')
<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="flex items-center justify-center min-h-screen px-5 py-5 min-w-screen" id="background">
        <div class="bg-white text-gray-500 rounded-3xl shadow-xl w-full overflow-hidden max-w-[1000px]">
            <div class="w-full md:flex">
                <div class="w-full px-5 py-10 md:w-1/2 md:px-10">
                    <div class="flex flex-col items-center justify-between mb-10 text-center">
                        <img class="mb-6 w-[40%]" src="{{ asset('front_end/images/Logo v5.png') }}" alt="Design Waver logo">
                        <h2 class="text-sm font-semibold text-gray-700 capitalize font-dm">sign in to dashboard</h2>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="flex -mx-3">
                            <div class="w-full px-3 mb-5">
                                <x-input-label for="login" :value="__('Enter Your Email or Phone Number')" />
                                <div class="flex">

                                    <x-text-input id="login" class="block w-full mt-1 border-2 border-blue-400" type="text" name="login"
                                        :value="old('login')" required autofocus autocomplete="username" />
                                    </div>
                                    <x-input-error :messages="$errors->get('login')" class="mt-2" />
                            </div>
                        </div>


                        <div class="flex -mx-3">
                            <div class="w-full px-3 mb-12">
                                <x-input-label for="password" :value="__('Enter Password')" />
                                <div class="flex">

                                    <x-text-input id="password" class="block w-full mt-1 border-2 border-blue-400" type="password"
                                        name="password" required autocomplete="current-password" />

                                    </div>
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                        </div>

                        <div class="flex items-center justify-between mb-4">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox"
                                    class="text-indigo-600 border-gray-300 rounded shadow-sm focus:ring-indigo-500"
                                    name="remember">
                                <span
                                    class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                            </label>

                            @if (Route::has('password.request'))
                                <a class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                    href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                        </div>

                        <div class="flex -mx-3">
                            <div class="w-full px-3 mb-8">
                                <button
                                    class="block w-full max-w-xs px-3 py-3 mx-auto font-semibold text-white bg-blue-500 rounded-lg hover:bg-blue-700 focus:bg-blue-700"
                                    type="submit">
                                    SIGN IN
                                </button>
                            </div>
                        </div>
                        <div class="flex -mx-3">
                            <div class="w-full px-3 mb-5 text-center capitalize">
                                dont have an account? <a href="{{ route('register') }}"
                                    class="font-semibold text-blue-500 hover:text-blue-700">Sign up</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="hidden md:block  w-1/2 bg-[#57b5d9] py-10 px-10 lg:flex lg:items-center lg:justify-center">

                        <div class="text-white">
                            <h1 class="text-3xl font-bold capitalize font-space">
                                Join our Design Waver
                            </h1>
                            <h1 class="mb-4 text-3xl font-bold capitalize font-space">
                                community
                            </h1>
                            <p class="text-xs font-dm">
                                to colaborate our creative designer and enjoy our services
                            </p>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
@endsection
