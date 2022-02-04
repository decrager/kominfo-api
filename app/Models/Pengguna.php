<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;
    protected $table = 'penggunas';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $fillable = ['nama', 'email', 'telp', 'username', 'password', 'role', 'foto', 'level'];

    public function Berita(){
        return $this->hasMany(Berita::class, 'user_id', 'id');
    }

    public function Agenda(){
        return $this->hasMany(Agenda::class, 'user_id', 'id');
    }

    public function Album(){
        return $this->hasMany(Album::class, 'user_id', 'id');
    }

    public function Halstatis(){
        return $this->hasMany(Halstatis::class, 'user_id', 'id');
    }

    public function Galerivideo(){
        return $this->hasMany(Galerivideo::class, 'user_id', 'id');
    }
}
