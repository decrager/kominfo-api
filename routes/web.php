<?php

use App\Models\PersonalAccessToken;
use Illuminate\Support\Facades\Auth;
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
use Illuminate\Http\Request;
use App\Models\User;
use GuzzleHttp\Middleware;

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

Route::group(['middleware' => 'auth:sanctum'], function () {
    // CRUD table Agendas
    Route::get('/get/Agenda', [AgendaController::class, 'view']); // GET ALL
    Route::get('/get/Agenda/{id}', [AgendaController::class, 'viewById']); // GET by ID

    // CRUD table Albums
    Route::get('/get/Album', [AlbumController::class, 'view']); // GET ALL
    Route::get('/get/Album/{id}', [AlbumController::class, 'viewById']); // GET by ID

    // CRUD table Banners
    Route::get('/get/Banner', [BannerController::class, 'view']); // GET ALL
    Route::get('/get/Banner/{id}', [BannerController::class, 'viewById']); // GET by ID

    // CRUD table Beritas
    Route::get('/get/Berita', [BeritaController::class, 'view']); // GET All
    Route::get('/get/Berita/{id}', [BeritaController::class, 'viewById']); // GET by ID

    // CRUD table Galerifotos
    Route::get('/get/Galerifoto', [GalerifotoController::class, 'view']); // GET ALL
    Route::get('/get/Galerifoto/{id}', [GalerifotoController::class, 'viewById']); // GET by ID

    // CRUD table Galerivideos
    Route::get('/get/Galerivideo', [GalerivideoController::class, 'view']); // GET ALL
    Route::get('/get/Galerivideo/{id}', [GalerivideoController::class, 'viewById']); // GET by ID

    // CRUD table Halstatis
    Route::get('/get/Halstatis', [HalstatisController::class, 'view']); // GET ALL
    Route::get('/get/Halstatis/{id}', [HalstatisController::class, 'viewById']); // GET by ID

    // CRUD table Headerslides
    Route::get('/get/Headerslide', [HeaderslideController::class, 'view']); // GET ALL
    Route::get('/get/Headerslide/{id}', [HeaderslideController::class, 'viewById']); // GET by ID

    // CRUD table Kat_beritas
    Route::get('/get/KatBerita', [KatBeritaController::class, 'view']); // GET ALL
    Route::get('/get/KatBerita/{id}', [KatBeritaController::class, 'viewById']); // GET by ID

    // CRUD table Kat_halstatis
    Route::get('/get/Kat_halstatis', [KatHalStatisController::class, 'view']); // GET ALL
    Route::get('/get/Kat_halstatis/{id}', [KatHalStatisController::class, 'viewById']); // GET by ID

    // CRUD table Penggunas
    Route::get('/get/Pengguna', [PenggunaController::class, 'view']); // GET ALL
    Route::get('/get/Pengguna/{id}', [PenggunaController::class, 'viewById']); // GET by ID

    // CRUD table Profilopds
    Route::get('/get/Profilopd', [ProfilopdController::class, 'view']); // GET ALL
    Route::get('/get/Profilopd/{id}', [ProfilopdController::class, 'viewById']); // GET by ID

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

Route::get('/dashboard', function (Request $request) {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
