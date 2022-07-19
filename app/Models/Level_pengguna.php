<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level_pengguna extends Model
{
    use HasFactory;
    protected $guarded = ['id']; //dilindungi agar tidak ada input yang masuk ke user_id
    public $timestamps = false; // tidak menggunakan timestamps
}
