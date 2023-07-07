<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment - Murid</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap');
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js"></script>
</head>
<body style="font-family: 'Poppins', sans-serif;" class="bg-gray-100 flex justify-center py-3 px-4">

    {{-- Wrapper --}}
    <div class="w-[315px]">
        {{-- Main Header --}}
        @include('components.murid.main_header')

        {{-- Main Content --}}
        {!! $content !!}

        {{-- Navigation Menu --}}
        @include('components.murid.main_nav')
    </div>
</body>
</html>
