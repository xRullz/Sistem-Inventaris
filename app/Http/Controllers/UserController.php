<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

date_default_timezone_set('Asia/Jakarta');

class UserController extends Controller
{

    public function index()
    {
        $user = User::all();

        return view('admin.master.user.user', compact('user'));
    }

    public function store(Request $request)
    {
        User::create($request->all());
        return redirect('/user')->with('success, Data Berhasil Disimpan');

    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect('/user')->with('success, Data Berhasil Dirubah');

    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/user')->with('succes, Data Berhasil Dihapus');

    }
}
