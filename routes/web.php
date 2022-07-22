<?php

use App\Http\Controllers\JobController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Guest/HomePage', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('home');

Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/homepage', function () {
    return Inertia::render('post/HomePage');
})->name('homepage');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::get('/userprofile', function () {
    return Inertia::render('User/UserProfile');
})->name('userprofile');

Route::get('/createpost', function () {
    return Inertia::render('post/CreatePost');
})->name('createpost');



Route::get('/jobindex', [JobController::class, 'index'])
    ->name('jobs')
    ->middleware('auth');



Route::get('/showjob', [JobController::class, 'show'])
    ->name('showjob')
    ->middleware('auth');

Route::get('/createjob', [JobController::class, 'create'])
    ->name('createjob')
    ->middleware('auth');

Route::post('jobs', [JobController::class, 'store'])
    ->name('jobs.store')
    ->middleware('auth');

Route::get('jobs/{job}/edit', [JobController::class, 'edit'])
    ->name('job.edit')
    ->middleware('auth');

Route::put('jobs/{job}', [JobController::class, 'update'])
    ->name('job.update')
    ->middleware('auth');

Route::delete('jobs/{job}', [JobController::class, 'destroy'])
    ->name('job.destroy')
    ->middleware('auth');

Route::get('/managejob', [JobController::class, 'manage'])
    ->name('managejob')
    ->middleware('auth');
