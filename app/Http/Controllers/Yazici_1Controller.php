<?php

namespace App\Http\Controllers;

use App\Models\Yazici_1;
use Illuminate\Http\Request;

class Yazici_1Controller extends Controller
{
    public function getData(Request $request){
        $yazici_1=Yazici_1::findOrFail($request->id);
        return response()->json($yazici_1);
    }

    public function update(Request $request){
        $yazici_1=Yazici_1::find($request->id);
        $yazici_1->yazici_no=$request->yazici_no;
        $yazici_1->seri_no=$request->seri_no;
        $yazici_1->ozellik=$request->ozellik;
        $yazici_1->marka=$request->marka;
        $yazici_1->zimmet=$request->zimmet;
        $yazici_1->mudurluk=$request->mudurluk;
        $yazici_1->tarih=$request->tarih;
        $yazici_1->aciklama=$request->aciklama;
        $yazici_1->durum=$request->durum;
        $yazici_1->kod=$request->kod;
        $yazici_1->ekstra=$request->ekstra;
        $yazici_1->save();
        toastr()->success('Veri Başarıyla Güncellendi!', 'Başarılı!');
        return redirect()->back();
    }

    public function delete(Request $request){
        $yazici_1=Yazici_1::find($request->id);
        $yazici_1->delete();
        toastr()->success('Veri Başarıyla Silindi!', 'Başarılı!');
        return redirect()->back();
    }

    public function create(Request $request){
        $yazici_1= new Yazici_1;
        $yazici_1->yazici_no=$request->yazici_no;
        $yazici_1->seri_no=$request->seri_no;
        $yazici_1->ozellik=$request->ozellik;
        $yazici_1->marka=$request->marka;
        $yazici_1->zimmet=$request->zimmet;
        $yazici_1->mudurluk=$request->mudurluk;
        $yazici_1->tarih=$request->tarih;
        $yazici_1->aciklama=$request->aciklama;
        $yazici_1->durum=$request->durum;
        $yazici_1->kod=$request->kod;
        $yazici_1->ekstra=$request->ekstra;
        $yazici_1->save();
        toastr()->success('Veri Başarıyla Eklendi!', 'Başarılı!');
        return redirect()->back();
    }
}
