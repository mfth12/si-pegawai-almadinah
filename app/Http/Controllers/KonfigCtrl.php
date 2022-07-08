<?php

namespace App\Http\Controllers;

use App\Models\Konfig;
use App\Models\Pengguna;
use App\Http\Requests\StoreKonfigRequest;
use App\Http\Requests\UpdateKonfigRequest;

class KonfigCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengguna = Pengguna::where('user_id', auth()->user()->user_id)->first();
        return view('sistem.konfig.index', [
            'title' => 'Konfigurasi | Sistem Pegawai Al-Madinah',
            'head_page' => 'Konfigurasi Sistem',
            'pengguna' => $pengguna,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKonfigRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKonfigRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Konfig  $konfig
     * @return \Illuminate\Http\Response
     */
    public function show(Konfig $konfig)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Konfig  $konfig
     * @return \Illuminate\Http\Response
     */
    public function edit(Konfig $konfig)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKonfigRequest  $request
     * @param  \App\Models\Konfig  $konfig
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKonfigRequest $request, Konfig $konfig)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Konfig  $konfig
     * @return \Illuminate\Http\Response
     */
    public function destroy(Konfig $konfig)
    {
        //
    }
}
