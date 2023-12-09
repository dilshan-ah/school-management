<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewsEventController;
use App\Http\Controllers\OnlineExamController;
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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('home');
    });

    

    Route::get('/add-news-events',[NewsEventController::class, 'index'])->name('add.news-events');
    Route::post('/add-news-events',[NewsEventController::class, 'create'])->name('create.news-events');
    Route::get('/events-news',[NewsEventController::class, 'show'])->name('news-event');
    Route::get('/single-events-news/{id}',[NewsEventController::class, 'singleview'])->name('single.news-event');
    Route::get('/edit-events-news/{id}',[NewsEventController::class, 'edit'])->name('edit.news-event');
    Route::patch('/update-events-news/{id}',[NewsEventController::class, 'update'])->name('update.news-event');
    Route::delete('/delete-events-news/{id}',[NewsEventController::class, 'destroy'])->name('delete.news-event');



    Route::get('/exam',[OnlineExamController::class,'index'])->name('exam');
    Route::get('/add-exam',[OnlineExamController::class,'create'])->name('add.exam');



    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
