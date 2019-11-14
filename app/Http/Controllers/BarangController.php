<?php

namespace App\Http\Controllers;

use App\Model\Barang;
use App\Model\Kategori;

use Illuminate\Http\Request;

class BarangController extends Controller
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
        $listbarang=Barang::with('Kategori')->get();
        return response()->json($listbarang);
    }

    public function show($id){
        $barang=Barang::wherekodebarang($id)->with('Kategori')->get();
        return response()->json($barang);
    }

    public function get_kategori(){
        $listkategori=Kategori::with('Barang')->get();
        return response()->json($listkategori);
    }

    public function store(Request $request){
        $kode=$request->get('kodeBarang');
        $nama=$request->get('nama');
        $hargaJual=$request->get('hargaJual');
        $hargaBeli=$request->get('hargaBeli');
        $stok=$request->get('stok');
        $kategori=$request->get('kodeKategori');

        $barang=new Barang();
        $barang->kodeBarang=$kode;
        $barang->nama=$nama;
        $barang->hargaBeli=$hargaBeli;
        $barang->hargaJual=$hargaJual;
        $barang->stok=$stok;
        $barang->kategori_kodeKategori=$kategori;

        $barang->save();
        return response()->json(array('status'=>'sukses'));
    }

    public function update(Request $request){
        $kode=$request->get('kodeBarang');
        $nama=$request->get('nama');
        $hargaJual=$request->get('hargaJual');
        $hargaBeli=$request->get('hargaBeli');
        $stok=$request->get('stok');
        $kategori=$request->get('kodeKategori');
        
        $barang=Barang::find($kode);
        $barang->kodeBarang=$kode;
        $barang->nama=$nama;
        $barang->hargaBeli=$hargaBeli;
        $barang->hargaJual=$hargaJual;
        $barang->stok=$stok;
        $barang->kategori_kodeKategori=$kategori;
        $barang->save();
        return response()->json(array('status'=>'sukses'));

    }

    public function destroy($id){
        $barang=Barang::find($id);
        $barang->delete();
        return response()->json(array('status'=>'sukses'));
    }
}
