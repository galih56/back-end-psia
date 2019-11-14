<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Notapelunasanbeli extends Model
{
    protected $table = "notapelunasanbeli";
    protected $primaryKey = "noNota";
    public $incrementing=false;

    public function notabeli(){
    	return $this->belongsTo('App\Model\Notabeli','noNotaBeli');
    }

    public function rekening(){
    	return $this->belongsTo('App\Model\Rekening','nomorRekening');
    }

}
