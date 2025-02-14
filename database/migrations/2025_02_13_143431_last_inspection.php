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
        Schema::create('last_inspection', function (Blueprint $table) {
            $table->id();
            $table->date('date_of_last_inspection');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_barang');
            $table->enum('last_know_condition', ['good', 'damage']);
            $table->enum('functioning_properly', ['yes', 'no']);
            $table->text('notes_finding');
            $table->text('corrective_action_taken')->nullable();
            $table->text('additional_notes')->nullable();
            $table->enum('follow_up_action', ['none', 'further repair', 'replacement', 're-inspection required']);
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_barang')->references('id')->on('barangs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('last_inspection');
    }
};
