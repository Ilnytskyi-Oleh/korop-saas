@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex flex-row">Join the to organization
                    </div>
                    <div class="card-body">
                        <form action="{{ route('join.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="organization_id" value="{{$organization->id}}">
                            <div class="my-3">
                                Do you want to join to {{ $organization->name }}?
                            </div>
                            <div class="my-3">
                                Join as:
                                <select name="role_id" id="" class="form-control">
                                    <option value="1">User</option>
                                    <option value="3">Publisher</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Yes, I do!</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
