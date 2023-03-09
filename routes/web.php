<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
});

Route::get('/articles', function () {
    return view('articles');
});

// Whatever is passed in the url - the same value is passed as a parameter in the function as well
Route::get('/articles/{article_slug}', function ($article_slug) {
    $path = __DIR__ . '/../resources/articles/' . $article_slug . '.html';

    if (!file_exists($path)) {
        // or abort(404);
        return redirect('/');
    }

    $article = file_get_contents($path);

    return view('article', [
        'article' => $article
    ]);
})->where('article_slug', '[0-9A-z_\-]+'); // validate the slug - only numbers