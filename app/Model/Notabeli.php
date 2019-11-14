<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Notabeli extends Model
{
    protected $table = "notabeli";
    protected $primaryKey = "noNota";
    public $timestamps=false;
    public $incrementing=false;

    public function detailnotabeli(){
    	return $this->hasMany('App\Model\Detailnotabeli','noNota');
    }
    
    public function rekening(){
    	return $this->belongsTo('App\Model\Rekening','nomorRekening');
    }

    public function supplier(){
    	return $this->belongsTo('App\Model\Supplier','kodeSupplier');
    }

    public function pengirim(){
    	return $this->belongsTo('App\Model\Pengirim','kodePengirim');
    }
    public function pelanggan(){
    	return $this->belongsTo('App\Model\Pelanggan','kodePelanggan');
    }
}
