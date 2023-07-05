<div class="bg-gray-300 mt-5 drop-shadow-md flex w-full h-max p-5 rounded-full items-center justify-between">
    <form method="post" action="{{ url('/post/change/decreaselimit') }}">
        @csrf
        <button type="submit"
            class="w-10 h-10 rounded-full hover:scale-105 ease-in duration-200 bg-red-500 flex items-center justify-center text-white text-2xl">
            <h5 class="font-semibold">-</h5>
        </button>
    </form>

    <h5 class="text-[#353648] text-lg tracking-wider font-bold">Rp. {{ session()->get('settings')->daily_limit }}</h5>

    <form method="post" action="{{ url('/post/change/increaselimit') }}">
        @csrf
        <button type="submit"
            class="w-10 h-10 rounded-full hover:scale-105 ease-in duration-200 bg-green-500 flex items-center justify-center text-white text-2xl">
            <h5 class="font-semibold">+</h5>
        </button>
    </form>
</div>

<div class="flex space-x-3 mt-5 text-sm text-center justify-center">
    <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
        class="w-28 h-28 bg-white items-center justify-center p-5  drop-shadow-md hover:scale-110 ease-in duration-200 rounded-md flex flex-col space-y-3"
        type="button">
        <img src="{{ asset('/assets/pin.png') }}" alt="" class="w-10">
        <h5 class="text-gray-700 tracking-wider">Ubah pin</h5>
    </button>
    <button data-modal-target="authentication-modal" data-modal-toggle="change-password"
        class="w-28 h-28 bg-white items-center justify-center p-5  drop-shadow-md hover:scale-110 ease-in duration-200 rounded-md flex flex-col space-y-3"
        type="button">
        <img src="{{ asset('/assets/pass.png') }}" alt="" class="w-10">
        <h5 class="text-gray-700 tracking-wider">Ubah Password</h5>
    </button>
    <button
        class="w-28 h-28 bg-white items-center justify-center p-5  drop-shadow-md hover:scale-110 ease-in duration-200 rounded-md flex flex-col space-y-3"
        href="pin.html">
        <img src="{{ asset('/assets/blokir.png') }}" alt="" class="w-10">
        <h5 class="text-gray-700 tracking-wider">Blokir Kartu</h5>
    </button>
</div>
<div class="flex space-x-3 mt-5 text-sm text-center justify-center">
    <a class="w-28 h-28 bg-white items-center justify-center p-5  drop-shadow-md hover:scale-110 ease-in duration-200 rounded-md flex flex-col space-y-3"
        href="pin.html">
        <img src="{{ asset('assets/pinjaman.png') }}" alt="" class="w-10">
        <h5 class="text-gray-700 tracking-wider">Cek Peminjaman</h5>
    </a>
    <a class="w-28 h-28 bg-white items-center justify-center p-5  drop-shadow-md hover:scale-110 ease-in duration-200 rounded-md flex flex-col space-y-3"
        href="pin.html">
        <img src="{{ asset('assets/absensi.png') }}" alt="" class="w-10">
        <h5 class="text-gray-700 tracking-wider">Cek Absensi</h5>
    </a>
    <a class="w-28 h-28 bg-white items-center justify-center p-5  drop-shadow-md hover:scale-110 ease-in duration-200 rounded-md flex flex-col space-y-3"
        href="pin.html">
        <img src="{{ asset('assets/more.png') }}" alt="" class="w-10">
        <h5 class="text-gray-700 tracking-wider">More</h5>
    </a>
</div>
<!-- Main modal -->
<div id="change-password" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                data-modal-hide="change-password">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Ganti Kata Sandi</h3>
                <form class="space-y-6" method="post" action="{{ url('/post/change/password') }}">
                    @csrf
                    <div>
                        <label for="password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password
                            Sekarang</label>
                        <input type="password" name="old_pass" id="old_pass"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="••••••••" required>
                    </div>
                    <div>
                        <label for="password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password Baru</label>
                        <input type="password" name="new_pass" id="new_pass" placeholder="••••••••"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                    </div>
                    <div>
                        <label for="password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Masukan Ulang</label>
                        <input type="password" name="ver_pass" id="ver_pass" placeholder="••••••••"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                    </div>
                    <button type="submit"
                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan
                        Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>
