<style>
    .hasil-gambar {
        max-width: 20%;
        border-radius: 50% !important;
    }

    .select-product-result:hover {
        background-color: #f1f1f1;
    }
</style>

<div class="flex rounded-md relative">
    <div class="flex">
        <div class="px-2 py-3">
            <div class="h-10 w-10">
                <img class="w-10 rounded-full" src="{{ url('/storage/' . $image . '') }}" alt="{{ $name }}"
                    role="img" class="h-full hasil-gambar w-full rounded-full overflow-hidden shadow object-cover"
                    style="width: 20%!important; border-radius: 50% !important" />
            </div>
        </div>

        <div class="flex flex-col justify-center pl-3 py-2">
            <p class="text-sm font-bold pb-1">{{ $name }}</p>
            <div class="flex flex-col items-start">
                <p class="text-xs leading-5">{{ $category }}</p>
            </div>
        </div>
    </div>
</div>
