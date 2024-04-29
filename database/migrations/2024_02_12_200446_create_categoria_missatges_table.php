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
        Schema::create('categoria_missatges', function (Blueprint $table) {
            $table->id(); // Default unsigned bigint
            $table->unsignedBigInteger('categoria_id'); // Match type of 'id' in 'categories'
            $table->unsignedBigInteger('missatge_id');   // Assuming 'missatges.id' is also unsigned bigint
            $table->timestamps();

            $table->foreign('categoria_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('missatge_id')->references('id')->on('missatges')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categoria_missatges');
    }
};
