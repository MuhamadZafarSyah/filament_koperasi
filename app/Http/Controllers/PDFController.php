<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Mail\MailSend;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;

class PDFController extends Controller
{
    public function downloadPDF()
    {
        $penjualan = Penjualan::with('product')->get();

        $tanggal = Carbon::now();
        $hari = $tanggal->translatedFormat('d F Y');

        $pdf = pdf::loadView('penjualanPDF', compact('penjualan', 'hari', 'tanggal'));

        $details = [
            'title' => 'Laporan Penjualan Koprasi Pada: ' . $hari . ' ' . $tanggal,
            'body' => 'Ini adalah laporan penjualan koprasi pada hari ' . $hari . ' ' . $tanggal
        ];

        Mail::to('zaparsyah@gmail.com')->send(new MailSend($details));

        return $pdf->stream('penjualan' . $hari . ' ' . $tanggal . '.pdf');
    }
}
