@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <h3>Create User</h3>
            {!! Form::open(['action'=>'UserController@store','class'=>'']) !!}
            @include('users._formAdmin')
            {!! Form::close() !!}
        </div>
    </div>
@endsection