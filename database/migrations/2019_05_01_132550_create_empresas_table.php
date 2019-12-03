<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('vencimento')->nullable();
            $table->string('numero_convenio')->nullable();
            $table->integer('quantidade_alunos');
            $table->string('razao_social');
            $table->bigInteger('cnpj')->nullable();
            $table->string('endereco')->nullable();
            $table->string('responsavel')->nullable();
            $table->bigInteger('cpf')->nullable();
            $table->string('telefone')->nullable();
            $table->string('email')->nullable();
            $table->integer('status')->default(1)->nullable();
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
        Schema::dropIfExists('empresas');
    }
}
