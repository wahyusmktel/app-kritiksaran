<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('kritik_sarans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('no_ticket')->unique();
            $table->string('nama_lengkap');
            $table->string('status_pengirim');
            $table->foreignUuid('kategori')->constrained('unit_tujuan')->onDelete('cascade');
            $table->text('isi_kritik_saran');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kritik_sarans');
    }
};
