@extends('layouts.base')

@section('content')
    <div class=" flex  justify-center bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        <div class="sm:w-6/12 md:w-4/12 2xl:w-2/12 w-8/12 pt-6 mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow  rounded-lg ">
            <!-- register form -->
            <div class="p-10 text-xl flex justify-center">
                <div>Please verify your email.</div>
            </div>

            <form action="{{ route('verification.send') }}" method="POST">
                @csrf
                <button class="bg-green-500 text-white px-4 py-3 font-medium w-full hover:bg-green-600">Send Again</button>
            </form>
        </div>
    </div>
@endsection