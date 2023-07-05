<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OneApp</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap');
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body style="font-family: 'Poppins', sans-serif;" class="bg-gray-100 flex flex-col justify-center px-5 py-8">
    <div class="w-screen flex space-x-3">
        <img src="{{ asset('assets/profile.png') }}" class="w-10 h-10 rounded-full" alt="">
        <div class="h-max w-max">
            <h5 class="font-semibold text-sm tracking-wide">{{ session()->get('settings')->api->name }}</h5>
            <h5 class="text-gray-600 text-[12px] text-light tracking-wide">SMKN 4 Kota Bogor</h5>
        </div>
    </div>
    <h5 class="text-gray-600 text-[12px] text-light tracking-wide mt-8">ISI NOMINAL</h5>

    <form action="{{ url('/api/set/value') }}" method="post">
        @csrf
        <input type="number" min="1" name="value">
        <div class="flex w-full items-center justify-center px-7 mt-5">
            <button type="submit" class="w-full hover:scale-105 ease-in duration-200 bg-[#353648] py-3 rounded-md text-sm text-center text-white text-lg tracking-wider">Konfirmasi</a>
        </div>
    </form>

    </div>
</body>
</html>
