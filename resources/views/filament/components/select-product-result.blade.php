<style>
    img {
        width: 50px;
        /* Ubah sesuai kebutuhan Anda */
        height: 50px;
        /* Ubah sesuai kebutuhan Anda */
        object-fit: cover;
        /* Memastikan gambar tetap proporsional */
    }
</style>

<div class="flex rounded-md relative">
    <div class="flex">
        <div class="px-2 py-3">
            <div class="h-10 w-10">
                <img src="{{ url('/storage/' . $image . '') }}" alt="{{ $name }}" role="img"
                    class="h-full custom-img-size w-full rounded-full overflow-hidden shadow object-cover"
                    style="width: 20%!important; border-radius: 50% !important" />
            </div>
        </div>

        {{-- <div class="flex flex-col justify-center pl-3 py-2">
            <p class="text-sm font-bold pb-1">{{ $name }} lalal</p>
            <div class="flex flex-col items-start">
                <p class="text-xs leading-5">{{ $category }}</p>
            </div>
        </div> --}}
    </div>
</div>
