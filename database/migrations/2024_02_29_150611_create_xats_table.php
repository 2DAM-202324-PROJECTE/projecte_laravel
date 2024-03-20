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
            $table->unsignedBigInteger('media_id');
            $table->foreign('media_id')->references('id')->on('media')
                ->onDelete('cascade'); // Si una película es eliminada, se establece a null en lugar de borrar el chat.
            $table->foreignId('creador_id')->constrained('users')
                ->onDelete('cascade'); // Si un usuario es eliminado, se eliminan todos sus chats.
            $table->timestamps();

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
