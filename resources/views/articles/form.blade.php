<!-- Temporary -->
{!! Form::hidden('user_id', 1) !!}

<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('body', 'Body:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('published_at', 'Published at:', ['class' => 'control-label']) !!}
    {!! Form::input('datetime', 'published_at', date('Y-m-d h:i:s'), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('tag_list', 'Tags:') !!}
    {!! Form::select('tag_list[]', $tags, null, ['id' => 'tag_list', 'class' => 'form-control', 'multiple']) !!}
</div>

<div class="form-group">
    {!! Form::label('image', 'Image Upload:') !!}
    {!! Form::file('image', null) !!}
</div>

<div class="form-group">
    {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
</div>

@section('footer')
    <script>
        $('#tag_list').select2({
            placeholder: 'Choose a tag'
        });
    </script>
@endsection