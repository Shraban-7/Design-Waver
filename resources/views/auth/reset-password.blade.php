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

                    </div>
                    <x-auth-session-status class="mb-4" :status="session('status')" />
                    <form method="POST" action="{{ route('password.store') }}">
                        @csrf

                        <!-- Password Reset Token -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <!-- Email Address -->
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email', $request->email)" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Password')" />
                            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                                required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4 mb-4">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                name="password_confirmation" required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="flex -mx-3">
                            <div class="w-full px-3 mb-8">
                                <button
                                    class="block w-full max-w-xs mx-auto bg-blue-500 hover:bg-blue-700 focus:bg-blue-700 text-white rounded-lg px-3 py-3 font-semibold"
                                    type="submit">
                                    {{ __('Reset Password') }}
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
</x-guest-layout>
@endsection
