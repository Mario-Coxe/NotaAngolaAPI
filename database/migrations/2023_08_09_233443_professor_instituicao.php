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
        Schema::create('professor_instituicao', function (Blueprint $table) {
            $table->unsignedBigInteger('professorId'); // Adicione esta linha
            $table->unsignedBigInteger('instituicaoId'); // Adicione esta linha
            $table->foreign('professorId')->references('idProfessor')->on('professores');
            $table->foreign('instituicaoId')->references('idInstituicao')->on('instituicoes');
            $table->primary(['professorId', 'instituicaoId']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('professor_instituicao');
    }
};