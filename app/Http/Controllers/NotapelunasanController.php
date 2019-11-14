<?php

namespace App\Http\Controllers;


use App\Model\Notapelunasan;
use App\Model\Barang;

use Illuminate\Http\Request;

class NotapelunasanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function index(){
        $notalunas=Notapelunasan::all();
        return response()->json($notalunas);
    }
    public function store(Request $request){
        $npb=new Notapelunasanbeli();
        $npb->noNota=$noNota;
        $npb->tanggal=$jtp;
        $npb->caraBayar=$caraBayar;
        $npb->nominalTagihan=$total_semua;
        $npb->nomorRekening=$nomorRekening;
        $npb->nominalBayar=$nominalBayar;
        if($npb->save()){
        return response()->json(array('status'=>'sukses'));
        }else{
            dd('Gagal');
        }

    }

    public function update(Request $request){


        return response()->json(array('status'=>'sukses'));
    }

    //
}
