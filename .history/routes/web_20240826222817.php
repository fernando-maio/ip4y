<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('projects/report/excel', [ProjectController::class, 'downloadExcel'])->name('projects.report.excel');
    
    Route::resource('projects', ProjectController::class);
    Route::get('projects/report/pdf', [ProjectController::class, 'downloadPDF'])->name('projects.report.pdf');
    Route::resource('tasks', TaskController::class);
});

require __DIR__ . '/auth.php';
