@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Plans</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row text-center">
                        @foreach($plans as $plan)
                            <div class="col-md-4 ">
                                <h3>{{$plan->name}}</h3>
                                <b>{{number_format($plan->price/100,2,'.')}} $ / month</b>
                                <br>
                                <br>
                                <a href="{{ route('checkout.checkout', $plan) }}" class="btn btn-primary"> Subscribe to {{$plan->name}}</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
