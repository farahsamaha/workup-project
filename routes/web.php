<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
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


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';

//user

Route::post('users', [PostController::class, 'store'])
    ->name('users.store')
    ->middleware('auth');

Route::get('/userprofile', [UserController::class, 'index'])
    ->name('userprofile')
    ->middleware('auth');

Route::get('/createuser', [UserController::class, 'create'])
    ->name('createuser')
    ->middleware('auth');

Route::get('user/edit', [UserController::class, 'edit'])
    ->name('user.edit')
    ->middleware('auth');

Route::put('users/update', [UserController::class, 'update'])
    ->name('user.update')
    ->middleware('auth');

Route::delete('users/{user}', [UserController::class, 'destroy'])
    ->name('user.destroy')
    ->middleware('auth');

//posts
// Route::get('/homepage', function () {
//     return Inertia::render('post/HomePage');
// })->name('homepage');
Route::get('/homepage', [PostController::class, 'index'])
    ->name('homepage');

Route::post('posts', [PostController::class, 'store'])
    ->name('posts.store')
    ->middleware('auth');

Route::get('/createpost', [PostController::class, 'create'])
    ->name('createpost')
    ->middleware('auth');

Route::get('posts/{post}/edit', [PostController::class, 'edit'])
    ->name('post.edit')
    ->middleware('auth');

Route::put('posts/{post}', [PostController::class, 'update'])
    ->name('post.update')
    ->middleware('auth');

Route::delete('posts/{post}', [PostController::class, 'destroy'])
    ->name('post.destroy')
    ->middleware('auth');


Route::post('posts/{post}', [PostController::class, 'likepost'])->name('likepost');
// Route::post('posts/{post}', [PostController::class, 'unlikepost'])->name('unlikepost');



//comments

Route::get('/commentslist', [CommentController::class, 'index'])
    ->name('commentslist');

Route::post('comments/{post}/comment', [CommentController::class, 'store'])
    ->name('comments')
    ->middleware('auth');

Route::get('comments/{comment}/edit', [CommentController::class, 'edit'])
    ->name('comment.edit')
    ->middleware('auth');

Route::put('comments/{comment}/update', [CommentController::class, 'update'])
    ->name('comment.update')
    ->middleware('auth');

Route::delete('comments/{comment}', [CommentController::class, 'destroy'])
    ->name('comment.destroy')
    ->middleware('auth');

//jobs
// Route::resource('jobs', JobController::class);
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

// Route::get('jobs/{job}/edit', [JobController::class, 'edit'])
//     ->name('job.edit')
//     ->middleware('auth');

// Route::put('jobs/{job}', [JobController::class, 'update'])
//     ->name('job.update')
//     ->middleware('auth');

Route::delete('jobs/{job}', [JobController::class, 'destroy'])
    ->name('job.destroy')
    ->middleware('auth');

Route::get('/managejob', [JobController::class, 'manage'])
    ->name('managejob')
    ->middleware('auth');

Route::post('jobs/{job}', [JobController::class, 'apply'])->name('apply');
