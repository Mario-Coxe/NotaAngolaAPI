<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('idAluno'); // Chave primária auto incremento
            $table->unsignedBigInteger('idInstituicao'); // Chave estrangeira para 'instituicoes'
            $table->unsignedBigInteger('idTurma'); // Chave estrangeira para 'turmas'
            $table->unsignedBigInteger('idEncarregado'); // Chave estrangeira para 'encarregados'
            $table->string('nome', 150);
            $table->date('dataNascimento');
            $table->enum('genero', ['Masculino', 'Femenino']);
            $table->string('BI', 50);
            $table->string('email', 100);
            $table->string('morada', 50);
            

            $table->timestamps();
         
            // Chaves estrangeiras
            $table->foreign('idInstituicao')->references('idInstituicao')->on('instituicoes');
            $table->foreign('idTurma')->references('id')->on('turmas');
            $table->foreign('idEncarregado')->references('idEncarregado')->on('encarregados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
