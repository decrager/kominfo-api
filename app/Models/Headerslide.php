<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Headerslide extends Model
{
    use HasFactory;
    protected $table = 'headerslides';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $fillable = [
        'judul',
        'file',
        'keterangan',
        'status'
    ];
}
