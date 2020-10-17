<?php

namespace App\Http\Controllers;

use App\Models\Monitor_Yeni;
use Illuminate\Http\Request;

class MonitorYeniController extends Controller
{
    public function getData(Request $request){
        $monitor_yeni=Monitor_Yeni::findOrFail($request->id);
        return response()->json($monitor_yeni);
    }

    public function update(Request $request){
        $monitor_yeni=Monitor_Yeni::find($request->id);
        $monitor_yeni->monitor_no=$request->monitor_no;
        $monitor_yeni->ozellik=$request->ozellik;
        $monitor_yeni->marka=$request->marka;
        $monitor_yeni->zimmet=$request->zimmet;
        $monitor_yeni->mudurluk=$request->mudurluk;
        $monitor_yeni->verilme_tarihi=$request->verilme_tarihi;
        $monitor_yeni->firma=$request->firma;
        $monitor_yeni->alinma_tarihi=$request->alinma_tarihi;
        $monitor_yeni->seri_no=$request->seri_no;
        $monitor_yeni->durum=$request->durum;
        $monitor_yeni->ekstra=$request->ekstra;
        $monitor_yeni->ekstra_2=$request->ekstra_2;
        $monitor_yeni->save();
        toastr()->success('Veri Başarıyla Güncellendi!', 'Başarılı!');
        return redirect()->back();
    }

    public function delete(Request $request){
        $monitor_yeni=Monitor_Yeni::find($request->id);
        $monitor_yeni->delete();
        toastr()->success('Veri Başarıyla Silindi!', 'Başarılı!');
        return redirect()->back();
    }

    public function create(Request $request){
        $request->validate([
            'mudurluk'=>'required',
        ]);
        $monitor_yeni=new Monitor_Yeni;
        $monitor_yeni->monitor_no=$request->monitor_no;
        $monitor_yeni->ozellik=$request->ozellik;
        $monitor_yeni->marka=$request->marka;
        $monitor_yeni->zimmet=$request->zimmet;
        $monitor_yeni->mudurluk=$request->mudurluk;
        $monitor_yeni->verilme_tarihi=$request->verilme_tarihi;
        $monitor_yeni->firma=$request->firma;
        $monitor_yeni->alinma_tarihi=$request->alinma_tarihi;
        $monitor_yeni->seri_no=$request->seri_no;
        $monitor_yeni->durum=$request->durum;
        $monitor_yeni->ekstra=$request->ekstra;
        $monitor_yeni->ekstra_2=$request->ekstra_2;
        $monitor_yeni->save();
        toastr()->success('Veri Başarıyla Eklendi!', 'Başarılı!');
        return redirect()->back();
    }
}
