<?php

use App\Models\CategoryJurnalistik;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SastraController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\FotografiController;
use App\Http\Controllers\JurnalistikController;
use App\Http\Controllers\DashboardSastraController;
use App\Http\Controllers\AdminControllerJurnalistik;
use App\Http\Controllers\DashboardFotografiController;
use App\Http\Controllers\KomentarJurnalistikController;
use App\Http\Controllers\DashboardJurnalistikController;

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
    return view('home', [
        "tittle" => "Beranda",
    ]);
});


Route::get('/sastra', [SastraController::class, 'index']);
Route::get('sastra/{sastra:slug}', [SastraController::class, 'show']);


Route::get('/jurnalistik', [JurnalistikController::class, 'index']);
Route::get('/jurnalistik/{jurnalistik:slug}', [JurnalistikController::class, 'show'])->name('jurnalistik');
Route::post('/jurnalistik/komentar', [JurnalistikController::class, 'komentar']);

// Route::post('jurnalistik/komentar', [KomentarJurnalistikController::class, 'show']);


// search ajax
// Route::get('/ajax', [JurnalistikController::class, 'ajax']);
// Route::get('/search-list', [JurnalistikController::class, 'read']);


Route::get('/fotografi', [FotografiController::class, 'index']);
Route::get('fotografi/{fotografi:slug)', [FotografiController::class, 'show']);


Route::get('/tentang', function () {
    return view('tentang', [
        "tittle" => "Tentang",
        "nama" => "Pena Muda",
        "email" => "penamudaofficially@gmail.com",
        "tempat" => "Universitas Bhayangkara Jakarta Raya"
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function(){
    return view('dashboard.index',[
        "tittle" => "Dashboard",
        "active" => "dashboard"
    ]);
})->middleware('admin');

Route::resource('/dashboard/jurnalistik', DashboardJurnalistikController::class)->middleware('admin');

Route::resource('/dashboard/sastra', DashboardSastraController::class)->middleware('admin');

Route::resource('/dashboard/fotografi', DashboardFotografiController::class)->middleware('admin');

Route::resource('/dashboard/categoryjurnalistik', AdminControllerJurnalistik::class)->except('show')->middleware('admin');


// View::composer('partials.navbar', function($view){
//     $categoryJurnalistik = CategoryJurnalistik::whereParent(0)->get();
//     $view->with('menu_category_jurnalistiks', $categoryJurnalistik);
// });