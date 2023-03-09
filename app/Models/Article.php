<?php

 namespace App\Models;

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
 //        if (!file_exists($path = base_path() . "/resources/articles/{$article_slug}.html")) {
 //            // or abort(404);
 //            throw new ModelNotFoundException();
 //        }
 //
 //        // keep the file in cache for 20 minutes & retrieve it from there instead of running the code
 //        return cache()->remember("articles.{$article_slug}", now()->addMinutes(20), function() use ($path) {
 //            return file_get_contents($path);
 //        });
         return static::fetchAllArticles()->firstWhere('slug', $article_slug);
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