<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('tanggapan_kritik_saran', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('kritik_saran_id');
            $table->uuid('admin_id');
            $table->text('tanggapan');
            $table->timestamps();

            $table->foreign('kritik_saran_id')->references('id')->on('kritik_sarans')->onDelete('cascade');
            $table->foreign('admin_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tanggapan_kritik_saran');
    }
};
