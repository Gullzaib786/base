<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\AboutController;

// use App\Models\User;
use Illuminate\Support\Facades\DB;

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
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/', function () {
    $brands=DB::table('brands')->get();
    $about=DB::table('home_abouts')->first();
    $images=DB::table('multipics')->get();
    return view('home',compact('brands','about','images'));
});

Route::get('/about',[BaseController::class,'about']);
Route::get('/main',[BaseController::class,'main'])->middleware('age');
Route::get('/all/category',[CategoryController::class,'Allcat'])->name('allcat');
Route::get('/edit/cat/{id}',[CategoryController::class,'edit']);
Route::post('/update/cat/{id}',[CategoryController::class,'update']);
Route::get('/soft/delete/cat/{id}',[CategoryController::class,'softDelete']);
Route::get('/restore/category/{id}',[CategoryController::class,'restore']);
Route::get('/permanent/delete/category/{id}',[CategoryController::class,'permanentDelete']);
Route::post('/add/category',[CategoryController::class,'Addcat'])->name('addcat');
// brand routes starts here
Route::get('/all/brand',[BrandController::class,'Allbrand'])->name('allbrand');
Route::post('/add/brand',[BrandController::class,'store'])->name('addbrand');
Route::get('/edit/brand/{id}',[BrandController::class,'edit']);
Route::post('/update/brand/{id}',[BrandController::class,'update']);
Route::get('/delete/brand/{id}',[BrandController::class,'delete']);
// multi image starts here
Route::get('all/pics',[BrandController::class,'multipic'])->name('allmultipic');
Route::post('/store/pics',[BrandController::class,'storePics'])->name('store.pics');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    // $users = User::all();
    $users = DB::table('users')->get();
    return view('admin.index');

})->name('dashboard');

Route::get('user/logout',[UserController::class,'logout'])->name('user.logout');

//admin routers

Route::get('all/slider',[SliderController::class,'HomeSlider'])->name('all.slider');
Route::get('create/slider',[SliderController::class,'CreateSlider'])->name('create.slider');
Route::post('store/slider',[SliderController::class,'StoreSlider'])->name('store.slider');

//Home about

Route::get('home/about',[AboutController::class,'HomeAbout'])->name('all.home.about');
Route::get('create/about',[AboutController::class,'CreateAbout'])->name('create.about');
Route::post('store/about',[AboutController::class,'StoreAbout'])->name('store.about');
Route::get('edit/about/{id}',[AboutController::class,'EditAbout']);
Route::post('update/about/{id}',[aboutController::class,'UpdateAbout']);
Route::get('delete/about/{id}',[AboutController::class,'DeleteAbout']);
