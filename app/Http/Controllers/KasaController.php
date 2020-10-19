<?php

namespace App\Http\Controllers;

use App\Models\Kasa;
use Illuminate\Http\Request;

class KasaController extends Controller
{
    public function getData(Request $request){
        $kasa=Kasa::findOrFail($request->id);
        return response()->json($kasa);
    }

    public function update(Request $request){
        $kasa=Kasa::find($request->id);
        $kasa->pc_no=$request->pc_no;
        $kasa->islemci=$request->islemci;
        $kasa->ozellik=$request->ozellik;
        $kasa->zimmet=$request->zimmet;
        $kasa->mudurluk=$request->mudurluk;
        $kasa->verilme_tarihi=$request->verilme_tarihi;
        $kasa->firma=$request->firma;
        $kasa->alinma_tarihi=$request->alinma_tarihi;
        $kasa->durum=$request->durum;
        $kasa->marka=$request->marka;
        $kasa->ekstra=$request->ekstra;
        $kasa->save();
        toastr()->success('Veri Başarıyla Güncellendi!', 'Başarılı!');
        return redirect()->back();
    }

    public function delete(Request $request){
        $kasa=Kasa::find($request->id);
        $kasa->delete();
        toastr()->success('Veri Başarıyla Silindi!', 'Başarılı!');
        return redirect()->back();
    }

    public function create(Request $request){
        $kasa= new Kasa;
        $kasa->pc_no=$request->pc_no;
        $kasa->islemci=$request->islemci;
        $kasa->ozellik=$request->ozellik;
        $kasa->zimmet=$request->zimmet;
        $kasa->mudurluk=$request->mudurluk;
        $kasa->verilme_tarihi=$request->verilme_tarihi;
        $kasa->firma=$request->firma;
        $kasa->alinma_tarihi=$request->alinma_tarihi;
        $kasa->durum=$request->durum;
        $kasa->marka=$request->marka;
        $kasa->ekstra=$request->ekstra;
        $kasa->save();
        toastr()->success('Veri Başarıyla Eklendi!', 'Başarılı!');
        return redirect()->back();
    }
}
