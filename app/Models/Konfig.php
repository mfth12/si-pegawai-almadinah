<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Konfig extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $primaryKey = 'konfig_id';
    protected $guarded = ['konfig_id']; //dilindungi agar tidak ada input yang masuk ke user_id
    public $timestamps = false; // tidak menggunakan timestamps
    public function getRouteKeyName() //untuk menjadikan key name route
    {
        return 'konfig_id';
    }
}
