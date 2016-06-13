@extends('app')

@section('content')

    @if(is_null($articles) || empty($articles))
        <br/><br/><br/>
        <h1>No results found...</h1>
        <a href="{{ action('ArticlesController@index') }}" title="Navigate back to the previous page"><<< Back</a>
    @endif

    @foreach($articles as $article)
    <h1>{{ $article->title }}</h1>

    <article>
        {{ $article->body }}
    </article>

    @endforeach()

@stop