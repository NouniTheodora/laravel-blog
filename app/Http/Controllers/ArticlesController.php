<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class ArticlesController extends Controller
{
    public function index()
    {
        return view('articles', [
            'articles'      => Article::latest()->filter(request(['search', 'category']))->get(),
            'categories'    => Category::all(),
            'currentCategory' => Category::firstWhere('slug', request('category'))
        ]);
    }

    public function show(Article $article)
    {
        return view('article', [
            'article'   => $article
        ]);
    }
}
