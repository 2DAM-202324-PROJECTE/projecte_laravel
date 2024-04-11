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
            $table->id();
            $table->unsignedInteger('categoria_id');
            $table->unsignedInteger('missatge_id');
            $table->timestamps();

            $table->foreign('categoria_id')->references('id')
                ->on('categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('missatge_id')->references('id')
                ->on('missatges')->onUpdate('cascade')->onDelete('cascade');
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
