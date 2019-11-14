<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Detailnotabeli extends Model
{
    protected $table = "detailnotabeli";
    protected $primaryKey = ["kodeBarang","noNota"];
    public $incrementing=false;
    public $timestamps=false;

    public function notabeli(){
    	return $this->belongsToMany('App\Model\Notabeli','noNota');
    }

    public function barang(){
    	return $this->belongsTo('App\Model\Barang','kodeBarang');
    }
}
