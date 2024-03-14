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
            $table->unsignedBigInteger('media_id')->nullable();
            $table->unsignedBigInteger('usuari_id');
            $table->timestamps();

            $table->foreign('media_id')->references('id')->on('media')
                ->onDelete('set null'); // Si una película es eliminada, se establece a null en lugar de borrar el chat.
            $table->foreign('usuari_id')->references('id')->on('users')
                ->onDelete('cascade'); // Si un usuario es eliminado, se eliminan todos sus chats.
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
