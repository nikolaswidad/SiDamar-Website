<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PresentController;
use App\Http\Controllers\BulanKasController;
use App\Http\Controllers\PembayaranKasController;
use App\Http\Controllers\ArsipFilmController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostCategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Models\ArsipFilm;

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

// Home
Route::get('/', function () {
    return view('index');
});

// login logout
Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::post('/login',[LoginController::class, 'authenticate']);
Route::get('/logout',[LoginController::class, 'logout']);

// blog
// Route::get('/posts', [PostController::class, 'index']);

Route::get('/test',function(){
    return view('blog.isi');
});
Route::get('/blog/{slug}',[PostController::class, 'show'])->name('isi');

Route::resource('/blog',PostController::class);


/****/

// Dashboard Member Start
Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');
Route::get('/merchandise', function(){
    return view('merchandise');
});
Route::get('/donation', function(){
    return view('donation');
});
Route::get('/form-donation', function(){
    return view('form-donation');
});
Route::get('/dashboard/event', function(){
    return view('dashboard.event');
});
Route::get('/dashboard/kas', function(){
    return view('dashboard.kas');
});
Route::get('/dashboard/presents', function(){
    return view('dashboard.present');
});
Route::get('/dashboard/donasi', function(){
    return view('dashboard.donasi');
});
Route::get('/dashboard/merch', function(){
    return view('dashboard.merch');
});
Route::get('/dashboard/finance', function(){
    return view('dashboard.finance');
});
// Dashboard Member End

// Dashboard Template Start
Route::get('/dashboard/template/form', function(){
    return view('dashboard.template.form');
});
// Dashboar Template End

/****/

// Dashboard Admin Start
Route::resource('/dashboard/admin/event', EventController::class);
Route::resource('/dashboard/admin/presents', PresentController::class);


// Dashboard Admin End

/****/

// Dashboard Author Start
Route::get('/dashboard/posts/deleted',[DashboardPostController::class, 'deleted']);
Route::get('/dashboard/posts/restore/{id}',[DashboardPostController::class, 'restore'])->name('posts.restore');
Route::delete('/dashboard/posts/kill/{id}',[DashboardPostController::class, 'kill'])->name('posts.kill');
Route::resource('/dashboard/posts',DashboardPostController::class);
Route::resource('/dashboard/posts',DashboardPostController::class);
Route::resource('dashboard/categories',PostCategoryController::class);


// Route::get('/posts', [PostController::class, 'index']);
// Dashboard Author End

//Dashboard Bulan Kas
Route::resource('/dashboard/bulanKas', BulanKasController::class);

//Dashboard Pembayaran Kas
Route::resource('/dashboard/pembayaranKas', PembayaranKasController::class);
Route::get('/dashboard/pembayaranKas/create/{bulanKasId}', [PembayaranKasController::class, 'create']);
Route::post('/dashboard/pembayaranKas/{id}', [PembayaranKasController::class, 'store']);
Route::get('/dashboard/pembayaranKas/{bulanKasId}/{pembayaranKasId}/edit', [PembayaranKasController::class, 'edit']);


//Dashboard Arsip Film
Route::resource('/dashboard/arsipFilm', ArsipFilmController::class);
//the /arsipFilm is the path, ArsipFilmController is the controller
//i want the create2.blade.php to connected to ArsipFilmController in create method
Route::get('/arsipFilm', [ArsipFilmController::class, 'create2']);
//the forrm is in create2.blade.php
//the form is connected to ArsipFilmController in store method
Route::get('/arsipFilm/{id}', [ArsipFilmController::class, 'show']);
//if user not doing login, they can fill form from arsipfil.blade.php
//if they login, they can fill form from dashboard/arsipFilm/create.blade.php

//About Page
Route::get('/about', function () {
    return view('about');
});

//if request from button Diterima then run method diterima() else ditolak()
