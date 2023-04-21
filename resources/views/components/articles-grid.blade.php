@props(['articles'])

<x-normal-article :article="$articles->first()"/>
@if ($articles->count() > 1)
    <div class="lg:grid lg:grid-cols-2">
        @foreach ($articles->skip(1) as $article)
            <x-normal-article :article="$article"/>
        @endforeach
    </div>
@endif