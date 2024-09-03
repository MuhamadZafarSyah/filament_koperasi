<nav class="px-5 bg-white shadow-lg py-5 rounded-b-[20px] sticky top-0 z-50" x-data="{ openModal: false }">
    <div class="float-end flex flex-row-reverse gap-4">
        <a href="/my-cart">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                viewBox="0 0 576 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path
                    d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
            </svg>
        </a>
        <div x-on:click="openModal = !openModal" class="cursor-pointer">
            <img class="w-7 h-7 rounded-full" src="https://avatars.githubusercontent.com/u/110374556?v=4"
                alt="">
        </div>
    </div>
    <header class="font-bold font-mulish">
        <h1 class=" text-[32px] text-">Koperasi</h1>
        <h1 class="text-xl ">SMKN 65 JAKARTA</h1>
    </header>
    <div class="flex gap-4 mt-4 relative items-center">
        @include('components.partials.search')
        @if (Request::is('/'))
            @include('components.partials.avatar')
        @else
        @endif
    </div>
    <div x-show="openModal" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-30 flex items-center justify-center bg-black bg-opacity-50 sm:items-center sm:justify-center">
        <!-- Modal -->
        <div x-show="openModal" x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="openModal = false"
            @keydown.escape="openModal = false" class="w-fit px-6 py-4 overflow-hidden bg-white  sm:m-4 sm:max-w-xl"
            role="dialog" id="modal">
            <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
            <div class="text-center">
                <h1 class="font-bold">Kamu Ingin Memamerkan Keseharian Kamu?</h1>
                <h1 class="font-semibold my-4">Buatlah Postingan Disini</h1>

                <a href="https://blog.muhamadzafarsyah.com"
                    class="relative cursor-pointer block w-fit mx-auto opacity-90 hover:opacity-100 transition-opacity p-[2px] bg-black rounded-[16px] bg-gradient-to-t from-[#8122b0] to-[#dc98fd] active:scale-95">
                    <span
                        class="w-full h-full flex items-center gap-2 px-8 py-3 bg-[#B931FC] text-white rounded-[14px] bg-gradient-to-t from-[#a62ce2] to-[#c045fc]">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5" fill="none"
                            stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            <path
                                d="M8 13V9m-2 2h4m5-2v.001M18 12v.001m4-.334v5.243a3.09 3.09 0 0 1-5.854 1.382L16 18a3.618 3.618 0 0 0-3.236-2h-1.528c-1.37 0-2.623.774-3.236 2l-.146.292A3.09 3.09 0 0 1 2 16.91v-5.243A6.667 6.667 0 0 1 8.667 5h6.666A6.667 6.667 0 0 1 22 11.667Z">
                            </path>
                        </svg>ZetBlog</span>
                </a>

            </div>
        </div>
    </div>
    </div>
</nav>
