<div class="flex justify-between mt-3 px-3">
    <h5 class="tracking-wider text-[#353648] font-semibold">
        Histori akun</h5>
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
