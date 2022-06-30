<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Pengguna;
use Illuminate\Http\Request;

class DasborCtrl extends Controller
{
    public function index()
    {
        // $hitung = Pengguna::all()->count();
        return view('sistem.dasbor', [
            'title' => "Dashboard | Sistem Informasi Santri",
            'tabel' => false,
            'jml_pengguna' => Pengguna::all()->count(),
            'jml_berita' => Berita::all()->count(),
            'setting' => ['form' => false]
        ]);
    }
}
