@extends('app')

@section("class4")
    class="active"
@stop

@section('content')

<h1>Contact me</h1>
<p>Route</p>

<ul>
    <h3>People I have to meet</h3>
    @foreach ($people as $person)
        <li>{{ $person }}</li>
    @endforeach
</ul>

@stop