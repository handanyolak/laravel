<?php

namespace App\Http\Controllers;

use App\Models\Hurda;
use Illuminate\Http\Request;

class HurdaController extends Controller
{
    public function getData(Request $request){
        $hurda=Hurda::findOrFail($request->id);
        return response()->json($hurda);
    }

    public function update(Request $request){
        $hurda=Hurda::find($request->id);
        $hurda->esya=$request->esya;
        $hurda->seri_no=$request->seri_no;
        $hurda->adet=$request->adet;
        $hurda->ekstra=$request->ekstra;
        $hurda->save();
        toastr()->success('Veri Başarıyla Güncellendi!', 'Başarılı!');
        return redirect()->back();
    }

    public function delete(Request $request){
        $hurda=Hurda::find($request->id);
        $hurda->delete();
        toastr()->success('Veri Başarıyla Silindi!', 'Başarılı!');
        return redirect()->back();
    }

    public function create(Request $request){
        $hurda= new Hurda;
        $hurda->esya=$request->esya;
        $hurda->seri_no=$request->seri_no;
        $hurda->adet=$request->adet;
        $hurda->ekstra=$request->ekstra;
        $hurda->save();
        toastr()->success('Veri Başarıyla Eklendi!', 'Başarılı!');
        return redirect()->back();
    }
}
