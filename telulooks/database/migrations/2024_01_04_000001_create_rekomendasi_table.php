<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('rekomendasi', function (Blueprint $table) {
            $table->id('id_rekomendasi');
            $table->string('nama_fashion', 100);
            $table->string('deskripsi_fashion', 255);
            $table->integer('harga');
            $table->string('link_affiliate_shopee', 255)->nullable();
            $table->string('link_affiliate_tokopedia', 255)->nullable();
            $table->string('link_affiliate_lazada', 255)->nullable();
            $table->string('image', 255)->nullable();
            $table->string('status', 10)->default('Upload');
            $table->string('kategori', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rekomendasi');
    }
};
