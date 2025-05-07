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
        Schema::create('detail_pelanggars', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_pelanggar');
            $table->bigInteger('id_pelanggaran');
            $table->bigInteger('id_user');
            $table->integer('status'); // 0=tidak perlu d tindk 1=perlu 2=sudah
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pelanggars');
    }
};
