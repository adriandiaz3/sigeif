<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coordenador extends Model
{

	protected $table = "coordenadores";
    public function estagiarios(){
   		return $this->hasMany(Estagiario::class);
   	}
}
