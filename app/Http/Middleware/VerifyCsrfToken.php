<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        '/loginAPI',
        '/AgendaCrt','/AgendaUpd/{id}','AgendaDest/{id}',
        '/AlbumCrt','/AlbumUpd/{id}','AlbumDest/{id}',
        '/BannerCrt','/BannerUpd/{id}','BannerDest/{id}',
        '/BeritaCrt','/BeritaUpd/{id}','BeritaDest/{id}',
        '/GalerifotoCrt','/GalerifotoUpd/{id}','GalerifotoDest/{id}',
        '/GalerivideoCrt','/GalerivideoUpd/{id}','GalerivideoDest/{id}',
        '/HalstatisCrt','/HalstatisUpd/{id}','HalstatisDest/{id}',
        '/HeaderslideCrt','/HeaderslideUpd/{id}','HeaderslideDest/{id}',
        '/KatBeritaCrt','/KatBeritaUpd/{id}','KatBeritaDest/{id}',
        '/Kat_halstatisCrt','/Kat_halstatisUpd/{id}','Kat_halstatisDest/{id}',
        '/PenggunaCrt','/PenggunaUpd/{id}','PenggunaDest/{id}',
        '/ProfilopdCrt','/ProfilopdUpd/{id}','ProfilopdDest/{id}',
    ];
}
