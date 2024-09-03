<form action="/s" method="GET" class="w-full">
    <div class="flex bg-[#E6E6E6] rounded-full px-2 py-2 h-[70%] gap-2 w-full border border-[#C9C9C9]">
        <button style="display: contents;" type="submit">
            <ion-icon name="search-outline" class="w-6 h-6"></ion-icon>
        </button>
        <input type="text" value="{{ request('search') }}" name="search" id="search" autocomplete="off"
            class="rounded-full bg-[#E6E6E6] focus-within:outline-none px-1 w-full"
            placeholder="Cari jajanan, & alat tulis">
    </div>
</form>
