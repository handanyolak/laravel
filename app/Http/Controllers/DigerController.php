<?php

namespace App\Http\Controllers;

use App\Models\Diger;
use Illuminate\Http\Request;

class DigerController extends Controller
{
    public function getData(Request $request){
        $diger=Diger::findOrFail($request->id);
        return response()->json($diger);
    }

    public function update(Request $request){
        $diger=Diger::find($request->id);
        $diger->no=$request->no;
        $diger->marka=$request->marka;
        $diger->zimmet=$request->zimmet;
        $diger->aciklama=$request->aciklama;
        $diger->verilme_tarihi=$request->verilme_tarihi;
        $diger->firma=$request->firma;
        $diger->alinma_tarihi=$request->alinma_tarihi;
        $diger->durum=$request->durum;
        $diger->ekstra=$request->ekstra;
        $diger->ekstra_2=$request->ekstra_2;
        $diger->save();
        toastr()->success('Veri Başarıyla Güncellendi!', 'Başarılı!');
        return redirect()->back();
    }

    public function delete(Request $request){
        $diger=Diger::find($request->id);
        $diger->delete();
        toastr()->success('Veri Başarıyla Silindi!', 'Başarılı!');
        return redirect()->back();
    }

    public function create(Request $request){
        $diger= new Diger;
        $diger->no=$request->no;
        $diger->marka=$request->marka;
        $diger->zimmet=$request->zimmet;
        $diger->aciklama=$request->aciklama;
        $diger->verilme_tarihi=$request->verilme_tarihi;
        $diger->firma=$request->firma;
        $diger->alinma_tarihi=$request->alinma_tarihi;
        $diger->durum=$request->durum;
        $diger->ekstra=$request->ekstra;
        $diger->ekstra_2=$request->ekstra_2;
        $diger->save();
        toastr()->success('Veri Başarıyla Eklendi!', 'Başarılı!');
        return redirect()->back();
    }
}
