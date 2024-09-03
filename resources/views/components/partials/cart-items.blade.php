<div class="w-full">
    @foreach ($carts as $cart)
        <div class="py-6 border-b">
            <div class="flex items-center gap-4 relative">
                <div class="absolute right-0 top-0">
                    <form action="/my-cart/{{ $cart->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" data-confirm-delete="true">
                            <svg data-confirm-delete="true" id="delete cart items" xmlns="http://www.w3.org/2000/svg"
                                width="20" height="20" fill="orange" viewBox="0 0 512 512">
                                <path
                                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM184 232l144 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-144 0c-13.3 0-24-10.7-24-24s10.7-24 24-24z" />
                            </svg>
                        </button>
                    </form>
                </div>
                <div class="h-20">
                    <img class="rounded-md object-contain w-full h-full " src="/storage/{{ $cart->product->image }}"
                        alt="Koperasi 65 - {{ $cart->product->name }}">
                </div>
                <div>
                    <h1 class="font-semibold text-base">{{ $cart->product->name }}</h1>
                    <h2 class="text-gray-500 text-xs">{{ $cart->product->category }}</h2>
                    <div class="flex justify-between items-center">
                        <h3 class="mt-2 font-bold">Rp
                            {{ number_format($cart->product->total_price, 0, ',', '.') }}</h3>
                    </div>
                    <div class="absolute bottom-0 right-2">
                        <span>{{ $cart->quantity }}</span>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
