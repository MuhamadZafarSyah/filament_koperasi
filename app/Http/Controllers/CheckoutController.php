<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Checkout;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $checkout = Cart::where('user_id', auth()->id())->with('product')->get();

        foreach ($checkout as $key => $value) {
            // dd($value);
            return response()->json($value);
        }

        // return view('/checkout', compact('checkout'));
    }
}
