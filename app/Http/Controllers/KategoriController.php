<?php

namespace App\Http\Controllers;
use App\Models\Kategori;
use Illuminate\Http\Request;

date_default_timezone_set('Asia/Jakarta');

class KategoriController extends Controller
{

    public function index()
    {
        $kategori= Kategori::all();

        return view('admin.master.kategori.kategori', compact('kategori'));
    }

    public function store(Request $request)
    {
        Kategori::create($request->all());
        //dd($request);
        
        return redirect('/kategori')->with('success', 'Data Berhasil Disimpan');

    }

    public function update(Request $request, $id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->update($request->all());
        return redirect('/kategori')->with('success', 'Data Berhasil Dirubah');

    }

    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();
        return redirect('/kategori')->with('warning', 'Data Berhasil Dihapus');

    }
}
