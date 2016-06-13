<div class="control-group span6">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="control-group span6">
    {!! Form::label('email', 'E-Mail') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<div class="control-group span6">
    {!! Form::label('admin', 'Account Type') !!}
    {!! Form::select('admin', array(0=>'user',1=>'admin'), null, ['class' => 'form-control']) !!}
</div>

<div class="control-group span6">
    {!! Form::label('password', 'Password') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<div class="control-group span6">
    {!! Form::label('password_confirmation', 'Confirm Password') !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
</div>

<div class="control-group span6">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>