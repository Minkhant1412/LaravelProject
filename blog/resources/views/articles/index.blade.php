@extends("layouts.app")

@section("content")
    <div class="container">
         
        @if(session("info"))
            <div class="alert alert-info">
                {{ session("info") }}
            </div>
        @endif

        {{ $articles->links() }}

        @foreach($articles as $article)
            <div class="card mb-4">
                <div class="card-body">
                    <h4 class="card-body">{{ $article->title }}</h4>
                    <small class="text-muted">{{ $article->created_at->diffForHumans() }}</small>
                    <p>{{ $article->body }}</p>
                    <div>Author:<b>{{ $article->user->name }}</b></div>
                    <div><b>Category ({{ ($article->category->name) }})</b></div>
                    <div><b>Comments ({{ count($article->comments) }})</b></div>

                    <a href="{{ url("/articles/detail/$article->id")}}"> View Detail</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection