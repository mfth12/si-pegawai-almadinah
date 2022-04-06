<?php

namespace App\Http\Controllers;

use App\Models\Detail_pengguna;
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
            'title' => 'Pengguna Sistem | Portal Santri ',
            'head_page' => 'Pengguna Sistem',
            'pengguna' => Pengguna::orderBy('created_at', 'DESC')->get(),
            // 'tabel' => 'pengguna', //untuk memanggil fungsi tabel bernama 'pengguna'
            // 'setting' => ['form' => false] //for individual setting
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
            // 'tabel' => false, //apakah ingin menampilkan tabel atau tidak
            // 'setting' => ['form' => true] //for individual setting
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'nama' => 'max:255',
            'nomer_induk' => 'min:6|max:64|unique:penggunas',
            'email' => '',
            'password' => 'min:6|max:64',
            'status' => '',
            ////divider
            'foto' => '',
            'nama_arab' => '',
            'nisn' => '',
            'asal' => '',
            'tempat_lahir' => '',
            'tanggal_lahir' => '',
            'kelas' => '',
            'sub_kelas' => '',
            'alamat' => '',
            //ortu
            'nama_ayah' => '',
            'pekerjaan_ayah' => '',
            'nama_ibu' => '',
            'pekerjaan_ibu' => '',
        ];
        $messages = [
            // 'nama.required' => 'Nama lengkap tidak boleh kosong.',
            'nama.min' => 'Nama lengkap terlalu pendek.',
            'nama.max' => 'Nama lengkap terlalu panjang.',
            // 'nomer_induk.required' => 'Nomor induk tidak boleh kosong.',
            'nomer_induk.min' => 'Nomor induk minimal :min karakter.',
            'nomer_induk.max' => 'Nomor induk maksimal :max karakter.',
            'nomer_induk.unique' => 'Nomor induk sudah terdaftar, gunakan nomor induk yang lain.',
            // 'password.required' => 'Password tidak boleh kosong.',
            'password.min' => 'Password minimal :min karakter.',
            'password.max' => 'Password maksimal :max karakter.',
        ];


        if (isset($request->email)) { //apabila ada input email dari request
            $rules['email'] = 'email:dns|min:6|max:64|unique:penggunas';
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
        if ($request->status == 'on') {
            $tervalidasi['status'] = 1;
        } else {
            $tervalidasi['status'] = 0;
        }
        // dd($tervalidasi);

        Pengguna::create($tervalidasi);

        $detail = new Detail_pengguna([
            // 'foto' => $request->foto,
            'nama_arab' => $request->nama_arab,
            'nisn' => $request->nisn,
            'asal' => $request->asal,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'kelas' => $request->kelas,
            'sub_kelas' => $request->sub_kelas,
            'alamat' => $request->alamat,
            'nama_ayah' => $request->nama_ayah,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'nama_ibu' => $request->nama_ibu,
            'pekerjaan_ibu' => $request->pekerjaan_ibu

        ]);
        // $cari = Pengguna::orderBy('user_id', 'desc')->limit(1)->get();

        if ($request->file('foto')) {
            $detail['foto'] = $request->file('foto')->store('foto-pengguna');
        }
        $cari = Pengguna::latest('user_id')->first();
        Pengguna::find($cari->user_id)->detail()->save($detail);
        // $tervalidasi['user_id'] = auth()->user()->id;

        // Detail_pengguna::create($tervalidasi);
        // dd($detail);
        // dd($tervalidasi);
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
        $nama = $pengguna->nama;
        return view('sistem.pengguna.lihat', [
            'title' => 'Profil ' . $nama,
            'head_page' => 'Profil ' . $nama,
            'pengguna' => $pengguna, //return data pengguna
            // 'tabel' => false, //apakah ingin menampilkan tabel
            // 'setting' => ['form' => false], //for individual setting
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
        // dd($pengguna);
        return view('sistem.pengguna.edit', [
            'title' => 'Edit (' . $pengguna->nama . ')',
            'head_page' => 'Edit Pengguna',
            'tabel' => false, //apakah ingin menampilkan tabel
            'pengguna' => $pengguna, //return data pengguna dengan relasinya juga
            'setting' => ['form' => true] //for individual setting
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
            'password' => '',
            'status' => '',
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
            // dd('password tidak ada isinya');
        }
        $tervalidasi = $this->validate($request, $rules, $messages); //melakukan validasi di akhir
        if ($request->status == 'on') {
            $tervalidasi['status'] = 1;
        } else {
            $tervalidasi['status'] = 0;
        }
        // dd($tervalidasi); //dump die
        Pengguna::where('user_id', $pengguna->user_id)->update($tervalidasi);

        $detail = [
            // 'foto' => $request->foto,
            'foto' => $request->fotoOld,
            'nama_arab' => $request->nama_arab,
            'nisn' => $request->nisn,
            'asal' => $request->asal,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'kelas' => $request->kelas,
            'sub_kelas' => $request->sub_kelas,
            'alamat' => $request->alamat,
            'nama_ayah' => $request->nama_ayah,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'nama_ibu' => $request->nama_ibu,
            'pekerjaan_ibu' => $request->pekerjaan_ibu
        ];
        if ($request->file('foto')) { //kondisi untuk foto apa bila tidak kosong
            if ($request->fotoOld) {
                if ($request->fotoOld != "default.png") {
                    Storage::delete($request->fotoOld);
                }
                // dd('ini request foto lama');
                unset($detail['foto']);
            }
            $detail['foto'] = $request->file('foto')->store('foto-pengguna');
        }
        Pengguna::find($pengguna->user_id)->detail()->update($detail);
        return redirect('/pengguna')->with('hijau', 'Data pengguna berhasi diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengguna $pengguna)
    {
        // dd("menghapus");
        Pengguna::destroy($pengguna->user_id); //delete row di tabelnya
        if ($pengguna->detail->foto != "default.png") {
            Storage::delete($pengguna->detail->foto); //delete foto
        }
        return redirect('/pengguna')->with('merah', 'Pengguna berhasil dihapus.');
    }

    public function hapusfoto()
    {
        // Storage::delete(public_path('foto-pengguna'));
        Storage::deleteDirectory('foto-pengguna');
        // dd($response);
        return redirect('/pengguna')->with('merah', 'Foto dalam direktori pengguna berhasil dihapus.');
    }
    
    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function gantistatus(Request $request)
    {
        $user = Pengguna::find($request->user_id);
        $user->status = $request->status;
        $user->save();
  
        return response()->json(['success'=>'Status '.$request->user_id.' berhasil diganti.']);
    }
}
