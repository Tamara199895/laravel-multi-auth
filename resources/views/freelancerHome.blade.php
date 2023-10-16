@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard

                <span style="position: absolute; right: 0;"><a href="{{ route('freelancer.create') }}">Add your Skils</a></span>

                </div>
                <div class="card-body">
                  You are a Freelancer -{{auth()->user()->name}}
                  <li><a href="{{ route('jobs.index') }}">View All Jobs</a></li>
                  <li><a href="{{ route('freelancer.show', auth()->user()->id)}}">See My Jobs </a></li>
                  <li><a href="{{ route('freelancer.searchWithSkills')}}">Seatch job with skills</a></li>
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection