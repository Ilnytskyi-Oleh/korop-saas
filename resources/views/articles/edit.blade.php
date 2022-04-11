@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Articles</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <form action="{{ route('articles.update', $article) }}" method="POST">
                            @method('PATCH')
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{old('title') ?? $article->title}}">
                            </div>
                            <div class="mb-3">
                                <label for="full-text" class="form-label">Full Text</label>
                                <textarea type="text" class="form-control" id="full-text" name="full_text">{{old('full_text') ?? $article->full_text}}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-control" id="category" name="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}"
                                            @if($category->id == $article->category_id) selected @endif
                                        >{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if(auth()->user()->is_publisher || auth()->user()->is_admin)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" id="published" name="published"
                                           @if($article->published_at)
                                           checked
                                        @endif
                                    >
                                    <label class="form-check-label" for="published">
                                        Published
                                    </label>
                                </div>
                            @endif
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
