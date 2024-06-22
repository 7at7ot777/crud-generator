<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\ScreenController;
use App\Http\Controllers\ScreenOwnerController;
use App\Http\Controllers\StudioControlle;
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

Route::get('/', function () {
    return redirect(\route('loginPage'));
});
Route::get('/loginPage',function (){
    return view('login');
})->name('loginPage');
Route::post('/login',[\App\Http\Controllers\AuthenticationController::class,'login'])->name('login');


Route::middleware('auth')->group(function(){
    Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');
    Route::resource('screen_owner',ScreenOwnerController::class);
    Route::resource('screens',ScreenController::class);
    Route::resource('locations',LocationController::class);
    Route::resource('playlists',PlaylistController::class);
    Route::resource('studios', StudioControlle::class);
    Route::resource('media', MediaController::class);

});


