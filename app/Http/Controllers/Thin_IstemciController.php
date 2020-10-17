<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thin_Istemci;

class Thin_IstemciController extends Controller
{
    public function getData(Request $request){
        $thin_istemci=Thin_Istemci::findOrFail($request->id);
        return response()->json($thin_istemci);
    }
    public function update(Request $request){
        $thin_istemci=Thin_Istemci::find($request->id);
        $thin_istemci->t_no=$request->t_no;
        $thin_istemci->seri_no=$request->seri_no;
        $thin_istemci->adaptor=$request->adaptor;
        $thin_istemci->zimmet=$request->zimmet;
        $thin_istemci->mudurluk=$request->mudurluk;
        $thin_istemci->verilme_tarihi=$request->verilme_tarihi;
        $thin_istemci->durum=$request->durum;
        $thin_istemci->durum_2=$request->durum_2;
        $thin_istemci->durum=$request->durum;
        $thin_istemci->ad_soyad=$request->ad_soyad;
        $thin_istemci->ekstra=$request->ekstra;
        $thin_istemci->save();
        toastr()->success('Veri Başarıyla Güncellendi!', 'Başarılı!');
        return redirect()->back();
    }

    public function delete(Request $request){
        $thin_istemci=Thin_Istemci::find($request->id);
        $thin_istemci->delete();
        toastr()->success('Veri Başarıyla Silindi!', 'Başarılı!');
        return redirect()->back();
    }

    public function create(Request $request){
        $request->validate([
            'mudurluk'=>'required',
        ]);
        $thin_istemci=new Thin_Istemci;
        $thin_istemci->t_no=$request->t_no;
        $thin_istemci->seri_no=$request->seri_no;
        $thin_istemci->adaptor=$request->adaptor;
        $thin_istemci->zimmet=$request->zimmet;
        $thin_istemci->mudurluk=$request->mudurluk;
        $thin_istemci->verilme_tarihi=$request->verilme_tarihi;
        $thin_istemci->durum=$request->durum;
        $thin_istemci->durum_2=$request->durum_2;
        $thin_istemci->durum=$request->durum;
        $thin_istemci->ad_soyad=$request->ad_soyad;
        $thin_istemci->ekstra=$request->ekstra;
        $thin_istemci->save();
        toastr()->success('Veri Başarıyla Eklendi!', 'Başarılı!');
        return redirect()->back();
    }
}
