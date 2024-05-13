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

<button id="trigger" data-modal-target="pin" data-modal-toggle="pin" class="hidden"></button>

{{-- Pin Require Modal --}}
<div id="pin" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                data-modal-hide="pin">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Masukan Pin</h3>
                <form class="space-y-6" method="post" action="{{ url('/post/update/paymentwithpin') }}">
                    @csrf
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Pin
                        </label>
                        <input type="password" name="pin"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="••••••••" minlength="6" maxlength="6" required>
                    </div>
                    <button type="submit"
                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Bayar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

