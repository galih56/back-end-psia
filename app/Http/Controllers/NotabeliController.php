<?php

namespace App\Http\Controllers;


use App\Model\Notapelunasanbeli;
use App\Model\Barang;
use App\Model\Pelanggan;
use App\Model\Pengirim;
use App\Model\Rekening;
use App\Model\Supplier;
use App\Model\Notabeli;
use App\Model\Detailnotabeli;
use Illuminate\Http\Request;

class NotabeliController extends Controller
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
        $listnotabeli= Notabeli::with('Supplier')
                                ->with('Pelanggan')
                                ->with('Pengirim')
                                ->with('Rekening')->get();
        return response()->json($listnotabeli);
    }
    public function store(Request $request){
        $noNota=md5(uniqid());
        if(strlen($noNota)>11){
            $noNota=substr($noNota,0,11);
        }
        // $idnotabeli=Notabeli::where('noNota',$noNota)->get();
       
        // $ceknota=false;
        // while(!$ceknota)->exists()){
        //     return Notabeli::where('noNota',$noNota)->exists();
        // }
        $caraBayar=$request->get('caraBayar');
        $ongkir=$request->get('ongkir');
        $dp=$request->get('ditanggungPeruhasaan');
        return $dp;
        $jtp=$request->get('jatuhTempoPelunasan');
        $noRek=$request->get('nomorRekening');
        $kodeSupplier=$request->get('kodeSupplier');
        $kodePengirim=$request->get('kodePengirim');
        $kodePelanggan=$request->get('kodePelanggan');
        $listbarang=$request->get('listbarang');

        $notabeli=new Notabeli();
        $notabeli->noNota=$noNota;
        $notabeli->ongkir=$ongkir;
        $notabeli->caraBayar=$caraBayar;
        $notabeli->ditanggungPerusahaan=$dp;
        $notabeli->jatuhTempoPelunasan=$jtp;
        if($noRek=="Tunai"){
            $notabeli->nomorRekening="000";
        }else{
            $notabeli->nomorRekening=$noRek;
        }
        $notabeli->kodeSupplier=$kodeSupplier;
        $notabeli->kodePengirim=$kodePengirim;
        $notabeli->kodePelanggan=$kodePelanggan;

        $total_semua=0;
        if($notabeli->save()){
            if(count($listbarang)>0){
                foreach ($listbarang as $item) {
                    $cekbarang=Barang::where('kodeBarang',$item["kodeBarang"])->get();
                    $total_semua=$total_semua+$item["hargaBeli"]*$item['stok'];
                    if(count($cekbarang)>0){             
                        // $barang=Barang::find($item["kodeBarang"]);      
                        // $barang->kodeBarang=$item["kodeBarang"];
                        // $barang->nama=$item["nama"];
                        // $barang->stok=$item["stok"];
                        // $barang->save();    
                        $detailnota=new Detailnotabeli();
                        $detailnota->kodeBarang=$item["kodeBarang"];
                        $detailnota->noNota=$noNota;
                        $detailnota->jumlah=$item["stok"];
                        $detailnota->harga=$item["hargaBeli"]*$item['stok'];
                        $detailnota->save();
                    }else{
                        $barang=new Barang();
                        $barang->kodeBarang=$item["kodeBarang"];
                        $barang->nama=$item["nama"];
                        $barang->hargaJual   =$item["hargaJual"];
                        $barang->hargaBeli=$item["hargaBeli"];
                        $barang->kategori_kodeKategori=$item["kodeKategori"];
                        $barang->save();  

                        $detailnota=new Detailnotabeli();
                        $detailnota->kodeBarang=$item["kodeBarang"];
                        $detailnota->noNota=$noNota;
                        $detailnota->jumlah=$item["stok"];
                        $detailnota->harga=$item["hargaBeli"]*$item['stok'];
                        $detailnota->save();
                    }
                }
            }
            $notabeli=Notabeli::find($noNota);
            $notabeli->total=$total_semua;
            $notabeli->save();
        }else{
            dd('Gagal menyimpan');
        }
        return response()->json(array('status'=>'sukses'));
    }

    public function update(Request $request){


        return response()->json(array('status'=>'sukses'));
    }

    public function get_pelanggan(){
        $listpelanggan=Pelanggan::all();

        return response()->json($listpelanggan);
    }

    public function get_supplier(){
        $listsupplier=Supplier::all();
        return response()->json($listsupplier);

    }
    public function get_rekening(){
        $listrekening=Rekening::all();
        return response()->json($listrekening);
    }
    public function get_pengirim(){
        $listpengirim=Pengirim::all();
        return response()->json($listpengirim);
    }
   
    public function get_barang($id){
        $listbarang=Detailnotabeli::where('noNota',$id)->with('Barang')->get();
        return response()->json($listbarang);
    }
    //
}
