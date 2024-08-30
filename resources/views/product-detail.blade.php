@extends('components.layout')

@section('content')
    @if ($stock_baru == 0)
        <div class="fixed top-0 left-0 z-50 w-full h-full bg-black bg-opacity-50 flex items-center justify-center">
            <div class="bg-white p-5 rounded-lg text-center">
                <h1 class="text-2xl font-semibold font-neue">Stock Habis</h1>
                <p class="text-sm font-mulish mb-10">Stock produk ini sudah habis, silahkan cek produk lainnya</p>
                <a href="/category/{{ $product->category_slug }}"
                    class="bg-gradient-to-r from-[#00A1E9] to-[#6367B0] text-white text-center font-mulish font-medium py-2 px-4 rounded-lg mt-4">Kembali
                    ke kategori</a>
            </div>
        </div>
    @else
        <header class="w-full px-5 py-4  fixed top-0 z-50">
            <div class="flex justify-between items-center">
                <div class="p-2 bg-white rounded-full shadow-black">
                    <a href="/category/{{ $product->category_slug }}" @click="loading = true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            viewBox="0 0 512 512">
                            <path
                                d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 288 480 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-370.7 0 73.4-73.4c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-128 128z" />
                        </svg>
                    </a>
                </div>
                <div class="p-2 bg-white rounded-full shadow-black">
                    <a href="/my-cart" @click="loading = true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            viewBox="0 0 576 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path
                                d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                        </svg>
                    </a>
                </div>
            </div>
        </header>

        <section class="w-full mb-10">
            <div id="image">
                <img class="object-cover rellax h-[25rem] w-full" data-rellax-speed="-6"
                    src="/storage/{{ $product->image }}" alt="Koperasi 65 - {{ $product->name }}">
            </div>

            <div class="relative w-full -mt-4 rounded-3xl  shadow-detail  z-20">
                <div class="w-full md:px-4 p-4 rounded-3xl bg-white  z-20">
                    <nav class="text-xs font-thin font-libre md:mb-11 my-4">
                        <a href="/">Home</a> / {{ $product->category }}
                    </nav>
                    <h1 class="font-semibold text-2xl font-neue mb-[21px]">
                        {{ $product->name }}
                    </h1>
                    @if ($product->discount)
                        <span class="text-3xl font-semibold font-neue"
                            style="color: #b80505; text-decoration: line-through">Rp
                            {{ number_format($product->price, 0, ',', '.') }}</span>
                        <span class="text-3xl font-bold font-neue text-black">Rp
                            {{ number_format($product->total_price, 0, ',', '.') }}</span>
                    @else
                        <span class="text-3xl font-semibold font-neue">Rp
                            {{ number_format($product->price, 0, ',', '.') }}</span>
                    @endif
                    @if (!$product->size == null)
                        <div class="flex flex-col w-full my-6">
                            <div class="font-mulish w-[30%] text-sm font-semibold">Size</div>
                            <ul class="flex gap-2 w-full">
                                @foreach ($product->size as $size)
                                    <li class="p-2 px-3 mt-2   rounded-[5px] border text-xs border-gray-500 "
                                        style="display: inline-block;">
                                        {{ $size }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (!$product->type == null)
                        <div class="flex flex-col w-full my-6">
                            <div class="font-mulish w-[30%] text-sm font-semibold">Variant</div>
                            <ul class="flex gap-2 w-full">
                                @foreach ($product->type as $type)
                                    <li class="p-2 px-3 mt-2   rounded-[5px] border text-xs border-gray-500 "
                                        style="display: inline-block;">
                                        {{ $type }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @else
                    @endif
                    <li class="text-gray-500 font-neue mt-4">{{ $stock_baru }} stock</li>
                    <h1 class="text-center text-lg">Share</h1>
                    <!-- MOBILE || MOBILE || MOBILE || MOBILE -->
                    <div class="w-full mb-6 mt-4 px-0 md:hidden block"
                        style="padding-left: 0 !important; padding-right: 0 !important">
                        <div class="flex w-full shrink-0 shadow-xl">
                            <a href="//www.facebook.com/sharer/sharer.php?u=https://koprasismkn65.store/product/{{ $product->id }}/"
                                class="w-full">
                                <div class="w-full flex items-center justify-center border border-black p-4 shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="18" height="18"
                                        viewBox="0 0 50 50">
                                        <path
                                            d="M32,11h5c0.552,0,1-0.448,1-1V3.263c0-0.524-0.403-0.96-0.925-0.997C35.484,2.153,32.376,2,30.141,2C24,2,20,5.68,20,12.368 V19h-7c-0.552,0-1,0.448-1,1v7c0,0.552,0.448,1,1,1h7v19c0,0.552,0.448,1,1,1h7c0.552,0,1-0.448,1-1V28h7.222 c0.51,0,0.938-0.383,0.994-0.89l0.778-7C38.06,19.518,37.596,19,37,19h-8v-5C29,12.343,30.343,11,32,11z">
                                        </path>
                                    </svg>
                                </div>
                            </a>
                            <a href="//twitter.com/share?url=https://koprasismkn65.store/product/{{ $product->id }}/"
                                class="w-full">
                                <div class="w-full flex items-center justify-center border border-black p-4 shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="18" height="18"
                                        viewBox="0 0 50 50">
                                        <path
                                            d="M 50.0625 10.4375 C 48.214844 11.257813 46.234375 11.808594 44.152344 12.058594 C 46.277344 10.785156 47.910156 8.769531 48.675781 6.371094 C 46.691406 7.546875 44.484375 8.402344 42.144531 8.863281 C 40.269531 6.863281 37.597656 5.617188 34.640625 5.617188 C 28.960938 5.617188 24.355469 10.21875 24.355469 15.898438 C 24.355469 16.703125 24.449219 17.488281 24.625 18.242188 C 16.078125 17.8125 8.503906 13.71875 3.429688 7.496094 C 2.542969 9.019531 2.039063 10.785156 2.039063 12.667969 C 2.039063 16.234375 3.851563 19.382813 6.613281 21.230469 C 4.925781 21.175781 3.339844 20.710938 1.953125 19.941406 C 1.953125 19.984375 1.953125 20.027344 1.953125 20.070313 C 1.953125 25.054688 5.5 29.207031 10.199219 30.15625 C 9.339844 30.390625 8.429688 30.515625 7.492188 30.515625 C 6.828125 30.515625 6.183594 30.453125 5.554688 30.328125 C 6.867188 34.410156 10.664063 37.390625 15.160156 37.472656 C 11.644531 40.230469 7.210938 41.871094 2.390625 41.871094 C 1.558594 41.871094 0.742188 41.824219 -0.0585938 41.726563 C 4.488281 44.648438 9.894531 46.347656 15.703125 46.347656 C 34.617188 46.347656 44.960938 30.679688 44.960938 17.09375 C 44.960938 16.648438 44.949219 16.199219 44.933594 15.761719 C 46.941406 14.3125 48.683594 12.5 50.0625 10.4375 Z ">
                                        </path>
                                    </svg>
                                </div>
                            </a>
                            <a class="w-full relative">
                                <div onclick="myFunction()" id="copy-link"
                                    class="w-full flex relative cursor-pointer items-center justify-center border border-black p-4 shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        viewBox="0 0 640 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                        <path
                                            d="M579.8 267.7c56.5-56.5 56.5-148 0-204.5c-50-50-128.8-56.5-186.3-15.4l-1.6 1.1c-14.4 10.3-17.7 30.3-7.4 44.6s30.3 17.7 44.6 7.4l1.6-1.1c32.1-22.9 76-19.3 103.8 8.6c31.5 31.5 31.5 82.5 0 114L422.3 334.8c-31.5 31.5-82.5 31.5-114 0c-27.9-27.9-31.5-71.8-8.6-103.8l1.1-1.6c10.3-14.4 6.9-34.4-7.4-44.6s-34.4-6.9-44.6 7.4l-1.1 1.6C206.5 251.2 213 330 263 380c56.5 56.5 148 56.5 204.5 0L579.8 267.7zM60.2 244.3c-56.5 56.5-56.5 148 0 204.5c50 50 128.8 56.5 186.3 15.4l1.6-1.1c14.4-10.3 17.7-30.3 7.4-44.6s-30.3-17.7-44.6-7.4l-1.6 1.1c-32.1 22.9-76 19.3-103.8-8.6C74 372 74 321 105.5 289.5L217.7 177.2c31.5-31.5 82.5-31.5 114 0c27.9 27.9 31.5 71.8 8.6 103.9l-1.1 1.6c-10.3 14.4-6.9 34.4 7.4 44.6s34.4 6.9 44.6-7.4l1.1-1.6C433.5 260.8 427 182 377 132c-56.5-56.5-148-56.5-204.5 0L60.2 244.3z" />
                                    </svg>
                                </div>
                                <div id="confirmation"
                                    class="hidden bg-white shadow-xl text-gray-700 text-sm px-2 py-1 absolute top-0 right-0 mt-2 mr-2 rounded">
                                    Copied to clipboard!
                                </div>

                            </a>
                        </div>
                    </div>

                    <div class="divide-y divide-slate-200">
                        <!-- Accordion item -->
                        <div x-data="{ expanded: false }" class="py-2">
                            <h2>
                                <button id="faqs-title-01" type="button"
                                    class="flex items-center justify-between w-full text-left font-semibold py-2"
                                    style="
            background-color: transparent;
            color: black;
            padding-right: 0 !important;
            padding-left: 0 !important;
            "
                                    @click="expanded = !expanded" :aria-expanded="expanded" aria-controls="faqs-text-01"
                                    aria-expanded="false">
                                    <span
                                        class="text-xs active:text-secondary border-b-gray-300 bg-none font-neue border-b inline-block pb-4 w-full"
                                        :class="{ 'text-secondary border-none duration-100': expanded }">Description</span>
                                    <svg class="fill-black shrink-0 ml-8" width="16" height="16"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect y="7" width="16" height="2" rx="1"
                                            class="transform origin-center transition duration-200 ease-out"
                                            :class="{ '!rotate-180': expanded }"></rect>
                                        <rect y="7" width="16" height="2" rx="1"
                                            class="transform origin-center rotate-90 transition duration-200 ease-out"
                                            :class="{ '!rotate-180': expanded }"></rect>
                                    </svg>
                                </button>
                            </h2>
                            <div id="faqs-text-01" role="region" aria-labelledby="faqs-title-01"
                                class="grid text-sm text-slate-600 overflow-hidden transition-all duration-300 ease-in-out grid-rows-[0fr] opacity-0"
                                :class="expanded ? 'grid-rows-[1fr] opacity-100' : 'grid-rows-[0fr] opacity-0'">
                                <div class="overflow-hidden">
                                    {!! $product->description !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-sm mt-4">
                        <p>Categories: <span class="text-black">{{ $product->category }}</span>
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <div class="sticky bottom-0 w-full shadow-2xl drop-shadow-2xl flex items-center z-50 bg-white py-3">
            <div class="px-10 w-full">
                @if ($product->category === 'Seragam')
                    <form action="/my-cart/store" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="submit" value="+Keranjang"
                            class="rounded-lg w-full text-white text-center font-mulish font-medium bg-gradient-to-r from-[#00A1E9] to-[#6367B0] py-[10px]"></input>
                    </form>
                @else
                @endif
            </div>
        </div>
    @endsection

    @section('script_copyToClipBoard')
        <script>
            document.getElementById('copy-link').addEventListener('click', function(event) {
                event.preventDefault(); // Mencegah aksi default dari link

                // Text yang ingin disalin
                var textToCopy = 'https://koprasismkn65.store/product/{{ $product->id }}';

                // Membuat elemen textarea sementara
                var textarea = document.createElement('textarea');
                textarea.value = textToCopy;
                document.body.appendChild(textarea);

                // Memilih dan menyalin teks ke clipboard
                textarea.select();
                textarea.setSelectionRange(0, 99999); // Untuk perangkat mobile
                document.execCommand('copy');

                // Menghapus elemen textarea sementara
                document.body.removeChild(textarea);

                // Tampilkan pesan konfirmasi
                var confirmation = document.getElementById('confirmation');
                confirmation.classList.remove('hidden');

                // Sembunyikan pesan konfirmasi setelah 3 detik
                setTimeout(function() {
                    confirmation.classList.add('hidden');
                }, 3000);
            });
        </script>
    @endif
@endsection
