<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // protected $fillable = ['title', 'slug', 'excerpt', 'body']; //yang bisa diinput
    protected $guarded = ['post_id']; //ini diisi increment
    protected $with = ['kategori', 'author']; //menggunakan eiger loading di models

    public function kategori() {
        return $this->belongsTo(Kategori::class, 'kateg_id', 'kateg_id'); 
        //yg pertama foreign-key //yg kedua owner-key
    }
    
    public function author() {
        return $this->belongsTo(User::class, 'user_id', 'id'); 
        //yg pertama foreign-key //yg kedua owner-key
    }
}