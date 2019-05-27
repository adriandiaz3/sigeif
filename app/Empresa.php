<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    public function estagiarios(){
   		return $this->hasMany(Estagiario::class);
   	}
}
