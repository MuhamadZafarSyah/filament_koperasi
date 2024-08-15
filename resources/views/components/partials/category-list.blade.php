<section class="w-full overflow-hidden">
    <ul class="w-full flex justify-between overflow-x-scroll">

        <li class="flex items-center flex-col shrink-0 w-1/4">
            <div
                class="w-full text-center flex flex-col pt-2 mx-auto items-center {{ Request::is('category/seragam') ? 'border-t-[#6367B0] border-t-2' : '' }}">
                <a href="/category/seragam">
                    <img class="w-16 mx-auto" width="20" src="{{ asset('assets/icons/icon-seragam.webp') }}"
                        alt="Koperasi-Category = seragam">
                    <h1
                        class="font-mulish text-[13px]  {{ Request::is('category/seragam') ? 'text-black font-bold' : 'text-[#C9C9C9]' }}">
                        Seragam</h1>
                </a>
            </div>
        </li>
        <li class="flex items-center flex-col shrink-0 w-1/4">
            <div
                class="w-full text-center flex flex-col pt-2 mx-auto items-center {{ Request::is('category/alat-tulis') ? 'border-t-[#6367B0] border-t-2' : '' }}">
                <a href="/category/alat-tulis">
                    <img class="w-[72px] mx-auto" src="{{ asset('assets/icons/icon-alat-tulis.webp') }}"
                        alt="Koperasi-Category = alat-tulis">
                    <h1
                        class="font-mulish text-[13px]  {{ Request::is('category/alat-tulis') ? 'text-black font-bold' : 'text-[#C9C9C9]' }}">
                        Alat Tulis</h1>
                </a>
            </div>
        </li>
        <li class="flex items-center flex-col shrink-0 w-1/4">
            <div
                class="w-full text-center flex flex-col pt-2 mx-auto items-center {{ Request::is('category/jajanan') ? 'border-t-[#6367B0] border-t-2' : '' }}">
                <a href="/category/jajanan">
                    <img class="w-16 mx-auto" src="{{ asset('assets/icons/icon-jajanan.webp') }}"
                        alt="Koperasi-Category = jajanan">
                    <h1
                        class="font-mulish text-[13px] {{ Request::is('category/jajanan') ? 'text-black font-bold' : 'text-[#C9C9C9]' }}">
                        Jajanan</h1>
                </a>
            </div>
        </li>
        <li class="flex items-center flex-col shrink-0 w-1/4">
            <div
                class="w-full text-center flex flex-col pt-2  items-center {{ Request::is('category/Lainnya') ? 'border-t-[#6367B0] border-t-2' : '' }}">
                <a href="/category/Lainnya">
                    <img class="w-[60px] " src="{{ asset('assets/icons/icon-lainnya.webp') }}"
                        alt="Koperasi-Category = lainnya">
                    <h1
                        class="font-mulish text-[13px] {{ Request::is('category/lainnya') ? 'text-black font-bold' : 'text-[#C9C9C9]' }}">
                        Lainnnya</h1>
                </a>
            </div>
        </li>
    </ul>
</section>
