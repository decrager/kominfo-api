<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kat_berita extends Model
{
    use HasFactory;
    protected $table = 'kat_beritas';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $fillable = ['kategori', 'keterangan']; 

    public function Berita(){
        return $this->hasMany(Berita::class, 'kategori_id', 'id');
    }
}
