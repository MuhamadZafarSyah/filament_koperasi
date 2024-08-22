<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Checkout;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $checkout = Cart::with('user', 'product')->where('user_id', auth()->user()->id)->get();


        // dd($checkout);

        foreach ($checkout as $key => $value) {
            // dd($checkout);
            // dd($value->user->name);
            $totalPrice = 0;
            foreach ($checkout as $item) {
                $totalPrice += $item->product->total_price * $item->quantity;
            }
            // dd($totalPrice);
            // return response()->json($value);
            // $totalQuantity = $value->sum('quantity');
            return view('checkout', compact('value', 'totalPrice'));
        }
    }

    public function store(Request $request, Cart $cart)
    {

        $user = auth()->user();

        $data = Cart::with('user', 'product')->where('user_id', auth()->user()->id)->get();

        $request->validate([
            'img_bukti_transfer' => 'required|file',
        ]);


        if ($request->hasFile('img_bukti_transfer')) {
            $file = $request->file('img_bukti_transfer');
            $name = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/bukti_transfer', $name); // menggunakan disk 'public'
            $gambar = 'bukti_transfer/' . $name; // mengubah path untuk disimpan ke database
        }

        // dd($validate);

        // $validate['gambar'] = $gambar;


        $totalPrice = 0;
        foreach ($data as $item) {
            $totalPrice += $item->product->total_price * $item->quantity;
        }

        // $kode_bukti = substr(uniqid(), 10, 12);
        $kode_bukti =  "ZN-" . Str::random(6);
        $checkout = new Checkout();
        $checkout->nama_pembeli = $user->name;
        $checkout->kelas_pembeli = $user->class;
        $checkout->total_harga = $totalPrice;
        $checkout->kode_bukti = $kode_bukti;
        $checkout->img_bukti_transfer = $gambar;
        // dd($checkout);
        $checkout->save();

        $token = 'rPkAsNuTy3DP1FP3zV_4';

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => [
                'target' => '088214367530|a',
                'message' =>
                "Murid Bernama: " . $user->name .
                    "
                    \nKelas : " . $user->class .
                    "
                    \nTelah Melakukan Pembayaran Sebesar: Rp" . number_format($totalPrice, 0, ',', '.') .
                    "
                    \nDengan Code Unik: " . $kode_bukti .
                    "
                    \nBukti Transfer: \nhttps://koprasismkn65.store/storage/" . $gambar .
                    "
                    \nCek Selengkapnya di \nkoprasismkn65.store/adminsmkn65/checkout",
            ],

            CURLOPT_HTTPHEADER => array(
                'Authorization: ' . $token
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);


        Cart::destroy($data);
        // Checkout::destroy($data);


        return redirect('/')->with('success', 'Checkout Success');
    }
}
