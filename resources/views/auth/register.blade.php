@extends('layouts.base')

@section('content')
<div class=" flex  justify-center bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">

    <div class="sm:w-6/12 md:w-4/12 2xl:w-2/12 w-8/12 pt-6 mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow  rounded-lg ">
        <!-- register form -->
        <form action="{{ route('register') }}" method="POST">
            @csrf

            <div class="mb-4 px-4">
                <label class="uppercase tracking-wide font-semibold text-gray-500 text-lg" for="name">Name</label>

                <input name="name" type="text"
                       class="bg-gray-100 border-2 w-full p-2 rounded-lg" placeholder="Name" required="required"
                       value="">
            </div>

            <div class="mb-4 px-4">
                <label class="uppercase tracking-wide font-semibold text-gray-500 text-lg" for="email">Email</label>
                <input name="email" type="text"
                       class="bg-gray-100 border-2 w-full p-2 rounded-lg" placeholder="example@mail.com"
                       value="">
                @error('email')
                    <p class="text-red-400 text-sm">{{ $message }}</p> {{--The email field is required.--}}
                @enderror
            </div>

            <div class="mb-4 px-4">
                <label class="uppercase tracking-wide font-semibold text-gray-500 text-lg" for="phone">Phone</label>
                <input name="phone" type="text"
                       class="bg-gray-100 border-2 w-full p-2 rounded-lg @error('phone') border-red-400 @enderror"
                       placeholder="79253002211" value="">
                @error('phone')
                    <p class="text-red-400 text-sm">{{ $message }}</p> {{-- The phone field must be a number.--}}
                @enderror
            </div>

            <div class="mb-4 px-4">
                <label class="uppercase tracking-wide font-semibold text-gray-500 text-lg" for="password">Password</label>

                <input name="password" type="password"
                       class="bg-gray-100 border-2 w-full p-2 rounded-lg @error('password') border-red-400 @enderror"
                       required="required"
                       value="">
                @error('password')
                    <p class="text-red-400 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4 px-4">
                <input name="password_confirmation" type="password" class="bg-gray-100 border-2 w-full p-2 rounded-lg" required="required" value="">

            </div>

            <div class="mt-10">
                <button class="bg-green-500 text-white px-4 py-3 font-medium w-full hover:bg-green-600 uppercase" type="submit">Register</button>
            </div>
        </form>
        <!--  -->
    </div>
</div>
@endsection


