<?php

namespace SiGEIF;

use Illuminate\Database\Eloquent\Model;

class Estagiario extends Model
{
	protected $guarded=[];
   public function contratos(){
         return $this->hasMany(Contrato::class);
   }

   public function coordenador() {
      return $this->belongsTo(Coordenador::class);
   }

	public $rules = [
   		'nome' => 'required|min:3',
   		'matricula' => 'required|min:3|max:30',
   		'telefone' => 'required|min:3|max:30',
   		'cpf' => 'required|min:11|max:11',
   	];

	public $mensagens = [
		'required' => 'O preenchimento do campo :attribute é obrigatorio.',
		'max' => 'Numero de caracteres excedido.',
		'min' => 'O numero de caracteres do :attribute é muito curto.',
	];	
}
