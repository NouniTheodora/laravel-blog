<x-layout>
    @foreach ($articles as $article)
        <article class="{{ $loop->even ? 'even' : 'odd' }}">
            <a href="articles/{{$article->id}}">{{$article->title}}</a>
            <div> {{$article->excerpt}} </div>
        </article>
    @endforeach
</x-layout>