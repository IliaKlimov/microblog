@extends('layouts.base')

@section('title', $user->name)

@section('content')
    @if($user->id === auth()->user()->id)
        <div class=" flex flex-wrap justify-center">
            <div class="sm:w-6/12 md:w-4/12 2xl:w-2/12 w-8/12 pt-6 mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow  rounded-lg ">
                <!-- post form -->
                <form action="{{ route('posts.store') }}" method="POST">
                    @csrf

                    <div class="mb-4 px-4">
                        <label class="uppercase tracking-wide font-semibold text-gray-500 text-lg" for="title">Title</label>
                        <input name="title" type="text" class="bg-gray-100 border-2 w-full p-2 rounded-lg" placeholder="Title" value="">
                    </div>

                    <div class="mb-4 px-4">
                        <label class="uppercase tracking-wide font-semibold text-gray-500 text-lg" for="body">Post</label>
                        <textarea rows="5" name="body" value="" type="text" class="bg-gray-100 border-2 w-full p-2 rounded-lg" placeholder="Post"></textarea>
                    </div>

                    <div class="mb-4 px-4">
                        <input checked="" value="1" name="visible" type="checkbox" class="bg-gray-100 border-2 p-2 rounded-lg">
                        <label class="uppercase tracking-wide font-semibold text-gray-500 text-lg" for="visible">Visible</label>
                    </div>

                    <div class="mt-10">
                        <button class="bg-green-500 text-white px-4 py-3 font-medium w-full hover:bg-green-600 uppercase"
                                type="submit">Save</button>
                    </div>
                </form>
                <!--  -->
            </div>
        </div>
    @endif

    @include('layouts.posts')

@endsection

