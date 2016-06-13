@extends('app')

@section("class2")
    class="active"
@stop

@section('content')

    <div class="form-group pull-right">
        {!! Form::open(['action' => "ArticlesController@searchcontent", 'route' => 'searchit']) !!}
        {!! Form::text('title', null) !!}

        {!! Form::submit('search') !!}
        {!!  Form::close() !!}
    </div>

    <h1>Articles</h1>
    <hr/>
    @if(Auth::check())
        <div class="pull-right">
            <a class="btn btn-primary btn-lg active" href="{{ action('ArticlesController@create') }}">Write Article [+]</a><br/><br/>
        </div>
    @endunless

    @if($articles == null)
        echo "No results for the matching search";
    @endif
    <br/>
    @foreach ($articles as $article)
        <article>
            <h2>
                <a href="{{ action('ArticlesController@show', $article->id) }}">{{ $article -> title }}</a>
            </h2>

            @if (Auth::check() and (Auth::user()->name == $article->user->name or Auth::user()->admin == 1))
                <div class="pull-right">
                    <h3><a href="{{ url('articles/'.$article->id.'/edit') }}"> Edit </a></h3>
                </div>
            @endif

            <div class="body">{{ $article->body }}</div>
            Author:<a href="{{ action('ArticlesController@viewauthorsposts', $article->user->id) }}" title="click to view all posts from this author">{{ $article->user->name }}</a>
            </br>
            Tags:{{ $article->TagList }}
            <hr/>
        </article>
    @endforeach

@stop