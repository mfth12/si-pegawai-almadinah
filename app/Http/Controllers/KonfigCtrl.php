<?php

namespace App\Http\Controllers;

use App\Models\Konfig;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateKonfigRequest;
use App\Models\Level_pengguna;

// use Illuminate\Http\File;

class KonfigCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $pengguna = Pengguna::where('user_id', auth()->user()->user_id)->first();
        $konfig = Konfig::where('konfig_id', 701)->first();
        $title = $konfig->nama_sistem . ' ' . $konfig->unik;
        return view('sistem.konfig.index', [
            'title' => 'Konfigurasi | ' . $title,
            'head_page' => 'Konfigurasi Sistem',
            'konfig' => $konfig,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ambil_level(Request $request)
    {
        $level = Level_pengguna::all();
        if ($request->ajax()) {
            return datatables()->of($level)
                ->addColumn('aksi', function ($data) {
                    $button = '<div class="text-nowrap">';
                    $button .= '<a href="javascript:void(0)" onclick="dev()" class="btn btn-sm btn-outline-secondary mr-1"';
                    $button .= 'data-toggle="tooltip" data-placement="top"
                    title="Lakukan perubahan akses">';
                    $button .= '<i class="nav-icon fas fa-edit"></i> Edit</a>';
                    $button .= ' ';
                    $button .= '<a href="javascript:void(0)" type="button" name="delete" id="user_id" onclick="dev()" class="btn btn-sm btn-outline-danger">';
                    $button .= '<i class="fas fa-trash-alt"></i> Hapus</a>';
                    $button .= '</div>';
                    return $button;
                })
                ->addColumn('level', function ($data) {
                    $level = $data->nama_level;
                    return $level;
                })
                ->addColumn('akses', function ($data) {
                    $level = $data->akses;
                    return $level;
                })
                ->rawColumns(['aksi'])
                ->addIndexColumn()
                ->make(true);
        }
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Models\Konfig  $konfig
     * @return \Illuminate\Http\Response
     */
    public function store_umum(Request $request, Konfig $konfig)
    {
        $rules = [
            'nama_sistem' => 'required|max:255',
            'unik' => 'required|max:64',
            'nama_lembaga' => 'required|min:6|max:255',
            ///space
            'alamat_lembaga' => 'required',
            'email_resmi' => 'required|email',
            'no_telp' => 'required',
            'logo_lembaga' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4064',
            'ikon' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4064',
            'logoOld' => '',
            'ikonOld' => '',
        ];

        $messages = [
            'nama_sistem.required' => 'Nama sistem tidak boleh kosong.',
            'nama_sistem.max' => 'Nama sistem terlalu panjang.',
            'unik.required' => 'Nama unik tidak boleh kosong.',
            'unik.max' => 'Nama unik terlalu panjang.',
            'nama_lembaga.required' => 'Nama lembaga tidak boleh kosong.',
            'nama_lembaga.min' => 'Nama lembaga terlalu pendek.',
            'nama_lembaga.max' => 'Nama lembaga terlalu panjang.',
            'alamat_lembaga.required' => 'Alamat tidak boleh kosong.',
            'email_resmi.required' => 'Email tidak boleh kosong.',
            'email_resmi.email' => 'Email tidak valid.',
            'no_telp.required' => 'No. Telp tidak boleh kosong.',
            ///space
            'logo_lembaga.image' => 'Logo harus berupa gambar.',
            'logo_lembaga.mimes' => 'Ekstensi yang dibolehkan hanya jpeg,png,jpg,gif,svg.',
            'logo_lembaga.max' => 'Logo terlalu besar. Maks 4Mb',
            ///space
            'ikon.image' => 'Ikon harus berupa gambar.',
            'ikon.mimes' => 'Ekstensi yang dibolehkan hanya jpeg,png,jpg,gif,svg.',
            'ikon.max' => 'Ikon terlalu besar. Maks 4Mb',
        ];

        $validasi = $this->validate($request, $rules, $messages); //melakukan validasi di awal

        if ($request->File('logo_lembaga')) {
            $logo_lembaga = $request->file('logo_lembaga');
            $tujuan_upload = 'img';
            $nama_logo = 'logo_lembaga_active.' . $logo_lembaga->extension();
            // $nama_file = time() . '_' . $logo_lembaga->getClientOriginalName();
            $logo_lembaga->move($tujuan_upload, $nama_logo); //uploading to server folder
            $set_logo = Konfig::where('konfig_id', 701)->first(); //saving to database
            // File::delete(public_path() . 'img/', $article->file->name);
            $set_logo->logo_lembaga = $nama_logo;
            $set_logo->save();
            unset($validasi['logo_lembaga']);
            // Storage::delete(asset('img/' . $request->logoOld));
            // unlink(asset('img/' . $request->logoOld));
        }

        if ($request->File('ikon')) {
            $ikon = $request->file('ikon');
            $tujuan_upload = 'img';
            $nama_ikon = 'ikon_active.' . $ikon->extension();
            $ikon->move($tujuan_upload, $nama_ikon); //uploading to server folder
            $set_ikon = Konfig::where('konfig_id', 701)->first(); //saving to database
            $set_ikon->ikon = $nama_ikon;
            $set_ikon->save();
            unset($validasi['ikon']);
            // Storage::delete(asset('img/' . $request->ikonOld));
            // unlink(asset('img/' . $request->ikonOld));
        }

        unset($validasi['logoOld']);
        unset($validasi['ikonOld']);
        Konfig::updateOrCreate(['konfig_id' => $request->konfig_id], $validasi);
        // return response()->json($validasi);
        return redirect('/konfig#umum')->with('hijau', 'Konfigurasi umum diperbarui');
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
