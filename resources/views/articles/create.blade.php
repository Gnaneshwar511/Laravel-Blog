@extends('app')

@section('content')

    <h1> Write a new article</h1>

    <hr/>

    {!! Form::open(['url'=>'articles','files'=>true,'method' => 'POST']) !!}
    @include('articles.form', ['submitText' => 'Create Article'])
    {!! Form::close() !!}

    @include('errors.list')
@stop