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
        $userId = Auth::id();
        $carts = Cart::where('user_id', $userId)->with('product')->get();
        $totalQuantity = $carts->sum('quantity');

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
            $cartItem->save();
        } else {
            // If product is not in the cart, create a new cart item
            $cartItem = Cart::create([
                'user_id' => $user_id,
                'product_id' => $request->product_id,
                'quantity' => 1,
                'total' => $product->price,
            ]);
        }

        // Calculate the total price for all items in the cart
        $totalPrice = Cart::where('user_id', $user_id)
            ->sum(DB::raw('quantity * total'));

        // Update the total price in the cart
        Cart::where('user_id', $user_id)
            ->update(['total' => $totalPrice]);



        toast('Gagal menambahkan ke keranjang', 'failed')->error('Register failed!');
        toast('Berhasil menambahkan ke keranjang', 'success');
        return redirect()->back();
    }


    public function destroy($id)
    {
        $cart = Cart::findOrFail($id);
        $cart->delete();

        toast('Gagal menambahkan ke keranjang', 'failed')->error('Register failed!');
        toast('Berhasil hapus dari keranjang', 'success');
        return redirect()->back();

    }
}
