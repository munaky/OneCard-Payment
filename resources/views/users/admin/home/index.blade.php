<div class="flex justify-between mt-3 px-3">
    <h5 class="tracking-wider text-[#353648] font-semibold">
        Histori akun</h5>
    <a href="{{ url('/admin/history') }}" class="text-sm text-[#575872] mt-1 hover:underline">
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
