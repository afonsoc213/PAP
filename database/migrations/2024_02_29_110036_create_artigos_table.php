// create_artigos_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtigosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artigos', function (Blueprint $table) {
            $table->id(); // Corrigindo para o padrão 'id'
            $table->string('nome_artigo');
            $table->text('descricao_artigo')->nullable();
            $table->integer('quantidade_artigo');
            $table->decimal('preco_artigo', 10, 2);
            $table->string('foto_artigo')->nullable(); 
            $table->string('medida_artigo')->nullable();
            $table->string('cor_artigo')->nullable();
            $table->string('serial_number')->unique()->nullable();
            $table->unsignedBigInteger('gestor_id');
            $table->foreign('gestor_id')->references('id')->on('gestores')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artigos');
    }
}
