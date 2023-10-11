@extends('layouts.app')
@section('content')
<body>
<div class="container">
<div>
<h1>All jobs</h1>

</div>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Description</td>
        </tr>
    </thead>
    <tbody>
    @if(session()->has('success'))
        <label class="alert alert-success w-100">{{session('success')}}</label>
    @endif
    @if(session()->has('error'))
        <label class="alert alert-danger w-100">{{session('error')}}</label>
    @endif

    @foreach($jobs as $key => $value)
    @if($value->status == 'not_started')
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->work_name }}</td>
            <td>{{ $value->work_description }}</td>
            @if(auth()->user()->type == 'freelancer')
            <td>
            <form action="{{ route('jobs.store')}}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="customer_id" value="{{ $value->customer_id }}">
                <input type="hidden" name="freelancer_id" value="{{ auth()->user()->id }}">
                <input type="hidden" name="job_id" value="{{ $value->id }}">
                <input type="submit" class="btn btn-xs btn-danger" value="Apply for a job">
                </form>

            </td>
            @endif
        </tr>
        @endif
    @endforeach
</tbody>
</div>
