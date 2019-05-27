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
            $table->date('vencimento');
            $table->bigInteger('numero_convenio');
            $table->integer('quantidade_alunos');
            $table->string('razao_social');
            $table->bigInteger('cnpj');
            $table->string('endereco');
            $table->string('responsavel');
            $table->bigInteger('cpf');
            $table->bigInteger('telefone');
            $table->string('email');
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
