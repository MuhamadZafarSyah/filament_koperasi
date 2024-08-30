<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
            $table->string('img_bukti_transfer');
            $table->integer('total_harga');
            $table->string('kode_bukti');
            $table->string('nama_pembeli');
            $table->string('kelas_pembeli');
            $table->string('nama_barang');
            $table->string('harga_barang');
            $table->enum('status', ['Pending', 'Success'])->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkouts');
    }
};
