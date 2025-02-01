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
        Schema::create('armas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('nome');
            $table->unsignedInteger('atk_base');
            $table->unsignedInteger('taxa');
            $table->unsignedInteger('dano');
            $table->string('afetado');
            $table->unsignedInteger('quantidade');
            $table->unsignedInteger('tempo');
            $table->unsignedInteger('quantidade_de_vezes_que_pode_usar');
            $table->text('descricao_efeito')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('armas');
    }
};
