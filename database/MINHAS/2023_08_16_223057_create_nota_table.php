<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alunoId');
            $table->unsignedBigInteger('disciplinaId');
            $table->enum('trimestre', [1, 2, 3]); // Defining the enum for trimestre
            $table->integer('mac')->unsigned()->default(0)->nullable();
            $table->integer('pp')->unsigned()->default(0)->nullable();
            $table->integer('pt')->unsigned()->default(0)->nullable();
            $table->integer('mt')->unsigned()->default(0)->nullable();
            $table->decimal('mt1', 5, 2)->unsigned()->nullable();
            $table->decimal('mt2', 5, 2)->unsigned()->nullable();
            $table->decimal('mt3', 5, 2)->unsigned()->nullable();
            $table->decimal('mfd', 5, 2)->unsigned()->nullable();
            $table->integer('faltas');
            $table->timestamps();

            $table->foreign('alunoId')->references('idAluno')->on('students')->onDelete('cascade');
            $table->foreign('disciplinaId')->references('id')->on('disciplinas')->onDelete('cascade');
        });


        //Trimestre: O trimestre ao qual as notas se referem (1º, 2º, 3º).
        // MAC: Média de Avaliações Contínuas (ou similar, dependendo das suas regras).// PP: Prova Prática.
        // PT: Prova Teórica.
        // MT: Média Trimestral.
        // FALTAS: Número de faltas do aluno.
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notas');
    }
};