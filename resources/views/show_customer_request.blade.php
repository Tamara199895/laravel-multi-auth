@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-16">
            {{empty($jobRequests)}}
            <div class="card-header">Customer name- {{auth()->user()->name}}</div><hr>
            <div style="display:flex; justify-content:space-between">
                @if($jobRequests)
                    @foreach($jobRequests as $jobRequest)
                    <div style="">
                        <p>Work name - {{$jobRequest->job['work_name']}}</p>
                        <p>Freelancer id - {{$jobRequest->freelancer['freelancer_id']}}, </p>
                        @if($jobRequest->freelancer['hourly_pay'])    
                        <p>Freelancer hourly pay - {{$jobRequest->freelancer['hourly_pay']}}$</p>
                        @endif
                   
                        <a href="{{route('jobs.approve', [ $jobRequest->job['id'], $jobRequest->freelancer['freelancer_id'] ])}}">Aprove</a>
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