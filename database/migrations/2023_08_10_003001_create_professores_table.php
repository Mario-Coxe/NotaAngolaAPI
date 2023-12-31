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
        Schema::create('professores', function (Blueprint $table) {
            $table->id('idProfessor');
            $table->string('nome')->unique();
            $table->string('telefone')->unique();
            $table->string('email')->unique();
            $table->string('senha')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('professores');
    }
};
