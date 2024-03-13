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
        Schema::create('xat', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('descripcio');
            $table->string('url')->nullable();
            $table->string('password')->nullable();
            $table->string('foto')->nullable();
            $table->string('tipus')->nullable();
            $table->string('privacitat')->nullable();
            $table->string('idioma')->nullable();
            $table->unsignedInteger('usuari_id')->nullable();
            $table->timestamps();
            $table->foreign('usuari_id')->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('xat');
    }
};
