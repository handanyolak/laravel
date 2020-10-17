<?php

namespace App\Http\Controllers;

use App\Models\Yazici_2;
use Illuminate\Http\Request;

class Yazici_2Controller extends Controller
{
    public function getData(Request $request){
        $yazici_2=Yazici_2::findOrFail($request->id);
        return response()->json($yazici_2);
    }

    public function update(Request $request){
        $yazici_2=Yazici_2::find($request->id);
        $yazici_2->yazici_no=$request->yazici_no;
        $yazici_2->seri_no=$request->seri_no;
        $yazici_2->ozellik=$request->ozellik;
        $yazici_2->marka=$request->marka;
        $yazici_2->zimmet=$request->zimmet;
        $yazici_2->mudurluk=$request->mudurluk;
        $yazici_2->tarih=$request->tarih;
        $yazici_2->aciklama=$request->aciklama;
        $yazici_2->kod=$request->kod;
        $yazici_2->ekstra=$request->ekstra;
        $yazici_2->save();
        toastr()->success('Veri Başarıyla Güncellendi!', 'Başarılı!');
        return redirect()->back();
    }

    public function delete(Request $request){
        $yazici_2=Yazici_2::find($request->id);
        $yazici_2->delete();
        toastr()->success('Veri Başarıyla Silindi!', 'Başarılı!');
        return redirect()->back();
    }

    public function create(Request $request){
        $request->validate([
            'mudurluk'=>'required',
        ]);
        $yazici_2= new Yazici_2;
        $yazici_2->yazici_no=$request->yazici_no;
        $yazici_2->seri_no=$request->seri_no;
        $yazici_2->ozellik=$request->ozellik;
        $yazici_2->marka=$request->marka;
        $yazici_2->zimmet=$request->zimmet;
        $yazici_2->mudurluk=$request->mudurluk;
        $yazici_2->tarih=$request->tarih;
        $yazici_2->aciklama=$request->aciklama;
        $yazici_2->kod=$request->kod;
        $yazici_2->ekstra=$request->ekstra;
        $yazici_2->save();
        toastr()->success('Veri Başarıyla Güncellendi!', 'Başarılı!');
        return redirect()->back();
    }
}
