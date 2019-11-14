<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = "supplier";
    protected $primaryKey = "kode";
    public $incrementing=false;

    public function notabeli(){
    	return $this->hasMany('App\Model\Notabeli','kodeSupplier');
    }
}	
