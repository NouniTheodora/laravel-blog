<x-layout>
    @foreach ($articles as $article)
        <article class="{{ $loop->even ? 'even' : 'odd' }}">
            <a href="articles/{{$article->slug}}">{{$article->title}}</a>
            <div> {{$article->excerpt}} </div>
        </article>
    @endforeach
</x-layout>