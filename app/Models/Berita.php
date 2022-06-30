<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'berita';
    protected $primaryKey = 'id';
    protected $guarded = ['id']; //dilindungi agar tidak ada input yang masuk ke user_id

}
