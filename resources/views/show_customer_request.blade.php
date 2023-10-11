@extends('layouts.app')
@section('content')
<?php
use App\Models\Jobs;
use App\Models\User;
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-16">
            {{empty($jobRequests)}}
            <div class="card-header">Customer name- {{auth()->user()->name}}</div><hr>
            <div style="display:flex; justify-content:space-between">
                @if($jobRequests)
                    @foreach($jobRequests as $jobRequest)
                    <div style="">
                        <p>Work name -{{Jobs::where('id', $jobRequest['job_id'])->first()->work_name}}</p>
                        <p>Freelancer name -{{User::find($jobRequest['freelancer_id'])->first()->name}}</p>
                        <a href="{{route('jobs.approve', [ $jobRequest['job_id'], $jobRequest['customer_id'], $jobRequest['freelancer_id'] ])}}">Aprove</a>
                    </div>
                    @endforeach
                @endif
                @if(empty($jobRequests))
                <h1>no request</h1>
                @endif
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection