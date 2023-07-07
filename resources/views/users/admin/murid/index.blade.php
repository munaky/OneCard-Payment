<script src="{{ url('/content/admin/murid/script.js') }}" defer></script>

<form method="post" action="{{ url('/post/create/murid') }}">
    @csrf
    <div class="mt-8 space-y-3 mb-20">
        <div>
            <input class="text-center" name="card_id" type="text" style="border-radius: 5px; line-height: 35px;" placeholder="  ID Kartu" >
        </div>
        <div>
            <input class="text-center" name="username" type="text" style="border-radius: 5px; line-height: 35px;" placeholder="  Username" disabled required>
        </div>
        <div>
            <input class="text-center" name="password" type="text" style="border-radius: 5px; line-height: 35px;" placeholder="  Password" disabled required>
        </div>
        <div>
            <input class="text-center" name="pin" type="text" style="border-radius: 5px; line-height: 35px;" placeholder="  Pin" minlength="6" maxlength="6" disabled required>
        </div>
        <button type="submit" class="w-full text-white bg-[#353648] hover:bg-[#253748] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan Perubahan</button>
    </div>
</form>
