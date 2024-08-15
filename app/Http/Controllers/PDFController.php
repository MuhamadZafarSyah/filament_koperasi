<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function downloadPDF()
    {
        $penjualan = Penjualan::with('product')->get();

        Carbon::setLocale('id');

        // Mendapatkan tanggal hari ini
        $tanggal = Carbon::now();

        $hari = $tanggal->translatedFormat('l');


        $pdf = pdf::loadView('penjualanPDF', compact('penjualan', 'hari', 'tanggal'));
        return $pdf->stream('penjualan.pdf');
    }
}
