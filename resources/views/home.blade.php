@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if(auth()->user()->type == 'freelancer')
                    <p>Congratulations yor registered as a Freelancer. See your 
                        <a href="{{route('freelancer.home')}}">Page</a> here
                        </p>
                    @else
                        <div class="panel-heading">
                        <p>Congratulations yor registered as a Customer. See your 
                        <a href="{{route('customer.home')}}">page</a> here
                            
                        </div>
                    @endif
                        </div>
            </div>
        </div>
    </div>
</div>
@endsection