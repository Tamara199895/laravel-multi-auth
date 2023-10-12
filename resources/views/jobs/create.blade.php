@extends('layouts.app')
@section('content')
<div class="container">

<nav class="navbar navbar-inverse">
    <ul class="nav navbar-nav">
    <li><a href="{{ route('customer.show', auth()->user()->id)}}">Back to My Work </a></li>
    </ul>
    </nav>
    <h4>Add Job Post</h4>
    
    @if(session()->has('success'))
        <label class="alert alert-success w-100">{{session('success')}}</label>
    @endif
    @if(session()->has('error'))
        <label class="alert alert-danger w-100">{{session('error')}}</label>
    @endif
    
    <form method="post" action="{{ route('jobs.newJob') }}">
            @csrf
            <div class="form-group">
            @error('work_name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label>Job Name</label>
            <input type="text" name="work_name" value='{{old("email")}}' class="form-control" placeholder="Enter Job name">
            </div>
            <div class="form-group">
            @error('work_description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label>Job description </label>
            <input type="text" name="work_description" value='{{old("text")}}' class="form-control" placeholder="Job description">
            </div>
            <input type="hidden" name="customer_id" value="{{auth()->user()->id}}">
            <input type="hidden" name="status" value="not_started">
            <div class="form-group">

            <div>
            @error('skills')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
                                <label><strong>Select Skills for this job :</strong></label><br/>
                                <select class="form-control" name="skills[]" multiple="">
                                  @foreach($skills as $skill)
                                  <option value="{{$skill->id}}">{{$skill->skill_name}}</option>
                                  @endforeach
                                 
                                </select>
             </div>

                <button type="submit" class="btn btn-success">ADD</button>
            </div>
    </form>
</div>
@endsection