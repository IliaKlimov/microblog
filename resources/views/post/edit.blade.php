@extends('layouts.base')

@section('title', 'posts')

@section('content')
    <div class=" flex flex-wrap justify-center items-center flex-col">

        @if ($message = Session::get('success'))
            <div class="w-full text-center text-xl text-green-500">
                {{ $message }}
            </div>
        @endif

        <div class="sm:w-6/12 md:w-4/12 2xl:w-2/12 w-8/12 my-8 bg-white dark:bg-gray-800 overflow-hidden shadow  rounded-lg">
            <!-- profile -->
            <div class="w-full bg-green-100 mb-6 px-4 py-2">
                <div class="flex justify-between text-sm">
                    <div>
                        <a href="{{ route('user.show', $post->author_id) }}">
                            @if($post->author->avatar)
                                <img class="rounded-full mx-auto object-cover w-10 h-10" alt=""
                                     src="{{ asset('/storage/users').'/'.$post->author->avatar  }}">
                            @else
                                <img class="rounded-full mx-auto object-cover w-10 h-10" alt=""
                                     src="{{ asset('/storage/default/avatar.png') }}">
                            @endif

                        </a>
                        <a href="{{ route('user.show', $post->author_id) }}"
                           class="text-green-600 underline hover:text-black">
                            {{ $post->author->name }}
                        </a>
                    </div>
                    <div class="text-gray-500">{{$post->created_at->format('j F Y')}}</div>
                </div>
            </div>
            <!-- register form -->
            <form action="{{ route('posts.update', $post) }}" method="POST">
                @csrf
                @method('patch')

                <div class="mb-4 px-4">
                    <label class="uppercase tracking-wide font-semibold text-gray-500 text-lg" for="title">Title</label>
                    <input name="title" type="text" class="bg-gray-100 border-2 w-full p-2 rounded-lg"
                           placeholder="Title" value="{{ old('title', $post->title) }}">
                </div>

                <div class="mb-4 px-4">
                    <label class="uppercase tracking-wide font-semibold text-gray-500 text-lg" for="body">Post</label>
                    <textarea rows="5" name="body" type="text"
                              class="bg-gray-100 border-2 w-full p-2 rounded-lg" placeholder="Post">
                        {{ old('body', $post->body) }}
                    </textarea>
                </div>

                <div class="mb-4 px-4 flex justify-between">
                    <div>

                        <input value="1" name="visible" type="checkbox" class="bg-gray-100 border-2 p-2 rounded-lg">

                        <label class="uppercase tracking-wide font-semibold text-gray-500 text-lg"
                               for="visible">Visible</label>

                    </div>
                    <div>

                    </div>
                </div>

                <div class="mt-10">
                    <button class="bg-green-500 text-white px-4 py-3 font-medium w-full hover:bg-green-600 uppercase"
                            type="submit">Save
                    </button>
                </div>
            </form>
            <!--  -->

        </div>
        <div class=" w-full text-center">
            <form action="{{ route('posts.destroy', $post)}}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="hover:underline uppercase">delete</button>
            </form>
        </div>

    </div>
@endsection