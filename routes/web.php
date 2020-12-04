<?php

use App\Http\Controllers\{ BoardController, TaskController, BoardUserController };
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// CRUD de Board
Route::get('boards', [BoardController::class, 'index'])->middleware('auth')->name('boards.index');
Route::get('boards/create', [BoardController::class, 'create'])->middleware('auth')->name('boards.create');
Route::post('boards', [BoardController::class, 'store'])->middleware('auth')->name('boards.store');
Route::get('boards/{board}', [BoardController::class, 'show'])->middleware('auth')->name('boards.show');
Route::get('boards/{board}/edit', [BoardController::class, 'edit'])->middleware('auth')->name('boards.edit');
Route::put('boards/{board}', [BoardController::class, 'update'])->middleware('auth')->name('boards.update');
Route::delete('boards/{board}', [BoardController::class, 'destroy'])->middleware('auth')->name('boards.destroy');


// Route::resource('boards', BoardController::class);

// CRUD de Task
Route::get('tasks', [TaskController::class, 'index'])->middleware('auth')->name('tasks.index');
Route::get('tasks/create', [TaskController::class, 'create'])->middleware('auth')->name('tasks.create');
Route::post('tasks', [TaskController::class, 'store'])->middleware('auth')->name('tasks.store');
Route::get('tasks/{task}', [TaskController::class, 'show'])->middleware('auth')->name('tasks.show');
Route::get('tasks/{task}/edit', [TaskController::class, 'edit'])->middleware('auth')->name('tasks.edit');
Route::put('tasks/{task}', [TaskController::class, 'update'])->middleware('auth')->name('tasks.update');
Route::delete('tasks/{task}', [TaskController::class, 'destroy'])->middleware('auth')->name('tasks.destroy');

// CRUD de BoardUser
Route::get('boardusers', [BoardUserController::class, 'index'])->middleware('auth')->name('boardusers.index');
Route::get('boardusers/create', [BoardUserController::class, 'create'])->middleware('auth')->name('boardusers.create');
Route::post('boardusers', [BoardUserController::class, 'store'])->middleware('auth')->name('boardusers.store');
Route::get('boardusers/{boardusers}', [BoardUserController::class, 'show'])->middleware('auth')->name('boardusers.show');
Route::get('boardusers/{boardusers}/edit', [BoardUserController::class, 'edit'])->middleware('auth')->name('boardusers.edit');
Route::put('boardusers/{boardusers}', [BoardUserController::class, 'update'])->middleware('auth')->name('boardusers.update');
Route::delete('boardusers/{boardusers}', [BoardUserController::class, 'destroy'])->middleware('auth')->name('boardusers.destroy');