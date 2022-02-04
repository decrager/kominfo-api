<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\FormController;
use App\Http\Controllers\API\BeritaController;
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

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/form', [FormController::class, 'index']);

    // CRUD table Agendas
    Route::get('/get/Agenda', [AgendaController::class, 'view']); // GET ALL
    Route::get('/get/Agenda/{id}', [AgendaController::class, 'viewById']); // GET by ID
    Route::post('/post/Agenda', [AgendaController::class, 'create']); // POST
    Route::put('/put/Agenda/{id}', [AgendaController::class, 'update']); // PUT
    Route::delete('/delete/Agenda/{id}', [AgendaController::class, 'destroy']); // DELETE
    
    // CRUD table Albums
    Route::get('/get/Album', [AlbumController::class, 'view']); // GET ALL
    Route::get('/get/Album/{id}', [AlbumController::class, 'viewById']); // GET by ID
    Route::post('/post/Album', [AlbumController::class, 'create']); // POST
    Route::post('/put/Album/{id}', [AlbumController::class, 'update']); // PUT
    Route::delete('/delete/Album/{id}', [AlbumController::class, 'destroy']); // DELETE

    // CRUD table Banners
    Route::get('/get/Banner', [BannerController::class, 'view']); // GET ALL
    Route::get('/get/Banner/{id}', [BannerController::class, 'viewById']); // GET by ID
    Route::post('/post/Banner', [BannerController::class, 'create']); // POST
    Route::post('/put/Banner/{id}', [BannerController::class, 'update']); // PUT
    Route::delete('/delete/Banner/{id}', [BannerController::class, 'destroy']); // DELETE

    // CRUD table Beritas
    Route::get('/get/Berita', [BeritaController::class, 'view']); // GET All
    Route::get('/get/Berita/{id}', [BeritaController::class, 'viewById']); // GET by ID
    Route::post('/post/Berita', [BeritaController::class, 'create']); // POST
    Route::post('/put/Berita/{id}', [BeritaController::class, 'update']); // PUT
    Route::delete('/delete/Berita/{id}', [BeritaController::class, 'destroy']); // DELETE

    // CRUD table Galerifotos
    Route::get('/get/Galerifoto', [GalerifotoController::class, 'view']); // GET ALL
    Route::get('/get/Galerifoto/{id}', [GalerifotoController::class, 'viewById']); // GET by ID
    Route::post('/post/Galerifoto', [GalerifotoController::class, 'create']); // POST
    Route::post('/put/Galerifoto/{id}', [GalerifotoController::class, 'update']); // PUT
    Route::delete('/delete/Galerifoto/{id}', [GalerifotoController::class, 'destroy']); // DELETE

    // CRUD table Galerivideos
    Route::get('/get/Galerivideo', [GalerivideoController::class, 'view']); // GET ALL
    Route::get('/get/Galerivideo/{id}', [GalerivideoController::class, 'viewById']); // GET by ID
    Route::post('/post/Galerivideo', [GalerivideoController::class, 'create']); // POST
    Route::post('/put/Galerivideo/{id}', [GalerivideoController::class, 'update']); // PUT
    Route::delete('/delete/Galerivideo/{id}', [GalerivideoController::class, 'destroy']); // DELETE

    // CRUD table Halstatis
    Route::get('/get/Halstatis', [HalstatisController::class, 'view']); // GET ALL
    Route::get('/get/Halstatis/{id}', [HalstatisController::class, 'viewById']); // GET by ID
    Route::post('/post/Halstatis', [HalstatisController::class, 'create']); // POST
    Route::post('/put/Halstatis/{id}', [HalstatisController::class, 'update']); // PUT
    Route::delete('/delete/Halstatis/{id}', [HalstatisController::class, 'destroy']); // DELETE

    // CRUD table Headerslides
    Route::get('/get/Headerslide', [HeaderslideController::class, 'view']); // GET ALL
    Route::get('/get/Headerslide/{id}', [HeaderslideController::class, 'viewById']); // GET by ID
    Route::post('/post/Headerslide', [HeaderslideController::class, 'create']); // POST
    Route::post('/put/Headerslide/{id}', [HeaderslideController::class, 'update']); // PUT
    Route::delete('/delete/Headerslide/{id}', [HeaderslideController::class, 'destroy']); // DELETE

    // CRUD table Kat_beritas
    Route::get('/get/KatBerita', [KatBeritaController::class, 'view']); // GET ALL
    Route::get('/get/KatBerita/{id}', [KatBeritaController::class, 'viewById']); // GET by ID
    Route::post('/post/KatBerita', [KatBeritaController::class, 'create']); // POST
    Route::put('/put/KatBerita/{id}', [KatBeritaController::class, 'update']); // PUT
    Route::delete('/delete/KatBerita/{id}', [KatBeritaController::class, 'destroy']); // DELETE

    // CRUD table Kat_halstatis
    Route::get('/get/Kat_halstatis', [KatHalStatisController::class, 'view']); // GET ALL
    Route::get('/get/Kat_halstatis/{id}', [KatHalStatisController::class, 'viewById']); // GET by ID
    Route::post('/post/Kat_halstatis', [KatHalStatisController::class, 'create']); // POST
    Route::put('/put/Kat_halstatis/{id}', [KatHalStatisController::class, 'update']); // PUT
    Route::delete('/delete/Kat_halstatis/{id}', [KatHalStatisController::class, 'destroy']); // DELETE

    // CRUD table Penggunas
    Route::get('/get/Pengguna', [PenggunaController::class, 'view']); // GET ALL
    Route::get('/get/Pengguna/{id}', [PenggunaController::class, 'viewById']); // GET by ID
    Route::post('/post/Pengguna', [PenggunaController::class, 'create']); // POST
    Route::post('/put/Pengguna/{id}', [PenggunaController::class, 'update']); // PUT
    Route::delete('/delete/Pengguna/{id}', [PenggunaController::class, 'destroy']); // DELETE

    // CRUD table Profilopds
    Route::get('/get/Profilopd', [ProfilopdController::class, 'view']); // GET ALL
    Route::get('/get/Profilopd/{id}', [ProfilopdController::class, 'viewById']); // GET by ID
    Route::post('/post/Profilopd', [ProfilopdController::class, 'create']); // POST
    Route::post('/put/Profilopd/{id}', [ProfilopdController::class, 'update']); // PUT
    Route::delete('/delete/Profilopd/{id}', [ProfilopdController::class, 'destroy']); // DELETE

    // GET RELATION TABLES
    Route::get('/berita', [BeritaController::class, 'berita']); // Berita Table
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

Route::post('/login', [AuthController::class, 'login']);
