<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kat_HalStatis extends Model
{
    use HasFactory;
    protected $table = 'kat_halstatis';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $fillable = ['kategori', 'keterangan'];

    public function Halstatis(){
        return $this->hasMany(Halstatis::class, 'kategori_id', 'id');
    }
}
