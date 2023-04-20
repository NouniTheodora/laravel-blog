<h1> {{$article->title}} </h1>
<p>By <a href="/authors/{{$article->author->username}}">{{$article->author->name}}</a> in category <a href="/categories/{{$article->category->slug}}">{{$article->category->name}}</a></p>
<div> {!! $article->body !!} </div> {{-- Don't escape it - I want to remain as html --}}
<a href="/articles">Go Back</a>
