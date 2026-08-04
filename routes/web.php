<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\PriorityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TicketAssignmentController;

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
});

Route::middleware(['auth'])->group(function () {

    Route::resource('departments', DepartmentController::class)->middleware('permission:department.view');

    Route::resource('categories', CategoryController::class);
	
	Route::resource('sub-categories', SubCategoryController::class);

    Route::resource('priorities', PriorityController::class);

    Route::resource('tickets', TicketController::class);
	
	Route::resource('users', UserController::class)->middleware('permission:user.view');

    Route::get('/sub-categories/by-category/{category}',[SubCategoryController::class,'byCategory'])->name('sub-categories.by-category');

    Route::prefix('tickets')->name('tickets.')
    ->group(function () {
        Route::get(
            '{ticket}/assignment',
            [TicketAssignmentController::class, 'create']
        )->name('assignment.create');

        Route::post(
            '{ticket}/assignment',
            [TicketAssignmentController::class, 'store']
        )->name('assignment.store');

    });

});

require __DIR__.'/auth.php';
