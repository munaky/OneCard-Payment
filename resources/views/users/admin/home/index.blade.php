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

<body style="font-family: 'Poppins', sans-serif;" class="bg-gray-100 flex justify-center py-3 px-4">
    <div class="w-full h-max">
        <div class="bg-[#353648] w-full h-24 py-20 px-4 rounded-2xl text-gray-200 h-max drop-shadow-lg">
            <h1 class="text-3xl text-center text-white">
                Operator</h1>
        </div>
        <div class="flex justify-between mt-3 px-3">
            <h5 class="tracking-wider text-[#353648] font-semibold">
                Histori akun</h5>
            <a href="" class="text-sm text-[#575872] mt-1 hover:underline">
                Lihat Semua</a>
        </div>

        <div
            class="py-5 px-4 mt-10 mx-3 bg-[#353648] items-center justify-between drop-shadow-sm rounded-md flex hover:mx-0 hover:drop-shadow-md ease-in duration-200">
            <div class="flex space-x-3 items-center">
                <h2 class="text-semibold text-white font-semibold tracking-wider">Top up</h2>
                <a href="{{ url('/admin/topup') }}"
                    class="h-10 w-10 flex items-center justify-center rounded-lg text-xl bg-[#4e546b]">
                    <h6 class="text-semibold text-black font-semibold tracking-wider">+</h6>
                </a>
            </div>
        </div>

        <!-- Ini container postnya -->
        <div class="mt-8 space-y-3 mb-20">

            <!-- Ini Postnya -->
            @foreach ($data as $x)
                <div
                    class="p-3 mx-3 bg-white drop-shadow-sm rounded-md flex hover:mx-0 hover:drop-shadow-md ease-in duration-200">
                    <img src="{{ asset($x->image) }}" class="rounded-xl h-28 aspect-square bg-contain">

                    <div class="space-y-2 ml-5">
                        <h5 class="tracking-wide text-lg">{{ $x->title }}</h5>
                        <h6 class="text-[13px] gray-600 font-light">
                            {{ $x->body }}
                            </p>
                            <h6 class="text-[12px] gray-300 font-light">
                                Rp. {{ $x->price }}
                            </h6>
                    </div>
                </div>
            @endforeach
            <!-- Sampe sini Postnya -->
        </div>
        <!-- Ini akhir container postnya -->


        <div class="bg-gradient-to-t h-20 from-gray-100 to-transparent fixed bottom-0 left-0 right-0"></div>
        <nav class="fixed bottom-2 left-0 right-0 rounded-3xl bg-[#353648] drop-shadow-lg mx-2">
            <div class="flex items-center justify-between px-4 py-2">
                <a href="#" class="ml-5">
                    <img src="../assets/home.png" alt="" class="w-5">
                </a>
                <a href="#" class="">
                    <img src="../assets/stopwatch.png" alt="" class="w-5">
                </a>

                <a href="./scan/scan.html" class="bg-white rounded-full w-12 h-12 flex justify-center items-center">
                    <img src="./assets/scan.png" alt="" class="w-6">
                </a>

                <a href="./profile/profile.html" class="">
                    <img src="../assets/user.png" alt="" class="w-5">
                </a>
                <a href="#" class="mr-5">
                    <img src="../assets/settings.png" alt="" class="w-5 hover:rotate-180 ease-out duration-200">
                </a>

            </div>
        </nav>

    </div>

</body>

</html>
