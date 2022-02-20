<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galerivideo extends Model
{
    use HasFactory;
    protected $table = 'galerivideos';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $fillable = [
        'judul',
        'cover',
        'embed',
        'keterangan',
        'user_id'
    ];

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
