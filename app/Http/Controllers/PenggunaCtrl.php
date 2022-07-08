<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use App\Models\Detail_pengguna;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PenggunaCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list_pengguna = Pengguna::orderBy('created_at', 'DESC')->get();
        if ($request->ajax()) {
            return datatables()->of($list_pengguna)
                ->addColumn('nomer_induk', function ($data) {
                    $nomer_induk = '<code class="rounded-pill"
                    style="color: black;">' . $data->nomer_induk . '</code>';
                    return $nomer_induk;
                })
                ->addColumn('nama', function ($data) {
                    $nama = '<a href="/pengguna/' . $data->user_id . '" class="text-decoration-none  text-dark" data-toggle="tooltip" data-placement="top" title="Lihat profil' . $data->nama . '">' . $data->nama . '</a>';
                    return $nama;
                })
                ->addColumn('asal', function ($data) {
                    $kosong = '<i>(Tidak ada data)</i>';
                    $asal = $data->detail->asal ? $data->detail->asal : $kosong;
                    return $asal;
                })
                ->addColumn('kelas', function ($data) {
                    $kosong = '<i>(Tidak ada data)</i>';
                    $kelas = $data->detail->kelas ? $data->detail->kelas . ' - ' . $data->detail->sub_kelas : $kosong;
                    return $kelas;
                })
                ->addColumn('asrama', function ($data) {
                    $kosong = '<i>(Tidak ada data)</i>';
                    $asrama = $data->detail->asrama ? $data->detail->asrama . ' - ' . $data->detail->kamar : $kosong;
                    return $asrama;
                })
                ->addColumn('switch', function ($data) {
                    $switch = ($data->status == 1 ? '<b>Aktif</b>' : '<i>Non-aktif</i>');
                    return $switch;
                })
                ->addColumn('aksi', function ($data) {
                    $button = '<div class="text-nowrap">';
                    $button .= '<a href="/pengguna/' . $data->user_id . '/edit"
                    class="btn btn-sm" data-toggle="tooltip" data-placement="top"
                    title="Edit' . $data->nama . '.">';
                    $button .= '<i class="nav-icon fas fa-edit"></i></a>';
                    $button .= '';
                    $button .= '<a href="javascript:void(0)" type="button" name="delete" id="' . $data->user_id . '" class="delete btn btn-sm"><i class="fas fa-trash-alt"></i></a>';
                    $button .= '</div>';
                    // $button .= '<form action="/pengguna/'. $data->user_id .'" method="POST"
                    // class="d-inline">';
                    // $button .= '<a href="#!" class="btn btn-sm" data-toggle="tooltip"
                    // data-placement="top" title="Hapus"
                    // onclick="deleteConfirm(\'/pengguna/'.$data->user_id.'\')">';
                    // $button .= '<i class="nav-icon fas fa-trash"></i></a></form>';
                    return $button;
                })
                // ->addColumn('aksi_ori', function ($data) {
                //     $button = '<div class="text-nowrap">';
                //     $button .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-secondary btn-sm mr-1 edit-post"><i class="fas fa-edit"></i> Edit</a>';
                //     $button .= '';
                //     $button .= '<button type="button" name="delete" id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Hapus</button>';
                //     $button .= '</div>';
                //     return $button;
                // })
                ->rawColumns(['nomer_induk', 'nama', 'asal', 'kelas', 'asrama', 'switch', 'aksi'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('sistem.pengguna.index', [
        // return view('sistem.pengguna.index_backup', [
            'title' => 'Pengguna Sistem | Sistem Pegawai Al-Madinah',
            'head_page' => 'Pengguna Sistem',
            'pengguna' => Pengguna::orderBy('created_at', 'DESC')->get()
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
            'head_page' => 'Profil',
            'pengguna' => $pengguna,
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
            'pengguna' => $pengguna, //return data pengguna dengan relasinya juga
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

        if (!$request->email) {
            $rules['email'] = ''; //masuk kan email kosong
        } else {
            if ($request->email != $pengguna->email) {
                $rules['email'] = 'required|email|unique:penggunas,email';
                $messages = [
                    'email.required' => 'Email tidak boleh kosong.',
                    'email.unique' => 'Email sudah terpakai, gunakan yang lain.',
                ];
            }
            if ($request->email == $pengguna->email) {
                unset($rules['email']); //unset untuk menghilangkan rules pada email
            }
        }
        // if ($request->email != $pengguna->email) { //kondisi untuk slug
        //     $rules['email'] = 'email:dns|unique:penggunas,email';
        //     $messages = [
        //         'email:dns' => 'Harus pake DNS yang benar emailnya.',
        //         'email.unique' => 'Email sudah terdaftar, gunakan yang lain.'
        //     ];
        // } else {
        //     unset($rules['email']); //unset untuk menghilangkan rules pada email
        // }

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
                unset($detail['foto']);
                // dd('ini request foto lama');
            }
            $detail['foto'] = $request->file('foto')->store('foto-pengguna');
        }
        // dd($detail);
        Pengguna::find($pengguna->user_id)->detail()->update($detail);
        return redirect('/pengguna')->with('hijau', 'Data pengguna berhasi diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $where = array('user_id' => $id);
        $pengguna  = Pengguna::where($where)->first();
        // dd("menghapus");
        Pengguna::destroy($id); //delete row di tabelnya
        if ($pengguna->detail->foto != "default.png") {
            Storage::delete($pengguna->detail->foto); //delete foto
        }
        // return redirect('/pengguna')->with('merah', 'Pengguna berhasil dihapus.');
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

        return response()->json(['success' => $user->nama . ' berhasil ganti status.']);
    }

    // public function json(Request $request)
    // {

    //     $columns = array(
    //         0 => 'id',
    //         1 => 'title',
    //         2 => 'body',
    //         3 => 'created_at',
    //         4 => 'id',
    //     );

    //     $totalData = Pengguna::count();

    //     $totalFiltered = $totalData;

    //     $limit = $request->input('length');
    //     $start = $request->input('start');
    //     $order = $columns[$request->input('order.0.column')];
    //     $dir = $request->input('order.0.dir');

    //     if (empty($request->input('search.value'))) {
    //         $posts = Pengguna::offset($start)
    //             ->limit($limit)
    //             ->orderBy($order, $dir)
    //             ->get();
    //     } else {
    //         $search = $request->input('search.value');

    //         $posts =  Pengguna::where('id', 'LIKE', "%{$search}%")
    //             ->orWhere('title', 'LIKE', "%{$search}%")
    //             ->offset($start)
    //             ->limit($limit)
    //             ->orderBy($order, $dir)
    //             ->get();

    //         $totalFiltered = Pengguna::where('id', 'LIKE', "%{$search}%")
    //             ->orWhere('title', 'LIKE', "%{$search}%")
    //             ->count();
    //     }

    //     $data = array();
    //     if (!empty($pengguna)) {
    //         foreach ($pengguna as $post) {
    //             $show =  route('pengguna.show', $post->user_id);
    //             $edit =  route('pengguna.edit', $post->user_id);

    //             $nestedData['user_id'] = $post->user_id;
    //             $nestedData['name'] = $post->name;
    //             $nestedData['email'] = $post->email;
    //             // $nestedData['email'] = substr(strip_tags($post->body), 0, 50) . "...";
    //             $nestedData['created_at'] = date('j M Y h:i a', strtotime($post->created_at));
    //             $nestedData['options'] = "&emsp;<a href='{$show}' title='SHOW' ><span class='glyphicon glyphicon-list'></span></a>
    //                                       &emsp;<a href='{$edit}' title='EDIT' ><span class='glyphicon glyphicon-edit'></span></a>";
    //             $data[] = $nestedData;
    //         }
    //     }

    //     $json_data = array(
    //         "draw"            => intval($request->input('draw')),
    //         "recordsTotal"    => intval($totalData),
    //         "recordsFiltered" => intval($totalFiltered),
    //         "data"            => $data
    //     );

    //     echo json_encode($json_data);
    // }
}
