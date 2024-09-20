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
        Schema::create('tb_endereco', function (Blueprint $table) {
            $table->id();
            $table->string('endereco');
            $table->string('estado');
            $table->string('cidade');
            $table->unsignedBigInteger('cliente_id')->nullable();
            $table->foreign('cliente_id')->references('id')->on('tb_cliente')->onDelete('set null');
            $table->unsignedBigInteger('representante_id')->nullable();
            $table->foreign('representante_id')->references('id')->on('tb_representante')->onDelete('set null'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_endereco');
    }
};
