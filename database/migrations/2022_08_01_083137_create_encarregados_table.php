<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('encarregados', function (Blueprint $table) {
            $table->id('idEncarregado'); // Chave primária auto incremento
            $table->string('nome', 100)->unique();
            $table->enum('parentesco', ['Pai', 'Mãe', 'Tio', 'Tia', 'Avó', 'Outro'])->unique();
            $table->string('telefone', 200)->unique();
            $table->string('email', 100)->unique(); // Definir 'email' como UNIQUE
            $table->string('senha', 100)->unique(); // Coluna para armazenar a senha (não armazene senhas em texto puro no banco de dados, utilize algum método de hash para armazenar senhas com segurança)
            //$table->integer('Instituicao')->nullable();
            $table->timestamps();

            // Adicione a chave estrangeira
            //$table->foreign('Instituicao')->references('idInstituicao')->on('instituicoes');
        });



        // Adicionar chave única para o campo 'email'
        // Schema::table('encarregados', function (Blueprint $table) {
        //     $table->unique('email');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('encarregados');
    }
};