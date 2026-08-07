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

use App\Http\Controllers\ITSupport\DashboardController;
use App\Http\Controllers\ITSupport\MyTicketController;
use App\Http\Controllers\ITSupport\ProgressController;

use App\Http\Controllers\Helpdesk\DashboardController as HelpdeskDashboardController;
use App\Http\Controllers\Helpdesk\TicketAssignmentController as HelpdeskTicketAssignmentController;
use App\Http\Controllers\Helpdesk\TicketController as HelpdeskTicketController;

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

Route::middleware(['auth','role:Helpdesk'])->prefix('helpdesk')->name('helpdesk.')
->group(function () {

     /*
        |--------------------------------------------------------------------------
        | Dashboard
        |--------------------------------------------------------------------------
        */

        Route::get('/dashboard', [HelpdeskDashboardController::class, 'index'])
            ->name('dashboard');

        /*
        |--------------------------------------------------------------------------
        | Ticket
        |--------------------------------------------------------------------------
        */

        Route::resource('ticket-assignment', TicketAssignmentController::class)->only(['create', 'store']);

        /*
        |--------------------------------------------------------------------------
        | Ticket Assignment
        |--------------------------------------------------------------------------
        */

         Route::prefix('tickets/{ticket}')
            ->name('tickets.')
            ->group(function () {

                Route::get('/assignment', [HelpdeskTicketAssignmentController::class, 'create'])
                    ->name('assignment.create');
                Route::get('/show', [HelpdeskTicketController::class, 'show'])
                    ->name('show');

                Route::post('/assignment', [HelpdeskTicketAssignmentController::class, 'store'])
                    ->name('assignment.store');

                Route::get('/assignment/history', [HelpdeskTicketAssignmentController::class, 'history'])
                    ->name('assignment.history');
            });

});

Route::middleware(['auth','role:IT Support'])->prefix('itsupport')->name('itsupport.')
->group(function () {

    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');

    Route::resource('tickets',MyTicketController::class)->only([
        'index',
        'show'
    ]);

    Route::put('tickets/{ticket}/progress',[ProgressController::class, 'update']
    )->name('tickets.progress');

});

require __DIR__.'/auth.php';
