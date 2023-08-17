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
        Schema::create('cliente_models', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 80)->nublable(false);
            $table->string('cpf', 11)->unique()->nublable(false);
            $table->string('celular', 15)->nublable(true);
            $table->string('email', 100)->unique()->nublable(false);
            $table->string('password')->nublable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cliente_models');
    }
};
