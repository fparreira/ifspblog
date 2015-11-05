@extends("template")

@section("content")

    <h1>Blog IFSP</h1>

    @foreach($posts as $p)
        <div class="jumbotron">
            <h2>{{ $p->title }}</h2>
            <small>{{ $p->created_at->format('d/m/Y - H:i') }}</small>
            <p>{{ $p->content }}</p>
            <p><b>Tags:</b></p>
            <ul>
                @foreach($p->tags as $t)
                    <li>{{ $t->name }}</li>
                @endforeach
            </ul>
            <p><b>comments:</b></p>
            <hr>
            @foreach($p->comments as $c)
                <h4>{{ $c->comment }}</h4>
                <small>{{ $c->name }}<br>{{ $c->email }}</small>
                <small>{{ $c->created_at->format('d/m/Y - H:i') }}</small>
                <hr>
            @endforeach
        </div>
    @endforeach

@endsection