@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                  You are a Freelancer -{{auth()->user()->name}}
                  <li><a href="{{ route('jobs.index') }}">View All Jobs</a></li>
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection