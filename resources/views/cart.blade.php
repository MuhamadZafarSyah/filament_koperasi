@extends('components.layout')

@section('content')
    {{-- @dd($carts) --}}
    <main>
        <header class="py-5 relative text-center px-5">
            <div class="relative">
                <div class="absolute bottom-[7px]">
                    <a href="javascript:history.back()" @click="loading = true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            viewBox="0 0 512 512">
                            <path
                                d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 288 480 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-370.7 0 73.4-73.4c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-128 128z" />
                        </svg>
                    </a>
                </div>
                <div class="text-center">
                    <h1 class="font-semibold text-base">My Cart</h1>
                </div>
            </div>
        </header>

        <div class="px-5">
            <div class="bg-[#009fe920] rounded-full w-full px-3 py-4">
                <div class="flex items-center px-5">
                    <div class="mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#00A1E9"
                            viewBox="0 0 448 512">
                            <path
                                d="M160 112c0-35.3 28.7-64 64-64s64 28.7 64 64l0 48-128 0 0-48zm-48 48l-64 0c-26.5 0-48 21.5-48 48L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-208c0-26.5-21.5-48-48-48l-64 0 0-48C336 50.1 285.9 0 224 0S112 50.1 112 112l0 48zm24 48a24 24 0 1 1 0 48 24 24 0 1 1 0-48zm152 24a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                        </svg>
                    </div>
                    <div class="w-full">
                        <h1 class="text-[#00A1E9] w-full font-bold text-xs">You have {{ $totalQuantity }} items in your
                            cart
                        </h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="mt-2 mb-6 px-5">
            @include('components.partials.cart-items', ['carts' => $carts])
        </section>

        @php
            $totalPrice = 0;
            foreach ($carts as $item) {
                $totalPrice += $item->product->total_price * $item->quantity;
            }
        @endphp

        <div class="flex flex-col gap-4 mb-4 absolute bottom-0 px-4 w-full">
            <div class="flex items-center justify-between">
                <span class="text-gray-500">Items</span>
                <span class="font-semibold">{{ $totalQuantity }}</span>
            </div>
            <div class="flex items-center justify-between">
                <span class="text-gray-500">Total</span>
                <span class="font-semibold">Rp{{ number_format($totalPrice, 0, ',', '.') }}</span>
            </div>

            <div class="w-full">
                @if ($totalQuantity == null)
                    <button class="py-4 bg-gray-600 cursor-not-allowed rounded-full text-white w-full text-center font-bold"
                        disabled>Tidak Ada Barang</button>
                @else
                    <a href="/checkout">
                        <button class="py-4 bg-black rounded-full text-white w-full text-center font-bold">Checkout</button>
                    </a>
                @endif
            </div>
        </div>
        </div>
    </main>
@endsection
