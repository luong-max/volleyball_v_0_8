<?php

use App\Http\Controllers\EquipeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});
*/


Route::controller(EquipeController::class)->group(function() {

    Route::get('/','index'); //[EquipeController::class,'index']
    Route::get('/equipe/create', 'create');
    Route::get('/equipe/{id}', 'show');
    Route::get('/equipe/{id}/edit', 'edit');

    Route::get('/lang/{locale}', [App\Http\Controllers\LocalizationController::class, 'index']);

    Route::post('/equipe', 'store');
    Route::patch('/equipe/{id}', 'update');
    Route::delete('/equipe/{id}', 'destroy');
    Route::resource("posts", PostController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    /**
    * Verification Routes
    */
    Route::get('/email/verify', 'VerificationController@show')->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', 'VerificationController@verify')->name('verification.verify')->middleware(['signed']);
    Route::post('/email/resend', 'VerificationController@resend')->name('verification.resend');
  
});

//only authenticated can access this group
Route::group(['middleware' => ['auth']], function() {
    //only verified account can access with this group
    Route::group(['middleware' => ['verified']], function() {
            /**
             * Dashboard Routes
             */
            Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');
    });
});