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

    public function scopeFilter($query, array $filters)
    {
        // if (isset($filters['cari']) ? $filters['cari'] : false) {
        //     return $query->where('title', 'like', '%' . $filters['cari'] . '%')
        //         ->orWhere('body', 'like', '%' . $filters['cari'] . '%');
        // }

        // ini aalah filter untuk pencarian $title dan $body
        $query->when($filters['cari'] ?? false, function($query, $cari) {
            return $query->where('title', 'like', '%' . $cari . '%')
                ->orWhere('body', 'like', '%' . $cari . '%');
        });
        
        // ini aalah filter untuk pencarian $kategori
        $query->when($filters['kateg'] ?? false, function($query, $kateg) {
            return $query->whereHas('kategori', function($query) use ($kateg) {
                $query->where('slug', $kateg);
            });
        });
        
        // ini aalah filter untuk pencarian $penulis
        $query->when($filters['penulis'] ?? false, function($query, $penulis) {
            return $query->whereHas('author', function($query) use ($penulis) {
                $query->where('username', $penulis);
            });
        });
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kateg_id', 'kateg_id');
        //yg pertama foreign-key //yg kedua owner-key
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
        //yg pertama foreign-key //yg kedua owner-key
    }
}
