@extends('frontend.layouts.master')
@section('title', 'Forgot Password')
@section('meta_keywords', 'DesignWavers')
@section('meta_description', 'DesignWavers')
@section('login')
<x-guest-layout>
    <div class="min-w-screen min-h-screen flex items-center justify-center px-5 py-5" id="background">
        <div class="bg-white text-gray-500 rounded-3xl shadow-xl w-full overflow-hidden max-w-[1000px]">
            <div class="md:flex w-full">
                <div class="w-full md:w-1/2 py-10 px-5 md:px-10">
                    <div class="text-center mb-6 flex flex-col items-center justify-between">
                        <img class="w-[30%] mb-6" src="{{ asset('front_end/images/Logo v5.png') }}" alt="">
                        <p class="mb-4 text-sm text-gray-700">
                            {{ __('Forgot your password? No problem.') }}
                        </p>
                        <p class="mb-4 text-sm text-gray-700">
                            {{ __('Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                        </p>
                    </div>
                    <x-auth-session-status class="mb-4" :status="session('status')" />
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="flex -mx-3">
                            <div class="w-full px-3 mb-5">
                                <x-input-label for="email" :value="__('Email')" />
                                <div class="flex">

                                    <x-text-input id="email" class="block mt-1 w-full border-2 border-blue-400" type="email" name="email"
                                        :value="old('email')" required autofocus />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                            </div>
                        </div>
                        <div class="flex -mx-3">
                            <div class="w-full px-3 mb-8">
                                <button
                                    class="block w-full max-w-xs mx-auto bg-blue-500 hover:bg-blue-700 focus:bg-blue-700 text-white rounded-lg px-3 py-3 font-semibold"
                                    type="submit">
                                    {{ __('Email Password Reset Link') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="hidden md:block  w-1/2 bg-[#57b5d9] py-10 px-10 lg:flex lg:items-center lg:justify-center">

                    <div class="text-white">
                        <h1 class="text-3xl font-space font-bold capitalize">
                            Join our Design Waver
                        </h1>
                        <h1 class="text-3xl font-space font-bold capitalize mb-4">
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
    </ </x-guest-layout>

    @endsection
