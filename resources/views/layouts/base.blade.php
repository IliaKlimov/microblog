<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>MiniBlog - @yield('title')</title>

</head>
<body class="antialiased bg-gray-100">

@include('layouts.nav')

<!-- Page Content -->
<main>
    @section('content')
        Контента нет :(
    @show
</main>
<!--  -->
@include('layouts.footer')
</body>
</html>


