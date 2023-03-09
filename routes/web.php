<?php

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

Route::get('/', function () {
    return view('home');
});

Route::get('/articles', function () {
    return view('articles');
});

// Whatever is passed in the url - the same value is passed as a parameter in the function as well
Route::get('/articles/{article_slug}', function ($article_slug) {
    if (!file_exists($path = __DIR__ . "/../resources/articles/{$article_slug}.html")) {
        // or abort(404);
        return redirect('/');
    }

    // keep the file in cache for 20 minutes & retrieve it from there instead of running the code
    $article = cache()->remember("articles.{$article_slug}", now()->addMinutes(20), function() use ($path) {
        return file_get_contents($path);
    });

    return view('article', [
        'article' => $article
    ]);
})->where('article_slug', '[0-9A-z_\-]+'); // validate the slug - only numbers