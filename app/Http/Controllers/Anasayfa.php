<?php

namespace App\Http\Controllers;


use App\Models\Monitor_Yeni;
use App\Models\Notebook;
use App\Models\Thin_Istemci;
use App\Models\Kategori;
use App\Models\Diger;
use App\Models\Monitor;
use App\Models\Kasa;
use App\Models\Hurda;
use App\Models\Yazici_1;
use App\Models\Yazici_2;
use App\Models\Mudurlukler;
use Illuminate\Http\Request;


class Anasayfa extends Controller
{
    public function __construct () {
        view()->share('kategoriler', Kategori::all());
    }

    public function iletisim() {
        return view('iletisim');
    }

    public function kurumsal() {
        return view('kurumsal');
    }

    public function vizyonumuz() {
        return view('vizyonumuz');
    }

    public function diger_fonksiyon() {
        $diger_tablos  =   Diger::all();
        return view('diger_sayfam', compact('diger_tablos'));
    }

    public function monitor_fonksiyon() {
        $monitor_tablos  =   Monitor::all();
        $mudurlukler_tablos = Mudurlukler::all();
        return view('monitor_sayfam', compact('monitor_tablos','mudurlukler_tablos'));
    }

    public function kasa_fonksiyon() {
        $kasa_tablos  =   Kasa::all();
        $mudurlukler_tablos = Mudurlukler::all();
        return view('kasa_sayfam', compact('kasa_tablos', 'mudurlukler_tablos'));
    }

    public function hurda_fonksiyon() {
        $hurda_tablos  =   Hurda::all();
        return view('hurda_sayfam', compact('hurda_tablos'));
    }

    public function notebook_fonksiyon() {
        $notebook_tablos  =   Notebook::all();
        $mudurlukler_tablos = Mudurlukler::all();
        return view('notebook_sayfam', compact('notebook_tablos', 'mudurlukler_tablos'));
    }

    public function thin_istemci_fonksiyon() {
        $thin_istemci_tablos  =   Thin_Istemci::all();
        $mudurlukler_tablos = Mudurlukler::all();
        return view('thin_istemci_sayfam', compact('thin_istemci_tablos', 'mudurlukler_tablos'));
    }

    public function monitor_yeni_fonksiyon() {
        $monitor_yeni_tablos  =   Monitor_Yeni::all();
        $mudurlukler_tablos = Mudurlukler::all();
        return view('monitor_yeni_sayfam', compact('monitor_yeni_tablos', 'mudurlukler_tablos'));
    }

    public function yazici_1_fonksiyon() {
        $yazici_1_tablos  =   Yazici_1::all();
        $mudurlukler_tablos = Mudurlukler::all();
        return view('yazici_1_sayfam', compact('yazici_1_tablos', 'mudurlukler_tablos'));
    }

    public function yazici_2_fonksiyon() {
        $yazici_2_tablos  =   Yazici_2::all();
        $mudurlukler_tablos = Mudurlukler::all();
        return view('yazici_2_sayfam', compact('yazici_2_tablos', 'mudurlukler_tablos'));
    }
}
