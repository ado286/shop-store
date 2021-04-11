<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name')}} - @yield('title')</title>
    <meta name="description" content="Free open source Tailwind CSS Store template">
    <meta name="keywords" content="tailwind,tailwindcss,tailwind css,css,starter template,free template,store template, shop layout, minimal, monochrome, minimalistic, theme, nordic">

    <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <!--Replace with your tailwind.css once created-->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:200,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ mix('css/index.css') }}">
    @livewireStyles


    <script src="{{ mix('js/app.js') }}" defer></script>

</head>

<body class="bg-white text-gray-600 work-sans leading-normal text-base tracking-normal">

    @include('includes.nav_bar')

    @yield('content')

    @include('includes.footer')

</body>

</html>
