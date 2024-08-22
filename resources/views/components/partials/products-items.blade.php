{{-- @dd($products) --}}

@if ($products->isEmpty())
    <div class="w-full h-[80vh] overflow-hidden p-4">
        <h1 class="text-xl font-bold text-gray-700">Produk Tidak Ditemukan</h1>
    </div>
@else
    {{-- @dd($products) --}}

    <div class="grid grid-cols-2 px-2 h-full gap-x-2 mb-4">
        {{-- @dd($products) --}}
        @foreach ($products as $product)
            @php
                $stock_lama = $product->stock;
                // dd($product);
                if ($product->penjualan) {
                    $stock_baru = $stock_lama - $product->penjualan->penjualan;
                } else {
                    $stock_baru = $product->stock;
                }
                // dd($product);
            @endphp
            @if ($stock_baru !== 0)
                <a href="/product/{{ $product->id }}">
                    <div class="w-full overflow-hidden mt-4 bg-white rounded-md">
                        <div class="h-36 overflow-hidden">
                            <img class="w-full h-full object-cover" src="/storage/{{ $product->image }}" alt="">
                        </div>
                        <div class=" bg-white pt-1">
                            <div class=" py-1 px-2">
                                <h1 class="text-xs font-bold">{{ $product->name }}</h1>
                                <span class="text-lg">Rp {{ number_format($product->total_price, 0, ',', '.') }}</span>
                                <h2 class="text-gray-600 text-xs">{{ $product->category }}</h2>
                            </div>
                            <div class="border-y border-gray-300 py-2 mt-2">
                                <div class="flex px-2 justify-between items-center">
                                    <div class="flex justify-between text-xs items-center">
                                        <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" width="10"
                                            height="10" fill="currentColor"
                                            viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M176 88l0 40 160 0 0-40c0-4.4-3.6-8-8-8L184 80c-4.4 0-8 3.6-8 8zm-48 40l0-40c0-30.9 25.1-56 56-56l144 0c30.9 0 56 25.1 56 56l0 40 28.1 0c12.7 0 24.9 5.1 33.9 14.1l51.9 51.9c9 9 14.1 21.2 14.1 33.9l0 92.1-128 0 0-32c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 32-128 0 0-32c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 32L0 320l0-92.1c0-12.7 5.1-24.9 14.1-33.9l51.9-51.9c9-9 21.2-14.1 33.9-14.1l28.1 0zM0 416l0-64 128 0c0 17.7 14.3 32 32 32s32-14.3 32-32l128 0c0 17.7 14.3 32 32 32s32-14.3 32-32l128 0 0 64c0 35.3-28.7 64-64 64L64 480c-35.3 0-64-28.7-64-64z" />
                                        </svg>

                                        @if ($product->penjualan !== null)
                                            <span class="mr-1 font-bold text-[10px]">{{ $stock_baru }}</span>
                                        @else
                                            <span class="mr-1 font-bold text-[10px]">{{ $stock_lama }}</span>
                                        @endif
                                        <span class="text-gray-600 ">Stock</span>
                                    </div>
                                    <div class="flex justify-between text-[10px] items-center">
                                        @if ($product->stock == 0)
                                            <span class="mr-1 font-bold text-[10px]">Baru Saja</span>
                                        @else
                                            <span
                                                class="mr-1 font-bold text-[10px]">{{ $product->updated_at->diffForHumans() }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @else
                <div
                    class="w-full overflow-hidden mt-4 relative  backdrop-brightness-50 backdrop-blur-sm bg-white rounded-md">
                    <img class="absolute z-40 top-[5%] " src="{{ asset('assets/icons/sold-out.webp') }}"
                        alt="Items Sold Out">
                    <div class="h-36 overflow-hidden blur-sm">
                        <img class="w-full h-full  object-cover" src="/storage/{{ $product->image }}" alt="">
                    </div>
                    <div class=" bg-white pt-1">
                        <div class=" py-1 px-2">
                            <h1 class="text-xs font-bold">{{ $product->name }}</h1>
                            <span class="text-lg">Rp {{ number_format($product->total_price, 0, ',', '.') }}</span>
                            <h2 class="text-gray-600 text-xs">{{ $product->category }}</h2>
                        </div>
                        <div class="border-y border-gray-300 py-2 mt-2">
                            <div class="flex px-2 justify-between items-center">
                                <div class="flex justify-between text-xs items-center">
                                    <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" width="10" height="10"
                                        fill="currentColor"
                                        viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                        <path
                                            d="M176 88l0 40 160 0 0-40c0-4.4-3.6-8-8-8L184 80c-4.4 0-8 3.6-8 8zm-48 40l0-40c0-30.9 25.1-56 56-56l144 0c30.9 0 56 25.1 56 56l0 40 28.1 0c12.7 0 24.9 5.1 33.9 14.1l51.9 51.9c9 9 14.1 21.2 14.1 33.9l0 92.1-128 0 0-32c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 32-128 0 0-32c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 32L0 320l0-92.1c0-12.7 5.1-24.9 14.1-33.9l51.9-51.9c9-9 21.2-14.1 33.9-14.1l28.1 0zM0 416l0-64 128 0c0 17.7 14.3 32 32 32s32-14.3 32-32l128 0c0 17.7 14.3 32 32 32s32-14.3 32-32l128 0 0 64c0 35.3-28.7 64-64 64L64 480c-35.3 0-64-28.7-64-64z" />
                                    </svg>
                                    @if ($product->penjualan !== null)
                                        <span class="mr-1 font-bold">{{ $stock_baru }}</span>
                                    @else
                                        <span class="mr-1 font-bold">{{ $stock_lama }}</span>
                                    @endif
                                    <span class="text-gray-600 ">Stock</span>
                                </div>
                                <div class="flex justify-between text-xs items-center">
                                    <span class="mr-1 font-bold">{{ $product->updated_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    @if (count($products) >= 8)
        <nav class="flex justify-center  gap-10 p-4" aria-label="Table navigation">
            {{ $products->links() }}
        </nav>
    @endif
    {{-- @endif --}}
@endif
