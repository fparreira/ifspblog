@extends("template")

@section("content")

    <h1 class="jumbotron">Blog IFSP - Create new post</h1>

    @if($errors->any())
        <ul class="alert">
            @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=>'admin.posts.store', 'method'=>'post']) !!}

        @include("admin.posts._form")

        <div class="form-group">
            {!! Form::label('tags','Tags :', ['class'=>'control-label']) !!}
            {!! Form::textarea('tags', null,['class'=>'form-control']) !!}
        </div>

        {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}

    {!! Form::close() !!}


@endsection