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
    return view('welcome');
});

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/api/berita', [BeritaController::class, 'berita']); // Berita Table
    Route::get('/api/berita/{id}', [BeritaController::class, 'beritaById']); // Berita Table
    Route::get('/api/agenda', [AgendaController::class, 'agenda']); // Agenda Table
    Route::get('/api/agenda/{id}', [AgendaController::class, 'agendaById']); // Agenda Table
    Route::get('/api/album', [AlbumController::class, 'album']); // Album Table
    Route::get('/api/album/{id}', [AlbumController::class, 'albumById']); // Album Table
    Route::get('/api/halstatis', [HalstatisController::class, 'halstatis']); // Album Table
    Route::get('/api/halstatis/{id}', [HalstatisController::class, 'halstatisById']); // Album Table
    Route::get('/api/galerifoto', [GalerifotoController::class, 'galerifoto']); // Album Table
    Route::get('/api/galerifoto/{id}', [GalerifotoController::class, 'galerifotoById']); // Album Table
    Route::get('/api/galerifoto', [GalerifotoController::class, 'galerifoto']); // Album Table
    Route::get('/api/galerifoto/{id}', [GalerifotoController::class, 'galerifotoById']); // Album Table
});

Route::get('/dashboard', function (Request $request) {
    $token = PersonalAccessToken::where('tokenable_id', Auth::user()->id)->firstOrFail();
    return view('dashboard', ['token'=>$token]);
    // $user = User::where('email', $request->email)->first();
    // $token = $user->$request->bearerToken();
    // return view('dashboard', $token);
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
