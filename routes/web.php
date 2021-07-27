<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\OutcomeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostController;




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

// Page Routes

//Home Page
Route::get('/', [PagesController::class, 'index'])->name('home');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware(['auth'])->prefix('dashboard')->group(function () {

    //Activities
    Route::resource('activities', ActivityController::class);

    //Outcomes
    Route::resource('outcomes', OutcomeController::class);

    //Posts
    Route::resource('posts', PostController::class);

});


