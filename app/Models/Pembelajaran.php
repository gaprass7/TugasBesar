<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelajaran extends Model
{
    use HasFactory;

    protected $table = 'pembelajaran';
    protected $fillable = ['kursus_id', 'materi_id'];

    public function kursus(){
        return $this->belongsTo(Kursus::class);
    }

    public function materi(){
        return $this->belongsTo(Materi::class);
    }
}
