<?php

namespace SiGEIF;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
	protected $guarded=[];
	protected $primaryKey = 'contrato_id';
	protected $table = "contrato";
	public function empresa() {
		return $this->belongsTo(Empresa::class);
	}

	public function estagiario() {
		return $this->belongsTo(Estagiario::class);
	}
}
