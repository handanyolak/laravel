<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class GirisController extends Controller
{
    public function giris()
    {
        return view('giris_sayfam');
    }

    public function girisPost(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            toastr()->success('Başarıyla Giriş Yapıldı!', 'Başarılı!');
            return redirect()->route('notebook');
        }
        else
        {
            toastr()->error('Hatalı Email veya Şifre!', 'Başarısız!');
            return redirect()->route('giris');
        }
    }

    public function cikis()
    {
        Auth::logout();
        toastr()->success('Çıkış Yapıldı!', 'Başarılı!');
        return redirect()->route('giris');
    }
}
