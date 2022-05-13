<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;

class ProfilCtrl extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengguna = Pengguna::where('user_id', auth()->user()->user_id)->first();
        // dd($pengguna);
        return view('sistem.pengguna.lihat', [
            'title' => 'Profil Saya',
            'head_page' => 'Profil Saya',
            'pengguna' => $pengguna,
        ]);
    }
}
