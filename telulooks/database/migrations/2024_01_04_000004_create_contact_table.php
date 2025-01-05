<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('contact', function (Blueprint $table) {
            $table->id('id_pesan');
            $table->string('nama_pengirim', 100);
            $table->text('subjek');
            $table->text('isi_pesan');
            $table->string('status', 10)->default('Terkirim');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contact');
    }
};
