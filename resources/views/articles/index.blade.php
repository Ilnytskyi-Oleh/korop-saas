@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex flex-row">Articles
                        <a href="{{ route('articles.create') }}" class="btn btn-primary ms-auto">New Article</a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                @can('see-article-user')
                                    <th>User</th>
                                @endcan
                                <th>Created At</th>
                                <th>Published At</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($articles as $article)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$article->title}}</td>
                                    @can('see-article-user')
                                        <td>{{ $article->user->name }}</td>
                                    @endcan
                                    <td>{{ $article->created_at }}</td>
                                    <td>{{ $article->published_at }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('articles.edit', $article) }}"
                                           class="btn btn-primary">Edit</a>
                                        <a href="#" class="btn btn-danger"
                                           onclick="document.getElementById('delete-form').submit()">Delete</a>
                                        <form action="{{ route('articles.delete', $article) }}" method="POST"
                                              id="delete-form">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
