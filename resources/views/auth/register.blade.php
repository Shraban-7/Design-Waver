@extends('frontend.layouts.master')
@section('title', 'Design Waver Register')
@section('meta_keywords', 'DesignWavers')
@section('meta_description', 'DesignWavers')
@section('register')
<x-guest-layout>
    <div class="min-w-screen min-h-screen flex items-center justify-center px-5 py-5" id="background">
        <div class="bg-white text-gray-500 rounded-3xl shadow-xl w-full overflow-hidden max-w-[1000px]">
            <div class="md:flex w-full">
                <div class="w-full md:w-1/2 py-10 px-5 md:px-10">
                    <div class="text-start mb-10">
                        <h1 class="font-bold text-3xl text-gray-900 mb-2">Create An Account</h1>
                        <p class="capitalize text-xs">create a great platform for managing your cases and client</p>
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="flex -mx-3">
                            <div class="w-full px-3 mb-5">
                                <label for="name" class="text-xs font-semibold px-1">Full name</label>
                                <div class="flex">
                                    <div
                                        class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                        <i class="mdi mdi-account-outline text-gray-400 text-lg"></i>
                                    </div>
                                    <x-text-input id="name"
                                        class="block mt-1 w-full -ml-10 pl-10 pr-3 py-2 border-2 border-blue-400"
                                        type="text" name="name" :value="old('name')" required autofocus
                                        autocomplete="name" />
                                </div>
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                        </div>
                        <div class="flex -mx-3">
                            <div class="w-1/2 px-3 mb-5">
                                <label for="email" class="text-xs font-semibold px-1">Email</label>
                                <div class="flex">
                                    <div
                                        class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                        <i class="mdi mdi-email-outline text-gray-400 text-lg"></i>
                                    </div>
                                    <x-text-input id="email"
                                        class="block mt-1 w-full -ml-10 pl-10 pr-3 py-2 border-2 border-blue-400"
                                        type="email" name="email" :value="old('email')" required
                                        autocomplete="username" />
                                </div>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            <div class="w-1/2 px-3 mb-5">
                                <label for="phone" class="text-xs font-semibold px-1">Phone Number</label>
                                <div class="flex">
                                    <div
                                        class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                        <i class="mdi mdi-phone-outline text-gray-400 text-lg"></i>
                                    </div>
                                    <x-text-input id="phone"
                                        class="block mt-1 w-full -ml-10 pl-10 pr-3 py-2 border-2 border-blue-400"
                                        type="text" name="phone" :value="old('phone')" required autocomplete="phone" />
                                </div>
                                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                            </div>
                        </div>

                        <div class="flex -mx-3">
                            <div class="w-1/2 px-3 mb-12">
                                <label for="password" class="text-xs font-semibold px-1">Password</label>
                                <div class="flex">
                                    <div
                                        class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                        <i class="mdi mdi-lock-outline text-gray-400 text-lg"></i>
                                    </div>
                                    <x-text-input id="password"
                                        class="block mt-1 w-full -ml-10 pl-10 pr-3 py-2 border-2 border-blue-400"
                                        type="password" name="password" required autocomplete="new-password" />

                                </div>
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                            <div class="w-1/2 px-3 mb-12">
                                <label for="password_confirmation" class="text-xs font-semibold px-1">Confirm
                                    Password</label>
                                <div class="flex">
                                    <div
                                        class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                        <i class="mdi mdi-lock-outline text-gray-400 text-lg"></i>
                                    </div>
                                    <x-text-input id="password_confirmation"
                                        class="block mt-1 w-full -ml-10 pl-10 pr-3 py-2 border-2 border-blue-400"
                                        type="password" name="password_confirmation" required
                                        autocomplete="new-password" />

                                </div>
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>
                        </div>

                        <div class="flex -mx-3">
                            <div class="w-full px-3 mb-5">
                                <button
                                    class="block w-full max-w-xs mx-auto bg-blue-500 hover:bg-blue-700 focus:bg-blue-700 text-white rounded-lg px-3 py-3 font-semibold"
                                    type="submit">
                                    SIGN UP
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="hidden md:block  w-1/2 bg-[#f1f9fa] py-10 px-10">
                    <div class="flex flex-col  justify-between gap-8">
                        <div class="flex items-center justify-start">
                            <div class="font-bold text-sm  text-gray-900">Already a member?</div>
                            <div class="px-4">
                                <a href="{{ route('login') }}"
                                    class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border-2 border-blue-500 hover:border-transparent rounded">Login</a>
                            </div>
                        </div>
                        <div>
                            <img src="{{ asset('front_end/images/Sign page illustration.png') }}" alt="pic" />
                        </div>
                        <div>
                            <h1 class="capitalize font-semibold text-3xl text-gray-900">get high quality service and
                                grow your business</h1>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</x-guest-layout>

@endsection
