<?php

use App\Models\PersonalAccessToken;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\FormController;
use App\Http\Controllers\API\BeritaController;
use App\Http\Controllers\API\DokumenController;
use App\Http\Controllers\API\FaqController;
use App\Http\Controllers\API\KatBeritaController;
use App\Http\Controllers\API\PenggunaController;
use App\Http\Controllers\API\AgendaController;
use App\Http\Controllers\API\ProfilopdController;
use App\Http\Controllers\API\BannerController;
use App\Http\Controllers\API\HeaderslideController;
use App\Http\Controllers\API\AlbumController;
use App\Http\Controllers\API\KatHalStatisController;
use App\Http\Controllers\API\HalstatisController;
use App\Http\Controllers\API\GalerifotoController;
use App\Http\Controllers\API\GalerivideoController;
use App\Http\Controllers\API\VisitorController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/statistic', function () {
    return view('statistic');
})->middleware(['auth', 'verified'])->name('statistic');

Route::get('/registeredUser', [UserController::class, 'index'])->middleware(['auth', 'verified'])->name('registeredUser');

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/form', [FormController::class, 'index']);

    // CRUD table Agendas
    Route::get('/Agenda', [AgendaController::class, 'view']); // GET ALL
    Route::get('/Agenda/{id}', [AgendaController::class, 'viewById']); // GET by ID
    Route::post('/AgendaCrt', [AgendaController::class, 'create']); // POST
    Route::put('/AgendaUpd/{id}', [AgendaController::class, 'update']); // PUT
    Route::delete('/AgendaDest/{id}', [AgendaController::class, 'destroy']); // DELETE
    
    // CRUD table Albums
    Route::get('/Album', [AlbumController::class, 'view']); // GET ALL
    Route::get('/Album/{id}', [AlbumController::class, 'viewById']); // GET by ID
    Route::post('/AlbumCrt', [AlbumController::class, 'create']); // POST
    Route::post('/AlbumUpd/{id}', [AlbumController::class, 'update']); // PUT
    Route::delete('/AlbumDest/{id}', [AlbumController::class, 'destroy']); // DELETE

    // CRUD table Banners
    Route::get('/Banner', [BannerController::class, 'view']); // GET ALL
    Route::get('/Banner/{id}', [BannerController::class, 'viewById']); // GET by ID
    Route::post('/BannerCrt', [BannerController::class, 'create']); // POST
    Route::post('/BannerUpd/{id}', [BannerController::class, 'update']); // PUT
    Route::delete('/BannerDest/{id}', [BannerController::class, 'destroy']); // DELETE

    // CRUD table Beritas
    Route::get('/Berita', [BeritaController::class, 'view']); // GET All
    Route::get('/Berita/{id}', [BeritaController::class, 'viewById']); // GET by ID
    Route::post('/BeritaCrt', [BeritaController::class, 'create']); // POST
    Route::post('/BeritaUpd/{id}', [BeritaController::class, 'update']); // PUT
    Route::delete('/BeritaDest/{id}', [BeritaController::class, 'destroy']); // DELETE

    // CRUD table Dokumen
    Route::get('/Dokumen', [DokumenController::class, 'view']);
    Route::get('/Dokumen/{id}', [DokumenController::class, 'viewById']);
    Route::post('/DokumenCrt', [DokumenController::class, 'create']);
    Route::put('/DokumenUpd/{id}', [DokumenController::class, 'update']);
    Route::delete('/DokumenDest/{id}', [DokumenController::class, 'destroy']);

    // CRUD table Faq
    Route::get('/Faq', [FaqController::class, 'view']);
    Route::get('/Faq/{id}', [FaqController::class, 'viewById']);
    Route::post('/FaqCrt', [FaqController::class, 'create']);
    Route::put('/FaqUpd/{id}', [FaqController::class, 'update']);
    Route::delete('/FaqDest/{id}', [FaqController::class, 'destroy']);
    
    // CRUD table Galerifotos
    Route::get('/Galerifoto', [GalerifotoController::class, 'view']); // GET ALL
    Route::get('/Galerifoto/{id}', [GalerifotoController::class, 'viewById']); // GET by ID
    Route::post('/GalerifotoCrt', [GalerifotoController::class, 'create']); // POST
    Route::post('/GalerifotoUpd/{id}', [GalerifotoController::class, 'update']); // PUT
    Route::delete('/GalerifotoDest/{id}', [GalerifotoController::class, 'destroy']); // DELETE

    // CRUD table Galerivideos
    Route::get('/Galerivideo', [GalerivideoController::class, 'view']); // GET ALL
    Route::get('/Galerivideo/{id}', [GalerivideoController::class, 'viewById']); // GET by ID
    Route::post('/GalerivideoCrt', [GalerivideoController::class, 'create']); // POST
    Route::post('/GalerivideoUpd/{id}', [GalerivideoController::class, 'update']); // PUT
    Route::delete('/GalerivideoDest/{id}', [GalerivideoController::class, 'destroy']); // DELETE

    // CRUD table Halstatis
    Route::get('/Halstatis', [HalstatisController::class, 'view']); // GET ALL
    Route::get('/Halstatis/{id}', [HalstatisController::class, 'viewById']); // GET by ID
    Route::post('/HalstatisCrt', [HalstatisController::class, 'create']); // POST
    Route::post('/HalstatisUpd/{id}', [HalstatisController::class, 'update']); // PUT
    Route::delete('/HalstatisDest/{id}', [HalstatisController::class, 'destroy']); // DELETE

    // CRUD table Headerslides
    Route::get('/Headerslide', [HeaderslideController::class, 'view']); // GET ALL
    Route::get('/Headerslide/{id}', [HeaderslideController::class, 'viewById']); // GET by ID
    Route::post('/HeaderslideCrt', [HeaderslideController::class, 'create']); // POST
    Route::post('/HeaderslideUpd/{id}', [HeaderslideController::class, 'update']); // PUT
    Route::delete('/HeaderslideDest/{id}', [HeaderslideController::class, 'destroy']); // DELETE

    // CRUD table Kat_beritas
    Route::get('/KatBerita', [KatBeritaController::class, 'view']); // GET ALL
    Route::get('/KatBerita/{id}', [KatBeritaController::class, 'viewById']); // GET by ID
    Route::post('/KatBeritaCrt', [KatBeritaController::class, 'create']); // POST
    Route::put('/KatBeritaUpd/{id}', [KatBeritaController::class, 'update']); // PUT
    Route::delete('/KatBeritaDest/{id}', [KatBeritaController::class, 'destroy']); // DELETE

    // CRUD table Kat_halstatis
    Route::get('/Kat_halstatis', [KatHalStatisController::class, 'view']); // GET ALL
    Route::get('/Kat_halstatis/{id}', [KatHalStatisController::class, 'viewById']); // GET by ID
    Route::post('/Kat_halstatisCrt', [KatHalStatisController::class, 'create']); // POST
    Route::put('/Kat_halstatisUpd/{id}', [KatHalStatisController::class, 'update']); // PUT
    Route::delete('/Kat_halstatisDest/{id}', [KatHalStatisController::class, 'destroy']); // DELETE

    // CRUD table Penggunas
    Route::get('/Pengguna', [PenggunaController::class, 'view']); // GET ALL
    Route::get('/Pengguna/{id}', [PenggunaController::class, 'viewById']); // GET by ID
    Route::post('/PenggunaCrt', [PenggunaController::class, 'create']); // POST
    Route::post('/PenggunaUpd/{id}', [PenggunaController::class, 'update']); // PUT
    Route::delete('/PenggunaDest/{id}', [PenggunaController::class, 'destroy']); // DELETE

    // CRUD table Profilopds
    Route::get('/Profilopd', [ProfilopdController::class, 'view']); // GET ALL
    Route::get('/Profilopd/{id}', [ProfilopdController::class, 'viewById']); // GET by ID
    Route::post('/ProfilopdCrt', [ProfilopdController::class, 'create']); // POST
    Route::post('/ProfilopdUpd/{id}', [ProfilopdController::class, 'update']); // PUT
    Route::delete('/ProfilopdDest/{id}', [ProfilopdController::class, 'destroy']); // DELETE

    // CRUD table Visitor
    Route::get('/Visitor', [VisitorController::class, 'view']);
    Route::get('/Visitor/{id}', [VisitorController::class, 'viewById']);
    Route::post('/VisitorCrt', [VisitorController::class, 'create']);
    Route::put('/VisitorUpd/{id}', [VisitorController::class, 'update']);
    Route::delete('/VisitorDest/{id}', [VisitorController::class, 'destroy']);
    
    // GET RELATION TABLES
    Route::get('/berita', [BeritaController::class, 'berita']); // Berita Table
    Route::get('/beritaPublic', [BeritaController::class, 'beritaPublic']); // Berita Table
    Route::get('/berita/{id}', [BeritaController::class, 'beritaById']); // Berita Table
    Route::get('/agenda', [AgendaController::class, 'agenda']); // Agenda Table
    Route::get('/agenda/{id}', [AgendaController::class, 'agendaById']); // Agenda Table
    Route::get('/album', [AlbumController::class, 'album']); // Album Table
    Route::get('/album/{id}', [AlbumController::class, 'albumById']); // Album Table
    Route::get('/halstatis', [HalstatisController::class, 'halstatis']); // Album Table
    Route::get('/halstatis/{id}', [HalstatisController::class, 'halstatisById']); // Album Table
    Route::get('/galerifoto', [GalerifotoController::class, 'galerifoto']); // Album Table
    Route::get('/galerifoto/{id}', [GalerifotoController::class, 'galerifotoById']); // Album Table
    Route::get('/galerivideo', [GalerivideoController::class, 'galerivideo']); // Album Table
    Route::get('/galerivideo/{id}', [GalerivideoController::class, 'galerivideoById']); // Album Table
});

Route::post('/loginAPI', [AuthController::class, 'login']);

require __DIR__ . '/auth.php';