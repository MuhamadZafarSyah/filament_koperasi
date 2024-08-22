@extends('components.layout')

@section('script_alpine')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script defer="" src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
    <script defer="" src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endsection

@section('content')
    <section class="p-4">
        @if ($checkout->isEmpty())
            <div class="w-full h-[80vh] flex items-center justify-center overflow-hidden p-4">
                <h1 class="text-xl font-bold text-gray-700">Tidak Ada Riwayat Transaksi</h1>
            </div>
        @else
            <h1 class="font-bold">Riwayat Transaksi</h1>
            <div class="mt-6 flex flex-col gap-4 pb-28">
                @foreach ($checkout as $item)
                    <div class="border relative  rounded-lg  shadow-xl drop-shadow-2xl p-4">
                        <h1 class="font-bold">Total transaksi</h1>
                        <h2 class="text-lg">Rp {{ number_format($item->total_harga, 0, ',', '.') }}</h2>
                        <h1 class="font-bold">Kode unik transaksi</h1>
                        <h2 class="text-lg">{{ $item->kode_bukti }}</h2>
                        <div class="flex items-end justify-between" x-data="{ open: false }">
                            @if ($item->status == 'Pending')
                                <span
                                    class="inline-flex items-center bg-orange-100 text-orange-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-orange-900 dark:text-orange-300">
                                    <span class="w-2 h-2 me-1 bg-orange-500 rounded-full"></span>
                                    {{ $item->status }}
                                </span>
                            @else
                                <span
                                    class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                                    <span class="w-2 h-2 me-1 bg-green-500 rounded-full"></span>
                                    {{ $item->status }}
                                </span>
                            @endif
                            @if ($item->status == 'Success')
                                <h1 class="font-bold">Silahkan Temui Petugas!</h1>
                            @endif

                        </div>
                        <div class="absolute top-2 right-2">
                            <span>{{ $item->created_at }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </section>
    @include('components.partials.navbar')
@endsection
