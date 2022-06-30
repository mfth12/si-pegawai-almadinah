<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasukController extends Controller
{
    public function username()
    {
        return 'nomer_induk';
    }

    public function auth(Request $request)
    {
        if (!isset($request->nomer_induk) || !isset($request->password)) {
            return back()->with('masukKosong', 'Silakan isi Nomor ID dan password Anda !');
        }
        $kredensi = $request->validate(
            [
                'nomer_induk'   => 'required', //menggunakan nomer induk untuk masuk ke sistem
                'password'      => 'required|min:6|max:64',
            ],
            [
                'password.min'  => 'Password minimal adalah :min karakter.',
                'password.max'  => 'Password maksimal adalah :max karakter.'
            ]
        );

        if (Auth::attempt($kredensi)) {
            $user = Pengguna::where('nomer_induk', $request->nomer_induk)->first();
            if ($user->status == 0) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return back()->with('masukGagal', 'Status akun Anda non-aktif. Jika ini sebuah kesalahan, segera hubungi Adminstrator Sistem.');
            }
            // Auth::logoutOtherDevices($request->password);
            $request->session()->regenerate();
            return redirect()->intended('dasbor');
        }
        return back()->with('masukGagal', 'Nomor ID atau Password Anda salah!');
    }

    public function keluar(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('keluar', 'Anda telah keluar dari sistem.');
    }
}
