<?php

use App\Http\Controllers\Admin\DashboardController;
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

    Route::put('/tasks/{task}', [TaskController::class, 'update'])
        ->name('tasks.update');

    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])
        ->name('tasks.destroy');
});

Route::patch('/tasks/{task}/status', [TaskController::class, 'updateStatus'])
    ->name('tasks.updateStatus');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin.index');
    Route::get('/admin/{id}/edit', [DashboardController::class, 'edit']);
    Route::patch('/admin/{user}/role', [DashboardController::class, 'updateRole']);

    Route::delete('/admin/{user}', [DashboardController::class, 'destroy']);
});
require __DIR__ . '/settings.php';
