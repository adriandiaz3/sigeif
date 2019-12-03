<?php

namespace SiGEIF;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
	protected $guarded=[];
    public function contratos(){
   		return $this->hasMany(Contrato::class);
   	}

   	public $rules = [
   		'razao_social' => 'required|min:3',
   		'cnpj' => 'required|min:14|max:14',
   		'email' => 'required|min:3',
   		'telefone' => 'required|min:3|max:30',
   		'endereco' => 'required|min:3|max:100',
   		'responsavel' => 'required|min:3|max:50',
   		'cpf' => 'required|min:11|max:11',
   	];

   	public $mensagens = [
   		'required' => 'O preenchimento do campo :attribute é obrigatorio.',
   		'max' => 'Numero de caracteres excedido.',
   		'min' => 'O numero de caracteres do :attribute é muito curto.',
   	];
}
