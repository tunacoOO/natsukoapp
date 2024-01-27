<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController; 
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TimeCategoryController;
use App\Http\Controllers\RakutenController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/dashboard', function () {
    return redirect(route('dashboard'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/', [PostController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/posts/create',[PostController::class,'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts/{post}/edit',[PostController::class,'edit'])->name('posts.edit');
Route::put('/posts/{post?}',[PostController::class,'update'])->name('posts.update');
Route::delete('/posts/{post}',[PostController::class,'delete'])->name('posts.delete');
Route::get('/posts/search',[PostController::class,'show'])->name('category.search');
Route::get('/posts/{post?}',[PostController::class,'all'])->name('posts.all');
Route::get('/categories/{category}',[CategoryController::class,'show'])->name('category.show');
Route::get('/time_categories/{time_category}',[TimeCategoryController::class,'time'])->name('category.time');
Route::post('/posts/{post}/like',[PostController::class,'like'])->name('posts.like');
Route::delete('/posts/{post}/like',[PostController::class,'unlike'])->name('posts.unlike');
Route::get('/posts/{post}/mine',[ProfileController::class,'show'])->name('profile.mine');
Route::get('/search',[RakutenController::class,'search'])->name('rakuten.search');
// Language Switcher Route 言語切替用ルートだよ
Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);

    return redirect()->back();
});

