<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_pengguna extends Model
{
    use HasFactory;
    protected $guarded = ['detail_user_id'];
    public $timestamps = false; // tidak menggunakan timestamps
    // public function getRouteKeyName() //untuk menjadikan key name route
    // {
    //     return 'detail_user_id';
    // }
    // protected $fillable = [
    //     'nama_arab',
    //     'nisn',
    //     'asal',
    //     'tempat_lahir',
    // ];

    //relasi revert ke tabel pengguna
    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'user_id', 'user_id');
        //yg pertama foreign-key //yg kedua owner-key
    }
}
