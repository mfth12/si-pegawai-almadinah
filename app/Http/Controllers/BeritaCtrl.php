<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Berita;
use App\Models\Konfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BeritaCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list_berita = Berita::orderBy('tanggal', 'DESC')->get();
        // $list_berita = DB::table('beritas')
        //         ->orderBy('tanggal', 'desc')
        //         ->get();
        if ($request->ajax()) {
            return datatables()->of($list_berita)
                ->addColumn('action', function ($data) {
                    $button = '<div class="text-nowrap">';
                    $button .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-outline-secondary btn-sm mr-1 edit-post"><i class="fas fa-edit"></i> Edit</a>';
                    $button .= '';
                    $button .= '<button type="button" name="delete" id="' . $data->id . '" class="delete btn btn-outline-danger btn-sm"><i class="fas fa-trash-alt"></i> Hapus</button>';
                    $button .= '</div>';
                    return $button;
                })
                ->addColumn('gambar', function ($data) {
                    $gambar = '<img src="' . asset($data->gambar) . '" alt="' . $data->judul_berita . '" width="100px">';
                    return $gambar;
                })
                ->addColumn('tanggal', function ($data) {
                    $tanggal = Carbon::parse($data->tanggal)->format('l, j F Y');
                    return $tanggal;
                })
                ->rawColumns(['gambar', 'action'])
                ->addIndexColumn()
                ->make(true);
        }

        $konfig  = Konfig::firstWhere('konfig_id', 701);
        $title = $konfig->nama_sistem.' '.$konfig->unik;
        return view('sistem.berita.index', [
            'title' => 'Berita | '.$title,
            'head_page' => 'Berita Terbaru',
            'konfig' => $konfig,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id     = $request->id;
        $post   = Berita::updateOrCreate(
            ['id' => $id],
            [
                'judul_berita' => $request->judul_berita,
                'penulis' => $request->penulis,
                'isi_berita' => $request->isi_berita,
                'gambar' => $request->gambar,
                'tanggal' => $request->tanggal,
            ]
        );
        return response()->json($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $where = array('id' => $id);
        $post  = Berita::where($where)->first();

        return response()->json($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Berita::where('id', $id)->delete();
        return response()->json($post);
    }
}
