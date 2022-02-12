<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DaftarController extends Controller
{
    public function index()
    {
        return view('daftar.index', [
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
        
        User::create($dataTervalidasi);
        // $request->session()->flash('terdaftar', 'Pendaftaran berhasil, Silakan masuk.');
        return redirect('/masuk')->with('terdaftar', 'Pendaftaran berhasil, Silakan masuk.');
    }
}
