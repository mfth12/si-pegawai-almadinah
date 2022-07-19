<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Konfig;
use App\Models\Pengguna;
use Illuminate\Http\Request;

class DasborCtrl extends Controller
{
    public function index()
    {
        $konfig  = Konfig::firstWhere('konfig_id', 701);
        $title = $konfig->nama_sistem.' '.$konfig->unik;
        return view('sistem.dasbor', [
            'title' => 'Dashboard | '.$title,
            'tabel' => false,
            'jml_pengguna' => Pengguna::all()->count(),
            'jml_berita' => Berita::all()->count(),
            'setting' => ['form' => false],
            'konfig' => $konfig,
        ]);
    }
}
