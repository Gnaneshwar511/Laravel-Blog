@extends('app')

@section('content')

        <div class="col-lg-4 col-lg-offset-4 bodyText">
            <h1 style="text-align: center;">Users</h1>
                <table border="1" align="center" align="center">
                    <tr>
                        <th>User Name</th>
        <th>Email ID</th>
        <th>User Role</th>
        <th>Edit Admin status</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>
                    {!! Form::model($user, ['method' => 'PATCH', 'action'=>['']]) !!}
                </td>
            </tr>
            @endforeach
            </table>
            </div>
@stop