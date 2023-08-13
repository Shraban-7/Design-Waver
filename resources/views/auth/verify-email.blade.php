@extends('frontend.layouts.master')
@section('title', 'Verify Email')
@section('meta_keywords', 'DesignWavers')
@section('meta_description', 'DesignWavers')
@section('login')
    <x-guest-layout>
        <div class="min-w-screen min-h-screen flex items-center justify-center px-5 py-5" id="background">

            <div class="bg-white text-gray-500 rounded-3xl shadow-xl w-full overflow-hidden max-w-[1000px]">
                <div class="md:flex w-full">
                    <div class="w-full  py-10 px-5 md:px-10">
                        <div class="text-center mb-10 flex flex-col items-center justify-between">
                            <img class="w-[30%] mb-6" src="{{ asset('front_end/images/Logo v5.png') }}" alt="">
                            <h2 class="capitalize text-sm text-gray-700 font-dm font-semibold">verify your email</h2>
                        </div>
                        <div class="flex justify-center flex-col items-center">
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf

                        <div >
                                <x-primary-button>
                                    {{ __('Resend Verification Email') }}
                                </x-primary-button>
                            </div>
                        </form>

                        <form method="POST" class="mx-4" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit"
                                class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                {{ __('Log Out') }}
                            </button>
                        </form>

                    </div>

                    </div>
                </div>


                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </div>
                @endif


            </div>
    </x-guest-layout>
@endsection
