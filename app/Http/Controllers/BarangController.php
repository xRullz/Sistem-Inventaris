<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

date_default_timezone_set('Asia/Jakarta');

class BarangController extends Controller
{

    public function index()
    {
        $barang   = Barang::join('kategori','kategori.id','=','barang.id_kategori')
                    ->select('barang.*', 'kategori.nama_kategori')
                    ->get();
        $kategori = Kategori::all();
        return view('admin.master.barang.barang', compact('barang', 'kategori'));
    }

    public function store(Request $request)
    {
        Barang::create($request->all());
        return redirect('/barang')->with('success', 'Data Berhasil Disimpan');

    }

    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);
        $barang->update($request->all());
        return redirect('/barang')->with('success', 'Data Berhasil Dirubah');

    }

    public function destroy($id)
    {
        $barang = Barang::find($id);
        $barang->delete();
        return redirect('/barang')->with('warning', 'Data Berhasil Dihapus');

    }
}
