<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BrgMsuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

date_default_timezone_set('Asia/Jakarta');

class BrgMsukController extends Controller
{
    public function index()
    {
        $brg_msk   = BrgMsuk::join('barang', 'barang.id', '=', 'brg_msk.id_barang')
            ->join('kategori', 'kategori.id', '=', 'barang.id_kategori')
            ->select('brg_msk.*', 'kategori.nama_kategori', 'barang.harga', 'barang.nama_barang')
            ->get();
        $barang = Barang::all();
        return view('gudang.transaksi.brg_msk.brg_msk', compact('barang', 'brg_msk'));
    }

    public function create()
    {
        $barang = Barang::all();

        $y = DB::table('brg_msk')->select(DB::raw('MAX(RIGHT(no_brg_msk,3)) as kode'));
        $kd = "";
        if($y->count()>0)
        {
            foreach($y->get() as $x)
            {
                $tmp = ((int)$x->kode)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }
        else
        {
            $kd = "001";
        }
        return view('gudang.transaksi.brg_msk.add', compact('barang', 'kd'));
    }

    public function ajax(Request $request)
    {
        $id_barang['id_barang'] = $request->id_barang;
        $ajax                   = Barang::where('id', $id_barang)->get();
        
        return view('gudang.transaksi.brg_msk.ajax', compact('ajax'));
    }

    public function store(Request $request)
    {
        BrgMsuk::create($request->all());

        $barang = Barang::find($request->id_barang);

        $barang->stok  += $request->jml_brg_msk;
        $barang->save();

        return redirect('/brg_msk')->with('success', 'Data Berhasil Disimpan');
    }
}
