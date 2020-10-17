<?php

namespace App\Http\Controllers;

use App\Models\Monitor;
use Illuminate\Http\Request;

class MonitorController extends Controller
{
    public function getData(Request $request){
        $monitor=Monitor::findOrFail($request->id);
        return response()->json($monitor);
    }

    public function update(Request $request){
        $monitor=Monitor::find($request->id);
        $monitor->sira_no=$request->sira_no;
        $monitor->mudurluk=$request->mudurluk;
        $monitor->ad_soyad=$request->ad_soyad;
        $monitor->alindi=$request->alindi;
        $monitor->boyut=$request->boyut;
        $monitor->verildi=$request->verildi;
        $monitor->marka=$request->marka;
        $monitor->ekstra=$request->ekstra;
        $monitor->save();
        toastr()->success('Veri Başarıyla Güncellendi!', 'Başarılı!');
        return redirect()->back();
    }

    public function delete(Request $request){
        $monitor=Monitor::find($request->id);
        $monitor->delete();
        toastr()->success('Veri Başarıyla Silindi!', 'Başarılı!');
        return redirect()->back();
    }

    public function create(Request $request){
        $request->validate([
            'mudurluk'=>'required',

        ]);
        $monitor=new Monitor;
        $monitor->sira_no=$request->sira_no;
        $monitor->mudurluk=$request->mudurluk;
        $monitor->ad_soyad=$request->ad_soyad;
        $monitor->alindi=$request->alindi;
        $monitor->boyut=$request->boyut;
        $monitor->verildi=$request->verildi;
        $monitor->marka=$request->marka;
        $monitor->ekstra=$request->ekstra;
        $monitor->save();
        toastr()->success('Veri Başarıyla Eklendi!', 'Başarılı!');
        return redirect()->back();
    }
}
