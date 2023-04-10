<x-layout>
    @foreach ($articles as $article)
        <article style="margin-bottom: 1em;" class="{{ $loop->even ? 'even' : 'odd' }}">
            <a href="articles/{{$article->slug}}">{{$article->title}}</a></br>
            <a href="category/{{$article->category->slug}}" style="border:1px solid black;">{{$article->category->name}}</a>
            <div> {{$article->excerpt}} </div>
        </article>
    @endforeach
</x-layout>