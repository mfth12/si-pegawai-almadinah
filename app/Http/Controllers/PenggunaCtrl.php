<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Diglactic\Breadcrumbs\Breadcrumbs;

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
            'title' => 'Pengguna Sistem | Portal Santri ',
            'head_page' => 'Pengguna Sistem',
            'pengguna' => Pengguna::orderBy('created_at', 'DESC')->get(),
            'tabel' => 'pengguna' //untuk memanggil fungsi tabel bernama 'pengguna'
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
            'tabel' => false //apakah ingin menampilkan tabel atau tidak
        ]);
    }

    public function store(Request $request)
    {
        // return $request->all(); //ngembaliin request
        $rules = [
            'nama' => 'required|max:255',
            'nomer_induk' => 'required|min:3|max:255|unique:penggunas',
            'email' => '',
            'password' => 'required|min:6|max:64'
        ];
        $messages = [
            'nama.required' => 'Nama lengkap tidak boleh kosong.',
            'nama.min' => 'Nama lengkap terlalu pendek.',
            'nama.max' => 'Nama lengkap terlalu panjang.',
            'nomer_induk.required' => 'Nomor induk tidak boleh kosong.',
            'nomer_induk.min' => 'Nomor induk minimal :min karakter.',
            'nomer_induk.max' => 'Nomor induk maksimal :max karakter.',
            'password.required' => 'Password tidak boleh kosong.',
            'password.min' => 'Password minimal :min karakter.',
            'password.max' => 'Password maksimal :max karakter.'
        ];

        $tervalidasi = $this->validate($request, $rules, $messages); //melakukan validasi di awal

        if (isset($request->email)) { //apabila ada input email dari request
            $rules['email'] = 'email:dns|min:6|max:64|unique:penggunas,nomer_induk';
            $messages = [
                'email' => 'Alamat email harus berupa email yang valid.',
                'email.required' => 'Email tidak boleh kosong.',
                'email.unique' => 'Email sudah terpakai, gunakan yang lain.',
            ];
        } else {
            unset($rules['email']); //unset untuk menghilangkan rules pada nomer_induk
        }

        $tervalidasi = $this->validate($request, $rules, $messages); //melakukan validasi di awal
        $tervalidasi['password'] = Hash::make($tervalidasi['password']);

        // $dataTervalidasi['password'] = bcrypt($dataTervalidasi['password']);
        // dd($request);

        Pengguna::create($tervalidasi);
        // $request->session()->flash('terdaftar', 'Pendaftaran berhasil, silakan masuk.');
        return redirect('/pengguna')->with('hijau', 'Alhamdulillah, pengguna berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function show(Pengguna $pengguna)
    {
        // print_r('<h1>'.$pengguna->nama . '</h1> <p> [' . $pengguna->nomer_induk.' ]</p>');
        $nama= $pengguna->nama;
        return view('sistem.pengguna.lihat', [
            'title' => 'Profil '.$nama,
            'head_page' => 'Profil '.$nama,
            'tabel' => false, //apakah ingin menampilkan tabel
            'pengguna' => $pengguna
        ]);
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
            'tabel' => false, //apakah ingin menampilkan tabel
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
            'nama' => 'required|min:3|max:255',
            'nomer_induk' => 'required|min:6|max:64',
            'email' => '',
            'password' => ''
        ];
        $messages = [
            'nama.required' => 'Nama lengkap tidak boleh kosong.',
            'nama.min' => 'Nama lengkap terlalu pendek.',
            'nama.max' => 'Nama lengkap terlalu panjang.',
            'nomer_induk.required' => 'Nomor induk tidak boleh kosong.',
            'nomer_induk.min' => 'Nomor induk minimal :min karakter.',
            'nomer_induk.max' => 'Nomor induk maksimal :max karakter.'
        ];

        $tervalidasi = $this->validate($request, $rules, $messages); //melakukan validasi di awal

        if ($request->nomer_induk != $pengguna->nomer_induk) { //kondisi untuk slug
            $rules['nomer_induk'] = 'min:6|max:64|unique:penggunas,nomer_induk';
            $messages = [
                'nomer_induk.unique' => 'Nomor induk sudah terdaftar, gunakan yang lain.',
                'nomer_induk.min' => 'Nomor induk minimal :min karakter.',
                'nomer_induk.max' => 'Nomor induk maksimal :max karakter.'
            ];
        } else {
            unset($rules['nomer_induk']); //unset untuk menghilangkan rules pada nomer_induk
        }

        if ($request->email != $pengguna->email) { //kondisi untuk slug
            $rules['email'] = 'email:dns|unique:penggunas,email';
            $messages = [
                'email:dns' => 'Harus pake DNS yang benar emailnya.',
                'email.unique' => 'Email sudah terdaftar, gunakan yang lain.'
            ];
        } else {
            unset($rules['email']); //unset untuk menghilangkan rules pada email
        }

        if (isset($request->password)) {
            $rules['password'] = 'required|min:6|max:64';
            $messages = [
                'password.required' => 'Jika ingin diganti, password harus diisi.',
                'password.min' => 'Password minimal :min karakter.',   
                'password.max' => 'Password maksimal :max karakter.'
            ];
            $request['password'] = Hash::make($request->password);
            // dd('ada isinya = '.$tervalidasi['password']);
        } elseif (!isset($request->password)) {
            unset($rules['password']); //unset untuk menghilangkan rules pada password
            // $tervalidasi['password'] = $pengguna->password;
            // dd('password tidak ada isinya');
        }

        $tervalidasi = $this->validate($request, $rules, $messages); //melakukan validasi di akhir
        // dd($tervalidasi);

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
