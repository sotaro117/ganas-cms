<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminEventController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SigninController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\AdminNewsController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BillingPortalController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('signin', [SigninController::class, 'create'])->middleware('guest')->name('signup');
Route::post('signin', [SigninController::class, 'store'])->middleware('guest');

Route::get('login', [LoginController::class, 'create'])->middleware('guest')->name('login');
Route::post('login', [LoginController::class, 'store'])->middleware('guest');

Route::post('logout', [LoginController::class, 'destroy'])->middleware('auth');

Route::get('forgot-password', [ForgotPasswordController::class, 'create'])->middleware('guest');
Route::post('forgot-password', [ForgotPasswordController::class, 'store'])->middleware('guest');

Route::get('reset-password', [PasswordResetController::class, 'create'])->middleware('guest');
Route::post('reset-password', [PasswordResetController::class, 'store'])->middleware('guest')->name('password.reset');

Route::get('users/{user}/edit', [UserController::class, 'edit'])->middleware('subscribe');
Route::post('users/{user}', [UserController::class, 'update'])->middleware('subscribe');
Route::post('users/{user}/destroy', [UserController::class, 'destroy']);

Route::get('posts', [PostController::class, 'index']);
Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::get('categories/{category:name}', [CategoryController::class, 'index']);

Route::get('events', [EventController::class, 'index']);
Route::get('events/{event:slug}', [EventController::class, 'show']);

Route::get('news', [NewsController::class, 'index']);
Route::get('news/{news:slug}', [NewsController::class, 'show']);

Route::get('subscription', SubscriptionController::class)->middleware('have.subscribed')->name('subscription');
Route::get('billing-portal', BillingPortalController::class)->middleware('subscribe');

Route::get('about', [AboutController::class, 'index']);
Route::get('ads', [AboutController::class, 'ads']);
Route::get('supporter', [AboutController::class, 'supporter']);
Route::get('contact', [AboutController::class, 'contact']);

Route::middleware('can:admin')->group(function () {
    Route::get('admin/dashboard', [AdminHomeController::class, 'index']);

    Route::resource('admin/users', AdminUserController::class)->except('show');

    Route::post('admin/posts/upload', [AdminPostController::class, 'upload']);
    Route::resource('admin/posts', AdminPostController::class)->except('show');
   
    Route::resource('admin/news', AdminNewsController::class)->except('show');

    Route::resource('admin/events', AdminEventController::class)->except('show');

    Route::resource('admin/category', AdminCategoryController::class)->except('show');
});