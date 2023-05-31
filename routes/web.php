<?php

use App\Http\Controllers\ArticlesController;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ArticlesController::class, 'index'])->name('home');
Route::get('/articles/{article:slug}', [ArticlesController::class, 'show']);
Route::get('authors/{author:username}', function (User $author) {
    return view('articles', [
        'articles' => $author->articles,
        'categories'   => Category::all()
    ]);
});