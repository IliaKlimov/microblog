@foreach ($posts as $post)
    <div class="flex justify-center">
        <div class="sm:w-6/12 md:w-4/12 2xl:w-2/12 w-8/12  mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg ">
            <div class="w-full bg-green-100 p-2">
                <div class="flex justify-between text-sm">
                    <div>
                        <a href="{{ route('user.show', $post->author_id) }}" >
                            @if($post->author->avatar)
                                <img class="rounded-full mx-auto object-cover w-10 h-10" alt=""
                                     src="{{ asset('/storage/').'/'.$post->author->avatar  }}" >
                            @else
                                <img class="rounded-full mx-auto object-cover w-10 h-10" alt=""
                                     src="{{ asset('/storage/default/avatar.png') }}" >
                            @endif

                        </a>
                        <a href="{{ route('user.show', $post->author) }}" class="text-green-600 underline hover:text-black">
                            {{ $post->author->name }}
                        </a>
                    </div>
                    <div class="text-gray-500">{{ $post->created_at->format('j F Y') }}</div>
                </div>
            </div>
            <p class="font-medium p-4">{{ $post->title }}</p>
            <p class="p-4">{{ $post->body }}</p>
            <div class="w-full bg-gray-200 p-2">
                <div class="flex justify-between text-sm">
                    <div class="uppercase">
                        @if($post->private) private @endif
                    </div>
                    @can('update', $post)
                        <div class="w-3/12 flex items-center justify-between">
                            <div>
                                <a href="{{ route('posts.edit', $post->id) }}" class="hover:underline ">edit</a>
                            </div>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="hover:underline ">delete</button>
                            </form>
                        </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endforeach