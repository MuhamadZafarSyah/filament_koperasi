<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::where('user_id', auth()->user()->id)->with('product', 'user')->get();
        $totalQuantity = $carts->sum('quantity');

        $totalPrice = 0;
        foreach ($carts as $item) {
            $totalPrice += $item->product->total_price * $item->quantity;
            // dd($totalPrice);
        }

        // dd($totalPrice);

        return view('cart', compact('carts', 'totalQuantity'));
    }

    public function store(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $user_id = Auth::user()->id;

        // Check if the product is already in the cart
        $cartItem = Cart::where('user_id', $user_id)
            ->where('product_id', $request->product_id)
            ->first();

        if ($cartItem) {
            // If product is already in the cart, just increment the quantity
            $cartItem->quantity += 1;
            $cartItem->total = $cartItem->quantity * $product->price; // Update total based on new quantity
            $cartItem->save();
        } else {
            // If product is not in the cart, create a new cart item
            Cart::create([
                'user_id' => $user_id,
                'product_id' => $request->product_id,
                'quantity' => 1,
                'total' => $product->price, // Calculate total based on product price
            ]);
        }

        toast('Ditambahkan ke keranjang', 'success');
        return redirect()->back();
    }


    public function destroy(Cart $cart)
    {
        $data = $cart->id;

        Cart::destroy($data);

        toast('Berhasil hapus dari keranjang', 'success');
        return redirect()->back();
    }
}
