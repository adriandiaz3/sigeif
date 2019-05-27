<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstagiariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estagiarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('cadastro');
            $table->string('nome');
            $table->bigInteger('telefone');
            $table->string('email');
            $table->date('nascimento');
            $table->bigInteger('cpf');
            $table->bigInteger('matricula');
            $table->string('tipo_estagio');

            $table->bigInteger('curso')->unsigned();
            $table->foreign('curso')->references('id')->on('coordenadores');

        
            $table->bigInteger('endereco')->unsigned();
            $table->foreign('endereco')->references('id')->on('empresas');

            $table->date('inicial');
            $table->date('final');

            $table->string('termo_compromisso');
            $table->string('plano_estagio');
            $table->string('aditivo');
            $table->string('relatorio_atividades');
            $table->string('recisao_contrato');
            $table->integer('situacao');
            $table->string('observacao');
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
        Schema::dropIfExists('estagiarios');
    }
}
