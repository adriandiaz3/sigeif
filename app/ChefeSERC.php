<?php

namespace SiGEIF;

use Illuminate\Database\Eloquent\Model;

class ChefeSERC extends Model
{
    protected $fillable = ['nome'];
    protected $table = "chefeserc";

    public $rules = [
   		'nome' => 'required|min:3',
   	];

	public $mensagens = [
		'required' => 'O preenchimento do campo :attribute é obrigatorio.',
		'min' => 'O numero de caracteres do :attribute é muito curto.',
	];
}
