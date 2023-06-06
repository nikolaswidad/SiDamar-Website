    <?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PresentController;
use App\Http\Controllers\BulanKasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostCategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DonateController;


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
Route::post('/logout',[LoginController::class, 'logout']);

// blog
// Route::get('/posts', [PostController::class, 'index']);

Route::get('/test',function(){
    return view('blog.isi');
});
Route::get('/blog/{slug}',[PostController::class, 'show'])->name('isi');

Route::resource('/blog',PostController::class);


Route::resource('/donate',DonateController::class);

// Route::get('/donate', function(){
//     return view('donate');
// });

/****/

// Dashboard Member Start
Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');
// Route::get('/merch/buy', function(){
//     return view('merch.buy');
// });
// Route::get('/donation', function(){
//     return view('donation');
// });
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
Route::get('/donation', function(){
    return view('dashboard.donation');
});
// Route::get('/dashboard/merch', function(){
//     return view('dashboard.merch');
// });
// Route::get('/dashboard/finance', function(){
//     return view('dashboard.finance');
// });
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

// //Dashboard Donasi
Route::resource('/dashboard/donation', App\Http\Controllers\donationController::class);
Route::get('/donatur', [App\Http\Controllers\donationController::class, 'index2']);
Route::get('/donatur/cetak/{id}', [App\Http\Controllers\donaturController::class, 'invoice'])->name('invoice');
Route::get('/donatur/create', [App\Http\Controllers\donaturController::class, 'store']);
Route::get('/donatur/create', [App\Http\Controllers\donaturController::class, 'create']);
Route::resource('/dashboard/donatur', App\Http\Controllers\donaturController::class);

//Dashboard Finances
Route::resource('/dashboard/finances', App\Http\Controllers\financeController::class);

//Dashboard Merch
Route::resource('/merch', App\Http\Controllers\MerchController::class);
Route::get('/merch', [App\Http\Controllers\MerchController::class, 'index2']);
Route::get('/customer/cetak/{id}', [App\Http\Controllers\CustomerController::class, 'invoice'])->name('invoice');
Route::get('/merch/create', [App\Http\Controllers\CustomerController::class, 'store']);
Route::get('/merch/create', [App\Http\Controllers\CustomerController::class, 'create']);
Route::resource('/dashboard/customer', App\Http\Controllers\CustomerController::class);
Route::get('/get-product-price/{id}', [App\Http\Controllers\CustomerController::class, 'getProductPrice']);

Route::resource('/dashboard/merch', App\Http\Controllers\MerchController::class);

