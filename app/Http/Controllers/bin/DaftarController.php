<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DaftarController extends Controller
{
    public function index()
    {
        return view('bin.daftar.index', [
            'title' => 'Daftar',
            'aktif' => 'daftar'
        ]);
    }

    public function buat(Request $request)
    {
        // return $request->all(); //ngembaliin request
        $dataTervalidasi = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:114'
        ]);

        // $dataTervalidasi['password'] = bcrypt($dataTervalidasi['password']);
        $dataTervalidasi['password'] = Hash::make($dataTervalidasi['password']);
        // dd($request);
        
        Pengguna::create($dataTervalidasi);
        // $request->session()->flash('terdaftar', 'Pendaftaran berhasil, silakan masuk.');
        return redirect('/masuk')->with('terdaftar', 'Pendaftaran berhasil, silakan masuk.');
    }
}
