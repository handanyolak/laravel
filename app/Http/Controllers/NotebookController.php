<?php

namespace App\Http\Controllers;

use App\Models\Notebook;
use Illuminate\Http\Request;


class NotebookController extends Controller
{
    public function getData(Request $request){
        $notebook=Notebook::findOrFail($request->id);
        return response()->json($notebook);
    }

    public function update(Request $request){
        $notebook=Notebook::find($request->id);
        $notebook->sn=$request->sn;
        $notebook->marka=$request->marka;
        $notebook->ozellik=$request->ozellik;
        $notebook->zimmet=$request->zimmet;
        $notebook->mudurluk=$request->mudurluk;
        $notebook->tarih=$request->tarih;
        $notebook->aciklama=$request->aciklama;
        $notebook->ekstra=$request->ekstra;
        $notebook->save();
        toastr()->success('Veri Başarıyla Güncellendi!', 'Başarılı!');
        return redirect()->back();
    }


    public function delete(Request $request){
        $notebook=Notebook::find($request->id);
        $notebook->delete();
        toastr()->success('Veri Başarıyla Silindi!', 'Başarılı!');
        return redirect()->back();
    }

    public function create(Request $request){

        $notebook=new Notebook;
        $notebook->sn=$request->sn;
        $notebook->marka=$request->marka;
        $notebook->ozellik=$request->ozellik;
        $notebook->zimmet=$request->zimmet;
        $notebook->mudurluk=$request->mudurluk;
        $notebook->tarih=$request->tarih;
        $notebook->aciklama=$request->aciklama;
        $notebook->ekstra=$request->ekstra;
        $notebook->save();
        toastr()->success('Veri Başarıyla Eklendi!', 'Başarılı!');
        return redirect()->back();
    }
}
