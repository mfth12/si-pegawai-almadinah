<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasukController extends Controller
{
    public function username()
    {
        return 'nomer_induk';
    }
    public function index()
    {
        return view('sistem.masuk', [
        // return view('masuk.index', [
            'title' => 'Masuk | Sistem Informasi Santri',
            'aktif' => 'masuk'
        ]);
    }

    public function auth(Request $request)
    {
        if (!isset($request->nomer_induk) || !isset($request->password)) {
            return redirect()->route('masuk')->with('masukKosong', 'Silakan isi Nomor ID dan password Anda !');
        }
        $kredensi = $request->validate([
            'nomer_induk' => 'required', //menggunakan nomer induk untuk login masuk kedalam sistem
            'password' => 'required'
        ]);

        if (Auth::attempt($kredensi)) {
            $request->session()->regenerate();
            return redirect()->intended('dasbor');
        }
        
        return back()->with('masukGagal', 'Nomor ID atau Password Anda salah!');
        // dd('berhasil masuk');

    }

    public function keluar(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('keluar', 'Terimakasih, Anda telah keluar dari Sistem.');
    }
}
