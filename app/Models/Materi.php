<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    protected $table = 'materi';
    protected $fillable = ['judul', 'deskripsi', 'link_embed'];

    public function pembelajaran(){
        return $this->hasMany(Pembelajaran::class);
    }
}
