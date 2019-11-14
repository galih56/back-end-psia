<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = "pelanggan";
    protected $primaryKey = "kode";
    public $incrementing=false;

    public function notabeli(){
    	return $this->hasMany('App\Model\Notabeli','kodePelanggan');
    }

}
