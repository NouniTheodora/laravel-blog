<html>
    <h1>{{$article->title}}</h1>
    <div>{!! $article->body !!}</div> {{-- Don't escape it - I want to remain as html --}}
</html>