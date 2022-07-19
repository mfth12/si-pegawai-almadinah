<?php

namespace App\Http\Controllers;

use App\Models\Konfig;
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
        $konfig  = Konfig::firstWhere('konfig_id', 701);
        $title = $konfig->nama_sistem . ' ' . $konfig->unik;
        return view('sistem.pengguna.lihat', [
            'title' => 'Profil Saya | ' . $title,
            'head_page' => 'Profil Saya',
            'pengguna' => $pengguna,
            'konfig' => Konfig::firstWhere('konfig_id', 701),
        ]);
    }
}
