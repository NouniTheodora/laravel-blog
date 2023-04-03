<x-layout>
    @foreach ($articles as $article)
        <article class="{{ $loop->even ? 'even' : 'odd' }}">
            <a href="articles/{{$article->slug}}">{{$article->title}}</a>
        </article>
    @endforeach
</x-layout>