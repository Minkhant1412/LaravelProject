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
        <form method="post">
            @csrf
            <div class="mb-4">
                <label>Title</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="mb-4">
                <label>Body</label>
                <textarea name="body" class="form-control"></textarea>
            </div>
            <div class="mb-4">
                <label>Category</label>
                <select name="category_id" class="form-select">
                    <option value="1">News</option>
                    <option value="2">General</option>
                </select>
            </div>
            <input type="submit" value="Add Article" class="btn btn-primary">
        </form>
    </div>
@endsection