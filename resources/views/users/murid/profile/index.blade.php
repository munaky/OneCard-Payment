<div class="bg-gray-300 mt-5 drop-shadow-md flex w-full h-max p-5 rounded-full items-center justify-between">
    <form method="post" action="{{ url('/post/update/dailylimit') }}">
        @csrf
        <input type="hidden" name="method" value="decrease">
        <button type="submit"
            class="w-10 h-10 rounded-full hover:scale-105 ease-in duration-200 bg-red-500 flex items-center justify-center text-white text-2xl">
            <h5 class="font-semibold">-</h5>
        </button>
    </form>

    <h5 class="text-[#353648] text-lg tracking-wider font-bold">Rp. {{ session()->get('settings')->daily_limit }}</h5>

    <form method="post" action="{{ url('/post/update/dailylimit') }}">
        @csrf
        <input type="hidden" name="method" value="increase">
        <button type="submit"
            class="w-10 h-10 rounded-full hover:scale-105 ease-in duration-200 bg-green-500 flex items-center justify-center text-white text-2xl">
            <h5 class="font-semibold">+</h5>
        </button>
    </form>
</div>

<div class="flex space-x-3 mt-5 text-sm text-center justify-center">
    <button data-modal-target="change-pin" data-modal-toggle="change-pin"
        class="w-28 h-28 bg-white items-center justify-center p-5  drop-shadow-md hover:scale-110 ease-in duration-200 rounded-md flex flex-col space-y-3"
        type="button">
        <img src="{{ asset('/assets/pin.png') }}" alt="" class="w-10">
        <h5 class="text-gray-700 tracking-wider">Ubah pin</h5>
    </button>
    <button data-modal-target="change-password" data-modal-toggle="change-password"
        class="w-28 h-28 bg-white items-center justify-center p-5  drop-shadow-md hover:scale-110 ease-in duration-200 rounded-md flex flex-col space-y-3"
        type="button">
        <img src="{{ asset('/assets/pass.png') }}" alt="" class="w-10">
        <h5 class="text-gray-700 tracking-wider">Ubah Password</h5>
    </button>
    @if (session()->get('settings')->disable)
        <button data-modal-target="unblock" data-modal-toggle="unblock"
            class="w-28 h-28 bg-white items-center justify-center p-5  drop-shadow-md hover:scale-110 ease-in duration-200 rounded-md flex flex-col space-y-3"
            href="pin.html">
            <img src="{{ asset('/assets/blokir.png') }}" alt="" class="w-10">
            <h5 class="text-gray-700 tracking-wider">Buka Kartu</h5>
        </button>
    @else
        <button data-modal-target="block" data-modal-toggle="block"
            class="w-28 h-28 bg-white items-center justify-center p-5  drop-shadow-md hover:scale-110 ease-in duration-200 rounded-md flex flex-col space-y-3"
            href="pin.html">
            <img src="{{ asset('/assets/blokir.png') }}" alt="" class="w-10">
            <h5 class="text-gray-700 tracking-wider">Blokir Kartu</h5>
        </button>
    @endif
</div>
<div class="flex space-x-3 mt-5 text-sm text-center justify-center">
    <a class="w-28 h-28 bg-white items-center justify-center p-5  drop-shadow-md hover:scale-110 ease-in duration-200 rounded-md flex flex-col space-y-3"
        href="pin.html">
        <img src="{{ asset('assets/pinjaman.png') }}" alt="" class="w-10">
        <h5 class="text-gray-700 tracking-wider">Any</h5>
    </a>
    <a class="w-28 h-28 bg-white items-center justify-center p-5  drop-shadow-md hover:scale-110 ease-in duration-200 rounded-md flex flex-col space-y-3"
        href="{{ url('/auth/logout') }}">
        <img src="{{ asset('assets/logout.png') }}" alt="" class="w-10">
        <h5 class="text-gray-700 tracking-wider">Logout</h5>
    </a>
    <a class="w-28 h-28 bg-white items-center justify-center p-5  drop-shadow-md hover:scale-110 ease-in duration-200 rounded-md flex flex-col space-y-3"
        href="pin.html">
        <img src="{{ asset('assets/more.png') }}" alt="" class="w-10">
        <h5 class="text-gray-700 tracking-wider">Any</h5>
    </a>
</div>

{{-- Change Password Modal --}}
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
                <form class="space-y-6" method="post" action="{{ url('/post/update/password') }}">
                    @csrf
                    <div>
                        <label for="password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password
                            Sekarang</label>
                        <input type="password" name="old_pass"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="••••••••" required>
                    </div>
                    <div>
                        <label for="password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password Baru</label>
                        <input type="password" name="new_pass" placeholder="••••••••"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                    </div>
                    <div>
                        <label for="password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Masukan Ulang</label>
                        <input type="password" name="ver_pass" placeholder="••••••••"
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

{{-- Change Pin Modal --}}
<div id="change-pin" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                data-modal-hide="change-pin">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Ganti Pin</h3>
                <form class="space-y-6" method="post" action="{{ url('/post/update/pin') }}">
                    @csrf
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pin
                            Baru
                        </label>
                        <input type="password" name="pin"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="••••••••" maxlength="6" required>
                    </div>
                    <button type="submit"
                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan
                        Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Block Card --}}
<div id="block" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Blokir Kartu
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="block">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    Blokir kartu akan membuat kartu anda tidak dapat digunakan hingga anda membuka kembali kartu anda,
                    anda dapat menggunakan fitur ini jika kartu anda hilang atau sedang tidak ingin memakainya.
                </p>
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    Jika anda ingin memblokir kartu anda maka lanjutkan dengan menekan "Lanjut"
                </p>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <form method="post" action="/post/update/blockcard">
                    @csrf
                    <input type="hidden" name="status" value="1">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Lanjut</button>
                </form>
                <button data-modal-hide="block" type="button"
                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Kembali</button>
            </div>
        </div>
    </div>
</div>

{{-- Unblock Card --}}
<div id="unblock" tabindex="-1"
    class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-hide="unblock">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Tutup</span>
            </button>
            <div class="p-6 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah anda yakin ingin membuka
                    kartu anda?</h3>
                <form method="post" action="/post/update/blockcard">
                    @csrf
                    <input type="hidden" name="status" value="">
                    <button type="submit"
                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        Ya, Buka kartu saya
                    </button>
                </form>
                <button data-modal-hide="unblock" type="button"
                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Tidak,
                    Batalkan</button>
            </div>
        </div>
    </div>
</div>
