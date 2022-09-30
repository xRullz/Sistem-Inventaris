<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\BrgKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

date_default_timezone_set('Asia/Jakarta');

class BrgKeluarController extends Controller
{
    public function index()
    {
        $brg_keluar   = BrgKeluar::join('barang', 'barang.id', '=', 'brg_keluar.id_barang')
            ->join('kategori', 'kategori.id', '=', 'barang.id_kategori')
            ->select('brg_keluar.*', 'kategori.nama_kategori', 'barang.harga', 'barang.nama_barang')
            ->get();
        $barang = Barang::all();
        return view('gudang.transaksi.brg_keluar.brg_keluar', compact('barang', 'brg_keluar'));
    }

    public function create()
    {
        $barang = Barang::all();

        $y = DB::table('brg_keluar')->select(DB::raw('MAX(RIGHT(no_brg_keluar,3)) as kode'));
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
        return view('gudang.transaksi.brg_keluar.add', compact('barang', 'kd'));
    }
        

    public function ajax(Request $request)
    {
        $id_barang['id_barang'] = $request->id_barang;
        $ajax                   = Barang::where('id', $id_barang)->get();
        
        return view('gudang.transaksi.brg_keluar.ajax', compact('ajax'));
    }

    public function store(Request $request)
    {
        $barang = Barang::find($request->id_barang);

        if($barang->stok < $request->jml_brg_keluar)
        {
            return redirect('/brg_keluar/create')->with('warning','Jumlah Barang Lebih Dari Stok');
        }
        else {
            BrgKeluar::create($request->all());

            $barang->stok  -= $request->jml_brg_keluar;
            $barang->save();
    
            return redirect('/brg_keluar')->with('success', 'Data Berhasil Disimpan');
        }
    }
}
