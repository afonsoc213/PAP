<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGestoresTable extends Migration
{
    public function up()
    {
        Schema::create('gestores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); 
            $table->string('nome');
            $table->timestamps(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('gestores');
    }
};
