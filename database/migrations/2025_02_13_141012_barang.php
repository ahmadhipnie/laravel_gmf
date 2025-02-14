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
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang')->unique();
            $table->string('work_order_number');
            $table->string('owner');
            $table->string('model');
            $table->string('serial_number');
            $table->string('register_no');
            $table->date('last_inspection_date');
            $table->date('release_inspection_date');
            $table->date('next_inspection_date');

            $table->text('deskripsi');
            $table->text('manufacturer');
            $table->float('panjang');
            $table->float('lebar');
            $table->float('tinggi');

            $table->string('location');

            $table->text('img_url');

            $table->boolean('cleaning');
            $table->boolean('lubricant');
            $table->boolean('adjustment');
            $table->boolean('part_replacement');
            $table->boolean('recheck');
            $table->boolean('calibration');
            $table->boolean('modification');
            $table->boolean('repair');
            $table->string('qr_code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
