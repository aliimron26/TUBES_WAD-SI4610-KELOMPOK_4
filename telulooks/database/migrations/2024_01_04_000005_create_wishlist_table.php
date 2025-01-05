<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('wishlist', function (Blueprint $table) {
            $table->id('id_wishlist');
            $table->unsignedBigInteger('id_rekomendasi');
            $table->timestamps();

            $table->foreign('id_rekomendasi')
                ->references('id_rekomendasi')
                ->on('rekomendasi')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('wishlist');
    }
};
