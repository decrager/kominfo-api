<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profilopd extends Model
{
    use HasFactory;
    protected $table = 'profilopds';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $fillable = [
        'nama_opd',
        'foto_kantor',
        'nama_kepalaopd',
        'foto_kepalaopd',
        'alamat',
        'telp',
        'email',
        'website',
        'twitter_widget',
        'twitter_link',
        'ig_widget',
        'ig_link',
        'facebook_widget',
        'facebook_link'
    ];
}
