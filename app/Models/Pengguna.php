<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

// use Illuminate\Database\Eloquent\Model;

class Pengguna extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $primaryKey = 'user_id';
    protected $guarded = ['user_id']; //ini diisi increment
    // protected $with = ['kategori', 'author']; //menggunakan eiger loading di models
    public function getRouteKeyName() //untuk menjadikan key name route
    {
        return 'user_id';
    }
    // use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'username',
    //     'email',
    //     'password',
    // ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    //ini relasi ke model post
    public function post()
    {
        return $this->hasMany(Post::class);
    }
}
