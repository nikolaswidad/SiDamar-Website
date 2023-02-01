    <?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

Route::get('/login/', function () {
    return view('login.login');
});

// Dashboard Member Start
Route::get('/dashboard/', function(){
    return view('dashboard.index');
});
Route::get('/dashboard/event', function(){
    return view('dashboard.event');
});
Route::get('/dashboard/kas', function(){
    return view('dashboard.kas');
});
Route::get('/dashboard/presensi', function(){
    return view('dashboard.presensi');
});
// Dashboard Member End

// Dashboard Admin Start
Route::resource('/dashboard/admin/event', EventController::class);


// Dashboard Admin End


// Dashboard Author Start
Route::resource('/dashboard/posts',PostController::class);

// Dashboard Author End