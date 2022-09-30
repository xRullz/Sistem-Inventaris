<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\User;
use App\Models\Kategori;
use App\Models\BrgKeluar;
use App\Models\BrgMsuk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $user   = User::count();
        $barang = Barang::count();
        $kategori = Kategori::count();

        $date = date('Y-m-d');

        $brg_msk_tdy = BrgMsuk::where('tgl_brg_msk', '=', $date)->count();
        $brg_keluar_tdy = BrgKeluar::where('tgl_brg_keluar', '=', $date)->count();

        $brg_msk    = BrgMsuk::count();
        $brg_keluar = BrgKeluar::count();

        $m_jan      = BrgMsuk::whereMonth('tgl_brg_msk', '01')->count();
        $m_feb      = BrgMsuk::whereMonth('tgl_brg_msk', '02')->count();
        $m_mar      = BrgMsuk::whereMonth('tgl_brg_msk', '03')->count();
        $m_apr      = BrgMsuk::whereMonth('tgl_brg_msk', '04')->count();
        $m_mei      = BrgMsuk::whereMonth('tgl_brg_msk', '05')->count();
        $m_jun      = BrgMsuk::whereMonth('tgl_brg_msk', '06')->count();
        $m_jul      = BrgMsuk::whereMonth('tgl_brg_msk', '07')->count();
        $m_agu      = BrgMsuk::whereMonth('tgl_brg_msk', '08')->count();
        $m_sep      = BrgMsuk::whereMonth('tgl_brg_msk', '09')->count();
        $m_okt      = BrgMsuk::whereMonth('tgl_brg_msk', '10')->count();
        $m_nov      = BrgMsuk::whereMonth('tgl_brg_msk', '11')->count();
        $m_des      = BrgMsuk::whereMonth('tgl_brg_msk', '12')->count();

        $k_jan      = BrgKeluar::whereMonth('tgl_brg_keluar', '01')->count();
        $k_feb      = BrgKeluar::whereMonth('tgl_brg_keluar', '02')->count();
        $k_mar      = BrgKeluar::whereMonth('tgl_brg_keluar', '03')->count();
        $k_apr      = BrgKeluar::whereMonth('tgl_brg_keluar', '04')->count();
        $k_mei      = BrgKeluar::whereMonth('tgl_brg_keluar', '05')->count();
        $k_jun      = BrgKeluar::whereMonth('tgl_brg_keluar', '06')->count();
        $k_jul      = BrgKeluar::whereMonth('tgl_brg_keluar', '07')->count();
        $k_agu      = BrgKeluar::whereMonth('tgl_brg_keluar', '08')->count();
        $k_sep      = BrgKeluar::whereMonth('tgl_brg_keluar', '09')->count();
        $k_okt      = BrgKeluar::whereMonth('tgl_brg_keluar', '10')->count();
        $k_nov      = BrgKeluar::whereMonth('tgl_brg_keluar', '11')->count();
        $k_des      = BrgKeluar::whereMonth('tgl_brg_keluar', '12')->count();

        return view('home', compact('user', 'barang', 'kategori', 'brg_msk_tdy', 'brg_keluar_tdy', 'brg_msk', 'brg_keluar',
        'm_jan',  
        'm_feb',
        'm_mar',
        'm_apr',
        'm_mei',
        'm_jun',
        'm_jul',
        'm_agu',
        'm_sep',
        'm_okt',
        'm_nov',
        'm_des',
    
        'k_jan',  
        'k_feb',
        'k_mar',
        'k_apr',
        'k_mei',
        'k_jun',
        'k_jul',
        'k_agu',
        'k_sep',
        'k_okt',
        'k_nov',
        'k_des'));
    }
}
