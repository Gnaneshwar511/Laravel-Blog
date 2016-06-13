@extends('app')

@section("class3")
    class="active"
@stop

@section('content')

    <div class="col-lg-4 col-lg-offset-4 bodyText">
        <h1 style="text-align: center;">MANAGE USERS</h1>
        <table border="1" align="center" align="center">
            <tr>
                <th>User Name</th>
            </tr>
            @foreach ($users as $user)
                <tr>
                    <td>
                        <a href="{{ action('UserController@edit', $user->id) }}">{{ $user->name }}</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@stop