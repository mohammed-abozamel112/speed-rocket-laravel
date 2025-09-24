<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ConsultantController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TagController;
use App\Http\Middleware\SetLocale;

use Illuminate\Support\Facades\Route;


Route::redirect('/', app()->getLocale() === 'ar' ? '/ar' : '/en');


Route::prefix('{lang}')->middleware(SetLocale::class)->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/dashboard', fn() => view('dashboard'))->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    require __DIR__ . '/auth.php';

    // services routes
    Route::prefix('services')->as('services.')->group(function () {
        Route::get('/', [ServiceController::class, 'index'])->name('index');
        Route::get('/filter', [ServiceController::class, 'filter'])->name('filter'); // AJAX endpoint
        Route::get('/create', [ServiceController::class, 'create'])->name('create');
        Route::post('/', [ServiceController::class, 'store'])->name('store');
        Route::get('/{service}', [ServiceController::class, 'show'])->name('show');
        Route::get('/{service}/edit', [ServiceController::class, 'edit'])->name('edit');
        Route::put('/{service}', [ServiceController::class, 'update'])->name('update');
        Route::delete('/{service}', [ServiceController::class, 'destroy'])->name('destroy');
    });
    // comments
    Route::prefix('comments')->as('comments.')->group(function () {
        Route::get('/', [CommentController::class, 'index'])->name('index');
        Route::post('/', [CommentController::class, 'store'])->name('store');
        Route::delete('/{comment}', [CommentController::class, 'destroy'])->name('destroy');
    });

    // blog routes
    Route::prefix('blogs')->as('blogs.')->group(function () {
        Route::get('/', [BlogController::class, 'index'])->name('index');
        Route::get('/create', [BlogController::class, 'create'])->name('create');
        Route::post('/', [BlogController::class, 'store'])->name('store');
        Route::get('/{blog}', [BlogController::class, 'show'])->name('show');
        Route::get('/{blog}/edit', [BlogController::class, 'edit'])->name('edit');
        Route::put('/{blog}', [BlogController::class, 'update'])->name('update');
        Route::delete('/{blog}', [BlogController::class, 'destroy'])->name('destroy');
    });
    //tags
    Route::prefix('tags')->as('tags.')->group(function () {
        Route::get('/', [TagController::class, 'index'])->name('index');
        Route::get('/create', [TagController::class, 'create'])->name('create');
        Route::post('/', [TagController::class, 'store'])->name('store');
        Route::get('/{tag}', [TagController::class, 'show'])->name('show');
        Route::get('/{tag}/edit', [TagController::class, 'edit'])->name('edit');
        Route::put('/{tag}', [TagController::class, 'update'])->name('update');
        Route::delete('/{tag}', [TagController::class, 'destroy'])->name('destroy');
    });
    //about view
    Route::view('about', 'about.index')->name('about');
    // contact
    Route::prefix('contact')->as('contact.')->group(function () {
        Route::get('/', [ContactController::class, 'index'])->name('index');
        Route::post('/', [ContactController::class, 'submit'])->name('submit');
    });
    // projects routes
    Route::prefix('projects')->as('projects.')->group(function () {
        Route::get('/', [ProjectController::class, 'index'])->name('index');
        Route::get('/create', [ProjectController::class, 'create'])->name('create');
        Route::post('/', [ProjectController::class, 'store'])->name('store');
        Route::get('/{project}', [ProjectController::class, 'show'])->name('show');
        Route::get('/{project}/edit', [ProjectController::class, 'edit'])->name('edit');
        Route::put('/{project}', [ProjectController::class, 'update'])->name('update');
        Route::delete('/{project}', [ProjectController::class, 'destroy'])->name('destroy');
    });

    // categories routes
    Route::prefix('categories')->as('categories.')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('/create', [CategoryController::class, 'create'])->name('create');
        Route::post('/', [CategoryController::class, 'store'])->name('store');
        Route::get('/{category}', [CategoryController::class, 'show'])->name('show');
        Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('edit');
        Route::put('/{category}', [CategoryController::class, 'update'])->name('update');
        Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('destroy');
    });

    // clients routes
    Route::prefix('clients')->as('clients.')->group(function () {
        Route::get('/', [ClientController::class, 'index'])->name('index');
        Route::get('/create', [ClientController::class, 'create'])->name('create');
        Route::post('/', [ClientController::class, 'store'])->name('store');
        Route::get('/{client}', [ClientController::class, 'show'])->name('show');
        Route::get('/{client}/edit', [ClientController::class, 'edit'])->name('edit');
        Route::put('/{client}', [ClientController::class, 'update'])->name('update');
        Route::delete('/{client}', [ClientController::class, 'destroy'])->name('destroy');
    });


    // reviews routes
    Route::prefix('reviews')->as('reviews.')->group(function () {
        Route::get('/', [ReviewController::class, 'index'])->name('index');
        Route::get('/create', [ReviewController::class, 'create'])->name('create');
        Route::post('/', [ReviewController::class, 'store'])->name('store');
        Route::get('/{review}', [ReviewController::class, 'show'])->name('show');
        Route::get('/{review}/edit', [ReviewController::class, 'edit'])->name('edit');
        Route::put('/{review}', [ReviewController::class, 'update'])->name('update');
        Route::delete('/{review}', [ReviewController::class, 'destroy'])->name('destroy');
    });

    // images routes
    Route::prefix('images')->as('images.')->group(function () {
        Route::get('/', [ImageController::class, 'index'])->name('index');
        Route::get('/create', [ImageController::class, 'create'])->name('create');
        Route::post('/', [ImageController::class, 'store'])->name('store');
        Route::get('/{image}', [ImageController::class, 'show'])->name('show');
        Route::get('/{image}/edit', [ImageController::class, 'edit'])->name('edit');
        Route::put('/{image}', [ImageController::class, 'update'])->name('update');
        Route::delete('/{image}', [ImageController::class, 'destroy'])->name('destroy');
    });

    // consultant route
    Route::get('/consultant', [ConsultantController::class, 'index'])->name('consultant');

});
