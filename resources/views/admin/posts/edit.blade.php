@extends("template")

@section("content")

    <h1 class="jumbotron">Blog IFSP - Edit post : {{ $post_alterar->title }}</h1>

    @if($errors->any())
        <ul class="alert">
            @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::model($post_alterar, ['route'=>['admin.posts.update', $post_alterar->id], 'method'=>'put']) !!}

    @include("admin.posts._form")

    <div class="form-group">
        {!! Form::label('tags','Tags :', ['class'=>'control-label']) !!}
        {!! Form::textarea('tags', $post_alterar->tagList, ['class'=>'form-control']) !!}
    </div>

    {!! Form::submit('Save Post', ['class'=>'btn btn-primary']) !!}

    {!! Form::close() !!}


@endsection