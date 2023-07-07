<div class="bg-gradient-to-t h-20 from-gray-100 to-transparent fixed bottom-0 left-0 right-0"></div>
<nav class="w-[315px] fixed bottom-2 rounded-3xl bg-[#353648] drop-shadow-lg mx-2">
    <div class="flex items-center justify-between px-4 py-2">
        <a href="{{ url('/kasir/home') }}" class="ml-5">
            <img src="{{ asset('assets/home.png') }}" alt="" class="w-5">
        </a>
        <a href="{{ url('/kasir/history') }}" class="">
            <img src="{{ asset('assets/stopwatch.png') }}" alt="" class="w-5">
        </a>

        <a href="{{ url('/kasir/history') }}" class="bg-white rounded-full w-12 h-12 flex justify-center items-center">
            <img src="{{ asset('assets/scan.png') }}" alt="" class="w-6">
        </a>

        <a href="{{ url('/kasir/profile') }}" class="">
            <img src="{{ asset('assets/user.png') }}" alt="" class="w-5">
        </a>
        <a href="{{ url('/kasir/settings') }}" class="mr-5">
            <img src="{{ asset('assets/settings.png') }}" alt="" class="w-5 hover:rotate-180 ease-out duration-200">
        </a>

    </div>
</nav>
