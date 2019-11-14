<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = "barang";
    public $timestamps = false;
    public $incrementing=false;
    protected $primaryKey = "kodeBarang";

    protected $fillable = [
        'kodeBarang',
        'nama',
        'hargaJual',
        'hargaBeli',
        'stok',
        'kodeKategori'
    ];   

    public function detailnotabeli(){
    	return $this->hasMany('App\Model\Detailnotabeli','noNota');
    }

    public function kategori(){
    	return $this->belongsTo('App\Model\Kategori','kategori_kodeKategori');
    }

}
