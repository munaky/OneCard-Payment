<div class="bg-[#353648] w-full h-24 py-3 px-4 rounded-2xl text-gray-200 h-max drop-shadow-lg">
    <h4 class="text-lg font-semibold tracking-wider">
        OneCard</h4>
    <h1 class="text-3xl mt-10 text-center text-white">
        {{ session()->get('user')->name }}</h1>
    <h6 class="text-sm mt-10">
        Rp. {{ session()->get('settings')->balance }}</h6>
</div>
