@extends('components.layout')



@section('content')
    <section class="p-4" x-data="{ openModal: false, selectedItem: null }">

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
                        <div class="flex items-end justify-between">
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
                                <button x-on:click="selectedItem = {{ $item }}; openModal = true"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Rincian
                                </button>
                            @endif

                        </div>
                        <div class="absolute top-2 right-4 text-end ">
                            <span>{{ $item->created_at }}</span>
                            @if ($item->status === 'Success')
                                <span class="font-bold block">Silahkan Temui Petugas!</span>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        <div x-show="openModal" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
            <!-- Modal -->
            <div x-show="openModal" x-transition:enter="transition ease-out duration-150"
                x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0 transform translate-y-1/2" @click.away="openModal = false"
                @keydown.escape="openModal = false"
                class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg text-black sm:rounded-lg sm:m-4 sm:max-w-xl"
                role="dialog" id="modal">
                <header class="flex justify-end">
                    <button
                        class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover:text-gray-700"
                        aria-label="close" x-on:click="openModal = false">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                            <path
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 011.414 1.414L11.414 10l4.293 4.293a1 1 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                    </button>
                </header>
                <!-- Modal body -->
                <div class="mt-4 mb-6">
                    <!-- Modal title -->
                    <p class="mb-2 text-lg font-semibold text-gray-700 ">Nama Barang</p>
                    <!-- Modal description -->
                    <p class="text-sm text-gray-700 " x-text="selectedItem.nama_barang"></p>
                </div>
                <div class="mt-4 mb-6">
                    <!-- Modal title -->
                    <p class="mb-2 text-lg font-semibold text-gray-700 ">Total Transaksi Anda</p>
                    <!-- Modal description -->
                    <p class="text-sm text-gray-700 "
                        x-text="'Rp ' + new Intl.NumberFormat('id-ID').format(selectedItem.total_harga)"></p>
                </div>
                <footer
                    class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 ">
                    <button x-on:click="openModal=false"
                        class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-500 hover:bg-blue-700 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600  focus:outline-none focus:shadow-outline-purple">
                        Okee
                    </button>
                </footer>
            </div>
        </div>

    </section>

    @include('components.partials.navbar')
@endsection
