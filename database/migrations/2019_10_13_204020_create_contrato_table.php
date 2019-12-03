<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrato', function (Blueprint $table) {
            $table->bigIncrements('contrato_id');
            $table->date('cadastro')->nullable();
            $table->integer('tipo_estagio')->nullable();
            $table->integer('situacao');

            $table->bigInteger('estagiario')->unsigned()->nullable();
            $table->foreign('estagiario')->references('id')->on('estagiarios');
        
            $table->bigInteger('empresa')->unsigned()->nullable();
            $table->foreign('empresa')->references('id')->on('empresas');

            $table->date('inicial')->nullable();
            $table->date('final')->nullable();
            $table->date('termo_compromisso')->nullable();
            $table->date('plano_estagio')->nullable();
            $table->date('aditivo')->nullable();
            $table->date('relatorio_atividades')->nullable();
            $table->date('recisao_contrato')->nullable();
            $table->string('observacao')->nullable();
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
        Schema::dropIfExists('contrato');
    }
}
