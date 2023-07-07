<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Payment - Murid</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap');
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js" defer></script>

    <link rel="stylesheet" href="{{ url('/general/style.css') }}">

    <script src="{{ url('/general/Cookie.js') }}" defer></script>
    <script src="{{ url('/general/global.js') }}" defer></script>
    <script src="{{ url('/general/fetch.js') }}" defer></script>

</head>
<body style="font-family: 'Poppins', sans-serif;" class="bg-gray-100 flex justify-center py-3 px-4">

    {{-- Wrapper --}}
    <div class="w-[315px]">
        {{-- Main Header --}}
        @include('components.admin.main_header')

        {{-- Main Content --}}
        {!! $content !!}

        {{-- Navigation Menu --}}
        @include('components.admin.main_nav')
    </div>
</body>
</html>
