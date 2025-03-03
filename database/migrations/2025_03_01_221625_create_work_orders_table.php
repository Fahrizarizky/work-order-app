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
        Schema::create('work_orders', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_wo')->unique();
            $table->string('nama_produk');
            $table->integer('jumlah');
            $table->integer('jumlah_dikerjakan')->nullable(); // Jumlah yang telah diproses
            $table->date('tenggat_waktu');
            $table->enum('status', ['Pending','In Progress','Completed','Canceled'])->default('Pending');
            $table->text('catatan')->nullable();
            $table->foreignId('user_id')->nullable(); //Oprator yang di tugaskan
            $table->timestamp('last_updated_at')->nullable();
            $table->integer('time_spent')->default(0); // Menyimpan waktu dalam menit
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_orders');
    }
};
