@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex flex-row">Articles
                        <a href="{{ route('categories.create') }}" class="btn btn-primary ms-auto">New Category</a>
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
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$category->name}}</td>
                                    <td class="text-end">
                                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-primary">Edit</a>
                                        <a href="#" class="btn btn-danger" onclick="document.getElementById('delete-form').submit()">Delete</a>
                                        <form action="{{ route('categories.delete', $category) }}" method="POST" id="delete-form">
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
