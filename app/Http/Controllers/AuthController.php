<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use RealRashid\SweetAlert\Facades\Alert;

//use Auth;
class AuthController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function cek_login(Request $request)
    {
        $password = $request->input('password');
        $email = $request->input('email');

        // $validate = $request->validate([
        //     'email' => 'required',
        //     'password' => 'required'
        // ]);

        //  dd($email, $password);

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            //dd($email, $password);
            $request->session()->regenerate();

            return redirect()->intended('/home')->with('success','Login Berhasil.');;
        }
        else 
        {
            return redirect()->intended('/')->with('warning','Email atau Password Salah.');
        }
        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ])->onlyInput('email');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}