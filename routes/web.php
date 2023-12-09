<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewsEventController;
use App\Http\Controllers\OnlineExamController;
use App\Http\Controllers\ClassRoutineController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\MarkController;
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
    // Route::get('/', function () {
    //     return view('home');
    // });


    Route::get('/',[HomeController::class,'index'])->name('home');


    Route::middleware(['teacher'])->group(function () {
        Route::get('/add-exam',[OnlineExamController::class,'create'])->name('add.exam');
        Route::post('/add-exam',[OnlineExamController::class,'store'])->name('create.exam');
        Route::get('/edit-exam/{id}',[OnlineExamController::class,'edit'])->name('edit.exam');
        Route::patch('/edit-exam/{id}',[OnlineExamController::class,'update'])->name('update.exam');
        Route::delete('/delete-exam/{id}',[OnlineExamController::class,'destroy'])->name('delete.exam');
    
    
        Route::get('/add-news-events',[NewsEventController::class, 'index'])->name('add.news-events');
        Route::post('/add-news-events',[NewsEventController::class, 'create'])->name('create.news-events');
        Route::get('/edit-events-news/{id}',[NewsEventController::class, 'edit'])->name('edit.news-event');
        Route::patch('/update-events-news/{id}',[NewsEventController::class, 'update'])->name('update.news-event');
        Route::delete('/delete-events-news/{id}',[NewsEventController::class, 'destroy'])->name('delete.news-event');
    
    
    
        Route::get('/add-class',[ClassRoutineController::class,'create'])->name('add.class');
        Route::post('/add-class',[ClassRoutineController::class,'store'])->name('store.class');
        Route::get('/edit-class/{id}',[ClassRoutineController::class,'edit'])->name('edit.class');
        Route::patch('/update-class/{id}',[ClassRoutineController::class,'update'])->name('update.class');
        Route::delete('/delete-class/{id}',[ClassRoutineController::class,'destroy'])->name('delete.class');
    
    
    
        Route::get('/add-question', [QuestionController::class,'create'])->name('add.question');
        Route::post('/create-question', [QuestionController::class,'store'])->name('create.question');
        Route::delete('/delete-question/{id}', [QuestionController::class,'destroy'])->name('delete.question');
    
    
    
        Route::get('/submit-answer', [MarkController::class,'create'])->name('submit.mark');
        Route::post('/submit-answer', [MarkController::class,'store'])->name('store.mark');
        Route::patch('/update-answer/{id}', [MarkController::class,'update'])->name('update.mark');
        Route::delete('/delete-answer/{id}', [MarkController::class,'destroy'])->name('delete.mark');
    
    
    
    });

    

    
    Route::get('/events-news',[NewsEventController::class, 'show'])->name('news-event');
    Route::get('/single-events-news/{id}',[NewsEventController::class, 'singleview'])->name('single.news-event');
    



    Route::get('/exam',[OnlineExamController::class,'index'])->name('exam');
    



    Route::get('/class',[ClassRoutineController::class,'index'])->name('class');
    




    Route::get('/question', [QuestionController::class,'index'])->name('question');
    



    Route::get('/mark', [MarkController::class,'index'])->name('mark');
    



    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
