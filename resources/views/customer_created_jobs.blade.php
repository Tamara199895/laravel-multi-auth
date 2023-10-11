@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="">
                <div class="card-header">{{auth()->user()->name}}'s suggested works</div><hr>
                @foreach($jobs as $job)
                <div class="card-body" style="display:flex;height:50px;align-items:baseline">
                <a href="{{route('jobs.show', $job->id)}}" style="padding-left:20px">{{ $job->work_name }}</a>
               </div>
                  @endforeach
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection