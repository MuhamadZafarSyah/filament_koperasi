@extends('components.layout')

@section('content')
    {{-- @dd($products) --}}
    <nav class="px-5 bg-white drop-shadow-xl py-5 rounded-b-[20px] sticky top-0 z-50">
        <div class="flex items-center justify-between gap-6">
            <div class="w-full">
                @include('components.partials.search')
            </div>
            <div>
                <a href="/my-cart">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                        viewBox="0 0 576 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                    </svg>
                </a>
            </div>
        </div>
        <div class="flex items-center justify-around mt-10">
            <div class="w-full">
                <section class="w-full overflow-hidden">
                    <ul class="w-full flex justify-between">
                        <li class="flex items-center flex-col">
                            <div
                                class="w-full text-center flex flex-col pt-2 mx-auto items-center {{ Request::is('category/seragam') ? 'border-t-[#6367B0] border-t-2' : '' }}">
                                <a href="/category/seragam">
                                    <img class="w-12 mx-auto" width="20"
                                        src="{{ asset('assets/icons/icon-seragam.webp') }}"
                                        alt="Koperasi-Category = seragam">
                                    <h1
                                        class="font-mulish text-[13px]  {{ Request::is('category/seragam') ? 'text-black font-bold' : 'text-[#C9C9C9]' }}">
                                        Seragam</h1>
                                </a>
                            </div>
                        </li>
                        <li class="flex items-center flex-col">
                            <div
                                class="w-full text-center flex flex-col pt-2 mx-auto items-center {{ Request::is('category/alat-tulis') ? 'border-t-[#6367B0] border-t-2' : '' }}">
                                <a href="/category/alat-tulis">
                                    <img class="w-[58px] mx-auto" src="{{ asset('assets/icons/icon-alat-tulis.webp') }}"
                                        alt="Koperasi-Category = alat-tulis">
                                    <h1
                                        class="font-mulish text-[13px]  {{ Request::is('category/alat-tulis') ? 'text-black font-bold' : 'text-[#C9C9C9]' }}">
                                        Alat Tulis</h1>
                                </a>
                            </div>
                        </li>
                        <li class="flex items-center flex-col">
                            <div
                                class="w-full text-center flex flex-col pt-2 mx-auto items-center {{ Request::is('category/jajanan') ? 'border-t-[#6367B0] border-t-2' : '' }}">
                                <a href="/category/jajanan">
                                    <img class="w-[52px] mx-auto" src="{{ asset('assets/icons/icon-jajanan.webp') }}"
                                        alt="Koperasi-Category = jajanan">
                                    <h1
                                        class="font-mulish text-[13px] {{ Request::is('category/jajanan') ? 'text-black font-bold' : 'text-[#C9C9C9]' }}">
                                        Jajanan</h1>
                                </a>
                            </div>
                        </li>
                        <li class="flex items-center flex-col">
                            <div
                                class="w-full text-center flex flex-col pt-2  items-center {{ Request::is('category/Lainnya') ? 'border-t-[#6367B0] border-t-2' : '' }}">
                                <a href="/category/Lainnya">
                                    <img class="w-[50px] " src="{{ asset('assets/icons/icon-lainnya.webp') }}"
                                        alt="Koperasi-Category = lainnya">
                                    <h1
                                        class="font-mulish text-[13px] {{ Request::is('category/lainnya') ? 'text-black font-bold' : 'text-[#C9C9C9]' }}">
                                        Lainnnya</h1>
                                </a>
                            </div>
                        </li>
                    </ul>
                </section>

            </div>
            <div class="">
                <a href="/">
                    <img class="w-[35px] mx-2" src="{{ asset('assets/icons/icon-x.webp') }}" alt="">
                </a>
            </div>
        </div>
    </nav>

    <section class="bg-[#EDF2F7] min-h-screen">
        @include('components.partials.products-items')
    </section>
@endsection
