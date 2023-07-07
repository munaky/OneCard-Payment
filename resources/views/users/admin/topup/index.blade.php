<script src="{{ asset('content/kasir/payment/script.js') }}" defer></script>


<div class="w-screen flex space-x-3">
    <img src="{{ asset('assets/profile.png') }}" class="w-10 h-10 rounded-full" alt="">
    <div class="h-max w-max">
        <h5 class="font-semibold text-sm tracking-wide">{{ session()->get('settings')->api->name }}</h5>
        <h5 class="text-gray-600 text-[12px] text-light tracking-wide">SMKN 4 Kota Bogor</h5>
    </div>
</div>
<h5 class="text-gray-600 text-[12px] text-light tracking-wide mt-8">ISI NOMINAL</h5>

<form onsubmit="return false">
    <input type="number" min="1" name="value" id="amount" required>
    <div class="flex w-full items-center justify-center px-7 mt-5">
        <button id="confirm" type="submit"
            class="w-full hover:scale-105 ease-in duration-200 bg-[#353648] py-3 rounded-md text-sm text-center text-white text-lg tracking-wider">
            Konfirmasi</button>
    </div>
</form>

