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
            $table->unsignedBigInteger('professor_id'); // Adicione esta linha
            $table->unsignedBigInteger('instituicao_id'); // Adicione esta linha
            $table->foreign('professor_id')->references('idProfessor')->on('professores');
            $table->foreign('instituicao_id')->references('idInstituicao')->on('instituicoes');
            $table->primary(['professor_id', 'instituicao_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('professor_instituicao');
    }
};