<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kursus extends Model
{
    use HasFactory;

    protected $table = 'kursus';
    protected $fillable = ['foto', 'judul', 'deskripsi', 'durasi'];

    public function pembelajaran(){
        return $this->hasMany(Pembelajaran::class);
    }

    // public function materi(){
    //     return $this->belongsToMany(Materi::class);
    // }

    public function materi()
    {
        return $this->belongsToMany(Materi::class, 'pembelajaran', 'kursus_id', 'materi_id');
    }
}
