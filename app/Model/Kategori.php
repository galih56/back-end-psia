<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = "kategori";
    protected $primaryKey = "kodeKategori";
    public $incrementing=false;

	protected $fillable = [
		'kodeKategori',
        'nama'
    ];   
    public function barang(){
    	return $this->hasMany('App\Model\Barang','kategori_kodeKategori');
    }

}
