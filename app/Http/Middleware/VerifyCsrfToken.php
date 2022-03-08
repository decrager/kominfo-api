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
        '/AgendaCrt','/AgendaUpd/*','AgendaDest/*',
        '/AlbumCrt','/AlbumUpd/*','AlbumDest/*',
        '/BannerCrt','/BannerUpd/*','BannerDest/*',
        '/BeritaCrt','/BeritaUpd/*','BeritaDest/*',
        '/DokumenCrt','/DokumenUpd/*','DokumenDest/*',
        '/FaqCrt','/FaqUpd/*','FaqDest/*',
        '/GalerifotoCrt','/GalerifotoUpd/*','GalerifotoDest/*',
        '/GalerivideoCrt','/GalerivideoUpd/*','GalerivideoDest/*',
        '/HalstatisCrt','/HalstatisUpd/*','HalstatisDest/*',
        '/HeaderslideCrt','/HeaderslideUpd/*','HeaderslideDest/*',
        '/KatBeritaCrt','/KatBeritaUpd/*','KatBeritaDest/*',
        '/Kat_halstatisCrt','/Kat_halstatisUpd/*','Kat_halstatisDest/*',
        '/PenggunaCrt','/PenggunaUpd/*','PenggunaDest/*',
        '/ProfilopdCrt','/ProfilopdUpd/*','ProfilopdDest/*',
    ];
}
