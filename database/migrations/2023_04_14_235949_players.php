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
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('desc', 500)->nullable();
            $table->integer('numero')->nullable();
            $table->string('avatar')->default('defaultAvatar');
            $table->string('posicion1');
            $table->string('posicion2')->nullable();
            $table->string('posicion3')->nullable();
            $table->string('posicion4')->nullable();
            $table->integer('skill')->nullable();
            $table->boolean('diestro')->default(true);
            $table->boolean('zurdo')->default(false);
            $table->integer('goals')->default(0);
            $table->integer('assists')->default(0);
            $table->integer('shutout')->nullable(); //valla invicta
            $table->integer('amountGames')->default(0);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
