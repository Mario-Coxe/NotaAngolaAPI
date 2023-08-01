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
            $table->string('nome', 150);
            $table->string('localizacao', 200);
            $table->string('telefone', 50)->unique(); // Definir 'telefone' como UNIQUE
            $table->string('email', 100)->unique(); // Definir 'email' como UNIQUE
            $table->bigInteger('encarregado')->unsigned()->nullable();
            $table->string('status', 10)->default('Activa');

            // Adicione a chave estrangeira
            $table->foreign('encarregado')->references('idEncarregado')->on('encarregados');
            
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
