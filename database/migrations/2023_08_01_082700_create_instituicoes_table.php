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
        Schema::create('instituicoes', function (Blueprint $table) {
            $table->id('idInstituicao'); // Tornar o campo 'idInstituicao' auto incremento e primary key
            $table->bigInteger('idEncarregado')->unsigned()->nullable();
            $table->string('nome', 150);
            $table->string('localizacao', 200)->unique();;
            $table->string('telefone', 50); // Definir 'telefone' como UNIQUE
            $table->string('email', 100); // Definir 'email' como UNIQUE
            $table->string('status', 1)->default('1');

            // Adicione a chave estrangeira
            $table->foreign('idEncarregado')->references('idEncarregado')->on('encarregados');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instituicoes');
    }
};
