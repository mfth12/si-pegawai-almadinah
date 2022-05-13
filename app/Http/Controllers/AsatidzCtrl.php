<?php

namespace App\Http\Controllers;

use App\Models\Asatidz;
use App\Http\Requests\StoreAsatidzRequest;
use App\Http\Requests\UpdateAsatidzRequest;

class AsatidzCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sistem.maintenance', [
            "title" => "Maintenance"
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
     * @param  \App\Http\Requests\StoreAsatidzRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAsatidzRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asatidz  $asatidz
     * @return \Illuminate\Http\Response
     */
    public function show(Asatidz $asatidz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asatidz  $asatidz
     * @return \Illuminate\Http\Response
     */
    public function edit(Asatidz $asatidz)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAsatidzRequest  $request
     * @param  \App\Models\Asatidz  $asatidz
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAsatidzRequest $request, Asatidz $asatidz)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asatidz  $asatidz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asatidz $asatidz)
    {
        //
    }
}
