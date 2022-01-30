<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $table = 'banners';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $fillable = [
        'judul',
        'kategori',
        'file',
        'link',
        'status'
    ];
}
