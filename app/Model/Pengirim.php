<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pengirim extends Model
{
    protected $table = "pengirim";
    protected $primaryKey = "kode";
    public $incrementing=false;

    public function notabeli(){
    	return $this->hasMany('App\Model\Notabeli','kodePengirim');
    }
}
