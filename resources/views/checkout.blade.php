@extends('components.layout')

@section('content')
    {{-- @dd($value) --}}
    <section class="bg-gray-50 h-screen p-4">
        <header class="p-5 relative text-center ">
            <div class="relative">
                <div class="absolute bottom-[7px]">
                    <a href="javascript:history.back()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            viewBox="0 0 512 512">
                            <path
                                d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 288 480 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-370.7 0 73.4-73.4c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-128 128z" />
                        </svg>
                    </a>
                </div>
                <div class="text-center block">
                    <h1 class="font-semibold text-base inline-block">Checkout</h1>
                </div>
            </div>
        </header>

        <div class="bg-white flex flex-col gap-4 rounded-3xl p-4">
            <h1 class="font-bold underline">Pastikan Data Anda Sudah benar</h1>
            <div class="flex justify-between items-center">
                <h1 class="font-bold text-sm ">Nama Lengkap</h1>
                <h1 class="font-bold text-sm ">{{ $value->user->name ? $value->user->name : '...........' }}</h1>
            </div>
            <div class="flex justify-between items-center">
                <h1 class="font-bold text-sm ">Kelas</h1>
                <h1 class="font-bold text-sm ">{{ $value->user->class ? $value->user->class : '...........' }}</h1>
            </div>
            <div class="flex justify-between items-center">
                <h1 class="font-bold text-sm ">Nomor HandPhone</h1>
                <h1 class="font-bold text-sm ">{{ $value->user->phone ? $value->user->phone : '...........' }}</h1>
            </div>
            <div class="flex justify-between items-center">
                <h1 class="font-bold text-sm ">Total Yang Harus di Bayar </h1>
                <h1 class="font-bold text-lg text-orange-600">Rp {{ number_format($totalPrice, 0, ',', '.') }}</h1>
            </div>
        </div>

        <div class="bg-white flex flex-col gap-4 rounded-3xl p-4 mt-4">
            <h1 class="font-bold underline">Metode Pembayaran</h1>
            <div class="flex items-center gap-4">
                <img class="w-1/3" src="{{ asset('assets/icons/bank-dki.png') }}" alt="">
                <div class="flex flex-col">
                    <h1 class="font-bold">Yati Supriyati</h1>
                    <h1>51128084371</h1>
                </div>
            </div>
        </div>

        <div class="bg-white flex flex-col gap-4 rounded-3xl p-4 mt-4">
            <h1 class="font-bold underline">Upload Bukti Transfer</h1>
            <div class="flex justify-between items-center">
                <form action="/checkout/store" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="flex justify-between items-center ">
                        <input type="file" class="w-10/12" name="img_bukti_transfer" id="img_bukti_transfer">
                        <img width="30" class="mr-4" height="30"
                            src="https://img.icons8.com/color/96/verified-account--v1.png" alt="verified-account--v1" />
                    </div>
                    @error('img_bukti_transfer')
                        <span class="text-red-600 text-sm">Tidak Ada Gambar Bukti Transfer</span>
                    @enderror
                    {{-- <span class="text-red-600"></span> --}}
            </div>
        </div>
    </section>

    <div class="flex flex-col gap-4 mb-4 fixed bottom-0 px-4 w-full">
        <div class="w-full">
            <span>
                @php
                    $incompleteData =
                        is_null($value->user->name) || is_null($value->user->class) || is_null($value->user->phone);
                @endphp

                @if ($incompleteData)
                    <a href="/profile"
                        class="py-4 block bg-red-700 shadow-2xl rounded-full text-white w-full text-center font-bold"
                        disabled>
                        Lengkapi Data Anda Terlebih Dahulu
                    </a>
                @else
                    <button class="py-4 bg-orange-700 shadow-2xl rounded-full text-white w-full text-center font-bold">
                        Konfirmasi Pembayaran
                    </button>
                @endif
                </form>
            </span>
        </div>
    </div>
@endsection
