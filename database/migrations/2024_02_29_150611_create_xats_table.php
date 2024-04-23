<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('xats', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('descripcio');
            $table->string('url')->nullable();
            $table->string('password')->nullable();
            $table->string('foto')->nullable();
            $table->string('tipus')->nullable();
            $table->string('privacitat')->nullable();
            $table->string('idioma')->nullable();
            $table->unsignedBigInteger('media_id')->nullable(); // Haz que media_id sea nullable
            $table->foreign('media_id')->references('id')->on('media')
                ->onDelete('set null'); // Cambia onDelete a set null
            $table->foreignId('creador_id')->constrained('users')
                ->onDelete('cascade'); // Si un usuario es eliminado, se eliminan todos sus chats.
            $table->unsignedBigInteger('xatinteractiu_id')->unique(); // Asegúrate de que es única para garantizar una relación 1 a 1
            $table->foreign('xatinteractiu_id')->references('id')->on('xatinteractius')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('xats');
    }
};
