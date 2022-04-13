@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex flex-row">Invite
{{--                        <a href="{{ route('articles.create') }}" class="btn btn-primary ms-auto">New Article</a>--}}
                    </div>

                    <div class="card-body">
                        Invitation link: <br> {{ route('register') }}?organization_id={{ auth()->user()->organization_id ? auth()->user()->organization_id : auth()->user()->id }}
                        <div class="my-3">
                            Invitation for existing users: <br> {{ route('join.create') }}?organization_id={{ auth()->user()->organization_id ? auth()->user()->organization_id : auth()->user()->id }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
