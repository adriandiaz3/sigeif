<?php

namespace SiGEIF;

use Illuminate\Database\Eloquent\Model;

class Coordenador extends Model
{

	protected $table = "coordenadores";
	protected $guarded=[];
   public function estagiarios(){
         return $this->hasMany(Estagiario::class);
   }

   	public $rules = [
   		'nome' => 'required|min:3',
   		'curso' => 'required|min:3',
   		'email' => 'required|min:3',
   		'telefone' => 'required|min:3',
   		'coordenador_estagio' => 'required',
   	];

   	public $mensagens = [
   		'required' => "O preenchimento do campo :attribute é obrigatorio!",
   		'min' => "O :attribute deve ser mais longo!",
   		'telefone.min' => "O numero de telefone não foi preenchido por completo!",
   	];
}
