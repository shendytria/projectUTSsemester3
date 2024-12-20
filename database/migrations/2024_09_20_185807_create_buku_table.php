<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->increments('id_buku');
            $table->string('kode_buku', 100);
            $table->string('judul_buku', 500);
            $table->string('pengarang_buku', 200);
            $table->unsignedBigInteger('id_kategori'); // Foreign key should not be auto-increment

            // Assuming there is a 'kategori_buku' table and 'idkategori_buku' is the primary key in it
            $table->foreign('id_kategori')->references('id_kategori')->on('kategori');
            $table->timestamps(); // Untuk created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};
