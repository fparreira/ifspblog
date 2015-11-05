@extends("template")

@section("content")

    <h1 class="jumbotron">Blog IFSP - ADMINISTRAÇÃO</h1>

    <a href="{{ route('admin.posts.create') }}" class="btn btn-success">Add new post</a>
    <br>
    <br>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Action</th>
        </tr>

        @foreach($posts as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->title }}</td>
                <td>
                    <a href="{{ route('admin.posts.edit',['id'=>$p->id]) }}" class="btn btn-default">Edit</a>
                    <a href="{{ route('admin.posts.destroy', ['id'=>$p->id]) }}" class="btn btn-danger">Destroy</a>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $posts->render() !!}

@endsection