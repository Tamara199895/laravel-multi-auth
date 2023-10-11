@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="">
                <div class="card-header">{{auth()->user()->name}}'s projects</div><hr>
                <table class="table table-striped table-bordered">
                <thead>
                      <tr>
                          <td>Job name</td>
                          <td>Job Description</td>
                          <td>Job Status </td>
                          <td>Job rate</td>
                      </tr>
                  </thead>
                  <tbody>
                @foreach($jobs as $job)
                <tr>
                <td style="padding-left:20px">{{ $job->work_name }}</td>
                <td style="padding-left:20px">{{ $job->work_description }}</td>
                <td style="padding-left:20px">
                {{ $job->status }} 
                @if($job->status == 'started')
                <a href="{{route('jobs.releaseProject', $job->id)}}" class="btn btn-success">Release Project</a>
              </td>
                @endif
                <td style="padding-left:20px">{{ $job->rate }}</td>
                </tr>
                  @endforeach
              </tbody>
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection