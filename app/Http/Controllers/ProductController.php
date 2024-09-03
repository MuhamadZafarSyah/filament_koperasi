<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Product $product, Request $request)
    {
        $search = $request->input('search');

        if ($search) {

            $products = Product::filter(['search' => $search])->paginate('1000');
            // dd($products);
        } else {
            $products = Product::with('penjualan')
                ->where('category_slug', $product->category_slug)
                ->orderBy('created_at', 'desc')
                ->paginate('14');
        }

        return view('product', [
            'products' => $products,
            'header' => 'Search Results : "' . request('search') . '"',
            'title' => 'You search for ' . request('search') . '',
        ]);
    }

    public function show(Product $product)
    {
        $product = Product::with('penjualan')->where('id', $product->id)->first();
        // dd($product);

        $penjualan = Penjualan::where('product_id', $product->id)->first();
        // dd([$penjualan, $product->penjualan]);
        if (!$penjualan) {
            $penjualan = new Penjualan();
            $penjualan->penjualan = 0;
        }
        $stock_baru = $product['stock'] - $penjualan['penjualan'];
        // dd($stock_baru);
        return view('product-detail', compact('product', 'stock_baru'));
    }


    // public function search(Request $request)
    // {

    //     $search = $request->input('search');

    //     // Gunakan scopeFilter untuk mencari produk berdasarkan product_name
    //     $products = Product::filter(['search' => $search])->get();


    //     return view('product', [
    //         'products' => $products,
    //         'header' => 'Search Results : "' . request('search') . '"',
    //         'title' => 'You search for ' . request('search') . '',
    //     ]);
    // }
}
