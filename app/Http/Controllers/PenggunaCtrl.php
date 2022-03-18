<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PenggunaCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sistem.pengguna.index', [
            'title' => 'Pengguna Sistem | SIS ',
            'head_page' => 'Pengguna Sistem',
            "pengguna" => Pengguna::orderBy('created_at', 'DESC')->get(),
            'tabel' => 'pengguna'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // @print_r('sd');
        return view('sistem.pengguna.tambah', [
            'title' => 'Tambah Pengguna',
            'head_page' => 'Tambah Pengguna',
            'tabel' => false
        ]);
    }

    public function store(Request $request)
    {
        // return $request->all(); //ngembaliin request
        $dataTervalidasi = $request->validate([
            'nama' => 'required|max:255',
            'nomer_induk' => 'required|min:3|max:255|unique:penggunas',
            'email' => 'required|email:dns|unique:penggunas',
            'password' => 'required|min:6|max:64'
        ]);

        // $dataTervalidasi['password'] = bcrypt($dataTervalidasi['password']);
        $dataTervalidasi['password'] = Hash::make($dataTervalidasi['password']);
        // dd($request);

        Pengguna::create($dataTervalidasi);
        // $request->session()->flash('terdaftar', 'Pendaftaran berhasil, silakan masuk.');
        return redirect('/pengguna')->with('hijau', 'Alhamdulillah, Pengguna berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function show(Pengguna $pengguna)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengguna $pengguna)
    {
        //
        return view('sistem.pengguna.edit', [
            'title' => 'Edit Pengguna',
            'head_page' => 'Edit Pengguna',
            'tabel' => false,
            'pengguna' => $pengguna
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengguna $pengguna)
    {
        $rules = [ //array data
            'nama' => 'required|max:255',
            'nomer_induk' => 'required',
            'email' => 'required',
            'password' => '',
        ];
        $tervalidasi = $request->validate($rules); //melakukan validasi di awal
        if ($request->nomer_induk != $pengguna->nomer_induk) { //kondisi untuk slug
            $rules['nomer_induk'] = 'min:3|max:255|unique:penggunas,nomer_induk';
        } else {
            unset($rules['nomer_induk']);
        }
        if ($request->email != $pengguna->email) { //kondisi untuk slug
            $rules['email'] = 'email:dns|unique:penggunas,email';
        } else {
            unset($rules['email']);
        }

        if (isset($request->password)) {
            $rules['password'] = 'required|min:6|max:64';
            $tervalidasi['password'] = Hash::make($request->password);
            // dd('berjalan');
        } else {
            $tervalidasi['password'] = $pengguna->password;
            // $request->except('password');
            // dd('sad');
        }
        
        // dd($tervalidasi);
        // $tervalidasi = $request->validate($rules); //melakukan validasi di awal

        // baru masuk ke ngisi user_id,
        // $tervalidasi['user_id'] = auth()->user()->user_id;
        // $tervalidasi['excerpt'] = Str::limit(strip_tags($request->body), 200, '...');
        //terus save deh
        Pengguna::where('user_id', $pengguna->user_id)->update($tervalidasi);
        return redirect('/pengguna')->with('hijau', 'Data pengguna berhasi diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengguna $pengguna)
    {
        // dd("sd");
        Pengguna::destroy($pengguna->user_id); //delete row di tabelnya
        return redirect('/pengguna')->with('merah', 'Akun berhasil dihapus.');
    }
}
