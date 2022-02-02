<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $guarded = ['kateg_id']; //ini diisi increment

    public function post() {
        return $this->hasMany(Post::class, 'kateg_id', 'kateg_id');
    }
}
