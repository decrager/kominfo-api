<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Halstatis extends Model
{
    use HasFactory;
    protected $table = 'halstatis';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $fillable = [
        'judul',
        'kategori_id',
        'isi',
        'file',
        'tgl',
        'status',
        'user_id'
    ];

    public function Kat_halstatis()
    {
        return $this->belongsTo(Kat_HalStatis::class, 'kategori_id', 'id')
            ->select('id', 'kategori', 'keterangan');
    }

    public function Pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'user_id', 'id')
            ->select(
                'id',
                'nama',
                'email',
                'telp',
                'username',
                'password',
                'role',
                'foto',
                'level'
            );
    }
}
