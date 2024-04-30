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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('xatinteractiu_id');
            $table->foreign('xatinteractiu_id')->references('id')->on('xatinteractius');

            $table->unsignedBigInteger('sender_id'); //uuid de la persona que envia el missatge
            $table->foreign('sender_id')->references('id')->on('users');

//            $table->unsignedBigInteger('receiver_id');
//            $table->foreign('receiver_id')->references('id')->on('users');

//            $table->timestamp('read_id')->nullable();

            //delete actions
//            $table->timestamp('receiver_deleted_at')->nullable();
//            $table->timestamp('sender_deleted_at')->nullable();

            $table->text('body')->nullable();

            //lligar aquesta taula amb la taula amb xatinteractiu
            //crear o recuperar un xatinteractiu i tots els missatges que hi hagi
            //crear un xatinteractiu amb un missatge
            //recuperar un xatinteractiu amb tots els missatges



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
