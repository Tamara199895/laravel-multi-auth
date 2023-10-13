@extends('layouts.app')
@section('content')
<div class="container"> <div class="row justify-content-center"> <div class="col-md-8">
  <div class="card">
  <div class="card-body">
   <a href="{{ route('customer.show', auth()->user()->id)}}">Back to My Works </a>
  <table class="table table-striped table-bordered"> <thead> <tr>
    <td>Job name</td>
    <td>Job Description</td>
    <td>Freelancer</td>
    <td>Job Status </td>
    <td>***</td>
    </tr>
    </thead>
    @if($job)
    <tbody>
    <tr>
      <td> {{ $job->work_name }}</td>
      <td> {{$job->work_description }}</td>
      <td>
        @if($job->freelancer_id)
        {{$freelancer->name}}
        @endif
        @if(!$job->freelancer_id)
        <a href="{{route('customer.show_customer_request', [$job->id])}}">See requests</a>
        @endif
        </td>
        <td>
        {{ $job->status }}
        </td>
        <td>
        @if($job->status == 'started' && $job->freelancer_id)
        <p>This job is running by - {{$freelancer->name}}</p>
        @endif
        @if($job->status == 'completed'&& !$job->rate && !$job->rate_description)
        <a href="{{route('jobs.rate', [$job->id, $job->freelancer_id])}}">Please rate to
        {{$freelancer->name}}</a>
        @endif
        @if($job->status == 'completed'&& $job->rate)
        <p>{{$freelancer->name}} done this job </p><span style="color:red"> (Your rate is {{$job->rate}}★)</span>
        @endif
        </td>
        </tr>
        </tbody>
        @endif
        </table> </div> </div>
        </div>
        </div>
</div> @endsection