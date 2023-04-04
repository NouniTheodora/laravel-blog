<?php

 namespace App\Models;

 use Illuminate\Database\Eloquent\ModelNotFoundException;
 use Illuminate\Support\Facades\File;
 use Spatie\YamlFrontMatter\YamlFrontMatter;

 class Article
 {
     public $slug;
     public $title;
     public $excerpt;
     public $date;
     public $body;

     public function __construct($slug, $title, $excerpt, $date, $body)
     {
         $this->slug = $slug;
         $this->title = $title;
         $this->excerpt = $excerpt;
         $this->date = $date;
         $this->body = $body;
     }

     public static function findArticleBySlug(string $article_slug)
     {
        $article = static::fetchAllArticles()->firstWhere('slug', $article_slug);
    
        if (is_null($article)) {
            throw new ModelNotFoundException();
        }

        return $article;
     }

     public static function fetchAllArticles()
     {
         return cache()->rememberForever('article.all', function () {
             return collect(File::files(resource_path('articles')))
                 ->map(function($file) {
                     return YamlFrontMatter::parseFile($file);
                 })
                 ->map(function($article) {
                     return new Article(
                         $article->slug,
                         $article->title,
                         $article->excerpt,
                         $article->date,
                         $article->body()
                     );
                 })
                 ->sortByDesc('date');
         });
     }
 }