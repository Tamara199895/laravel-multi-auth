@extends('layouts.app')
@section('content')
<div class="container"> <div class="row justify-content-center"> <div class="col-md-8">
  <div class="card">
  <div class="card-body">
  {{auth()->user()->name}}. - <a href="{{ route('customer.show', auth()->user()->id)}}">Back to My Works </a>
  <table class="table table-striped table-bordered"> <thead> <tr>
    <td>Job name</td>
    <td>Job Description</td>
    <td>Freelancer</td>
    <td>Job Status </td>
    <td>***</td>
    </tr>
    </thead>
    <tbody>
    <tr>
      <td> {{ $job->work_name }}</td>
      <td> {{$job->work_description }}</td>
      <td>
        @if($job->freelancer_id)
        {{User::where('id', $job->freelancer_id)->first()->name}}
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
        <p>This job is running by - {{User::where('id', $job->freelancer_id)->first()->name}}</p>
        @endif
        @if($job->status == 'completed'&& !$job->rate && !$job->rate_description)
        <a href="{{route('jobs.rate', [$job->id, $job->customer_id, $job->freelancer_id])}}">Please rate to
        {{User::where('id', $job->freelancer_id)->first()->name}}</a>
        @endif
        @if($job->status == 'completed'&& $job->rate && $job->rate_description)
        <p>{{User::where('id', $job->freelancer_id)->first()->name}} done this job</p>
        @endif
        </td>
        </tr>
        </tbody>
        </table> </div> </div>
        </div>
        </div>
</div> @endsection