<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Rekening extends Model
{
    protected $table = "rekening";
    protected $primaryKey = "nomor";
    public $incrementing=false;
 	
 	public function notabeli(){
    	return $this->hasMany('App\Model\Notabeli','nomorRekening');
    }

 	public function notapelunasan(){
    	return $this->hasMany('App\Model\Notabeli','nomorRekening');
    }
}
