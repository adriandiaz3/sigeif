<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estagiario extends Model
{
    public function coordenador() {
		return $this->belongsTo(Coordenador::class);
	}

	public function empresa() {
		return $this->belongsTo(Empresa::class);
	}
}
