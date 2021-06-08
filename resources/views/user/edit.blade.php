@extends('layouts.base')

@section('title', $user->name)

@section('content')
<div class=" flex flex-wrap justify-center">

    @if ($message = Session::get('success'))
        <div class="w-full text-center text-xl text-green-500">
            {{ $message }}
        </div>
    @endif
    @if(!$user->hasVerifiedEmail())
            <a class="underline text-green-600 hover:text-black" href="{{ route('verification.show') }}">
                Please verify your email.
            </a>
    @endif
    <!-- edit profile -->
    <div class="w-full">
        <a href="{{ route('user.show', $user) }}">
            @if($user->avatar)
                <img class="rounded-full mx-auto object-cover w-32 h-32" alt=""
                     src="{{ asset('/storage').'/'.$user->avatar  }}" >
            @else
                <img class="rounded-full mx-auto object-cover w-32 h-32" alt=""
                     src="{{ asset('/storage/default/avatar.png') }}" >
            @endif
        </a>
    </div>
    <div class="sm:w-6/12 md:w-4/12 2xl:w-2/12 w-8/12 pt-6 mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow  rounded-lg ">
        <form action="{{ route('user.update', $user) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')

            <div class="mb-4 px-4">
                <label class="uppercase tracking-wide font-semibold text-gray-500 text-lg" for="name">Name</label>
                <input name="name" type="text" class="bg-gray-100 border-2 w-full p-2 rounded-lg" placeholder="Name" value="{{ old('name', $user->name) }}">
            </div>

            <div class="mb-4 px-4">
                <label class="uppercase tracking-wide font-semibold text-gray-500 text-lg" for="avatar">Photo</label>
                <input name="avatar" type="file" class="bg-gray-100 border-2 w-full p-2 rounded-lg"
                       placeholder="Title" value="">
            </div>
            
            <div class="mt-10">
                <button class="bg-green-500 text-white px-4 py-3 font-medium w-full hover:bg-green-600 uppercase" type="submit">Save</button>
            </div>
        </form>
    </div>
    <!--  -->
</div>
@endsection