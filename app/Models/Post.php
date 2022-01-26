<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // protected $fillable = ['title', 'slug', 'excerpt', 'body']; //yang bisa diinput
    protected $guarded = ['post_id']; //ini diisi increment
}