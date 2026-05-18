<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::view('dashboard', 'dashboard')
        ->name('dashboard');

    Route::get('/tasks', [TaskController::class, 'index'])
        ->name('tasks.index');

    Route::post('/tasks', [TaskController::class, 'store'])
        ->name('tasks.store');

     Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])
    ->name('tasks.edit');
    Route::post('/tasks/{task}/edit', [TaskController::class, 'edit'])
    ->name('tasks.edit');
    Route::patch('/tasks/{task}/update', [TaskController::class, 'update']);

    Route::delete('/tasks/{task}/destroy', [TaskController::class, 'destroy'])
    ->name('tasks.destroy');
});


require __DIR__.'/settings.php';
