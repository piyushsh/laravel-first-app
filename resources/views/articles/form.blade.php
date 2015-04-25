<div class="form-group">
    {!! Form::label('title','Title: ') !!}
    {!! Form::text('title',null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('body','Body: ') !!}
    {!! Form::textarea('body',null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('blog_image','Blog Image: ') !!}
    {!! Form::input('file','blog_image',null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('published_at','Published At: ') !!}
    {!! Form::input('date','published_at',$article->published_at->format('Y-m-d'), ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('tag_list','Tags: ') !!}
    {!! Form::select('tag_list[]',$tags, null, ['id'=> 'tag_list', 'class'=>'form-control','multiple']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class'=>'btn btn-primary form-control']) !!}
</div>


@section('footer')
    <script>
        $('#tag_list').select2({
            placeholder : 'Chose a tag',
            tags: true
        });
    </script>
@endsection