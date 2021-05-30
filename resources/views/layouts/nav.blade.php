<!-- Page Heading -->
<header>
    <div class=" flex  justify-center bg-white dark:bg-gray-900 sm:items-center sm:pt-0 mb-6">
        <div class="w-9/12 flex justify-between">
            <div class="flex justify-center  items-center  uppercase tracking-wide font-semibold text-gray-500 text-lg"><a href="/">miniBLOGS</a></div>


            <div class="flex items-center">
                @guest
                    <a href="{{ route('login') }}"
                       class="text-sm text-green-600 hover:text-black">Log in</a>

                    <a href="{{ route('register') }}"
                       class="ml-4 text-sm text-green-600 hover:text-black">Register</a>
                @else
                    <div>
                        <a href="{{ route('user.show', auth()->user()->id) }}" class="bg-gray-500 text-white px-4 py-3 font-medium w-full hover:bg-gray-600 block">
                            {{ auth()->user()->name }}</a>

                    </div>
                    <div>
                        <a href="{{ route('user.edit', auth()->user()->id),  }}" class="bg-green-600 text-white px-4 py-3 font-medium w-full hover:bg-green-500 block">
                            Settings</a>
                    </div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="bg-green-500 text-white px-4 py-3 font-medium w-full hover:bg-green-600" type="submit">LogOut</button>
                    </form>
                @endguest
            </div>


        </div>
    </div>
</header>


