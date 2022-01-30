<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    protected $table = 'albums';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $fillable = [
        'judul',
        'tgl',
        'cover',
        'user_id'
    ];

    public function Pengguna(){
        return $this->belongsTo(Pengguna::class, 'user_id', 'id');
    }

    public function Galerifoto(){
        return $this->hasMany(Galerifoto::class, 'album_id', 'id');
    }
}
