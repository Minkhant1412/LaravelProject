@extends("layouts.app")

@section("content")
    <div class="container">

        @if($errors->any())
            <div class="alert alert-warning">
            <ol>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
            </ol>
            </div>
        @endif

        <div class="card mb-2">
            <div class="card-body">
                <h5 class="card-title">{{ $article->title }}</h5>
                <div class="card-subtitle mb-2 text-muted small">{{ $article->created_at->diffForHumans() }},
                Category: <b>{{ $article->category->name }} </b></div>
                <p class="card-text">{{ $article->category->name }}</p>
            <p class="card-text">{{ $article->body }}</p>
            <a href="{{ url("/articles/delete/$article->id") }}" class="btn btn-warning">Delete</a>
            </div>
        </div>

        @if(session("info"))
            <div class="alert alert-info">
                {{ session("info") }}
            </div>
        @endif
        <ul class="list-group mb-2">
            <li class="list-group-item active">
            <b>Comments ({{ count($article->comments) }})</b>
            </li>
            @foreach($article->comments as $comment)
            <li class="list-group-item">
            <a href="{{ url("/comments/delete/$comment->id") }}"
            class="btn-close float-end">
            </a>
              {{ $comment->content }}
              <div class="small mt-2">
                By <b>{{ $comment->user->name }}</b>,
                {{ $comment->created_at->diffForHumans() }}
              </div>
            </li>

        @endforeach
    </ul>
    @auth
    <form action="{{ url('/comments/add') }}" method="post">
        @csrf
        <input type="hidden" name="article_id"
        value="{{ $article->id }}">
        <textarea name="content" class="form-control mb-2" 
        placeholder="New Comment"></textarea>
        <input type="submit" value="Add Comment"
        class="btn btn-secondary">
        </form>
    @endauth
</div>
@endsection