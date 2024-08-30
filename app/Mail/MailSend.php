<?php

namespace App\Mail;

use Carbon\Carbon;
use App\Models\Penjualan;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailSend extends Mailable
{
    use Queueable, SerializesModels;

    public $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.\
     *
     * @return $this
     */
    public function build()
    {
        Carbon::setLocale('id');

        // Mendapatkan tanggal hari ini
        $tanggal = Carbon::now();
        $hari = $tanggal->translatedFormat('d F Y');

        // Membuat PDF dari view
        $penjualan = Penjualan::with('product')->get();

        $pdf = Pdf::loadView('penjualanPDF', compact('penjualan', 'hari', 'tanggal'));

        return $this->subject('Laporan Penjualan Koprasi Pada: ' . $hari . ' ' . $tanggal)
            ->view('email')
            ->attachData($pdf->output(), 'penjualan.pdf', [
                'mime' => 'application/pdf',
            ]);
    }
}
