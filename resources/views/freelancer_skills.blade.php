@extends('layouts.app')
@section('content')
<div class="container">
  <h1> Skills</h1>
    @if(session()->has('success'))
    <label class="alert alert-success w-100">{{session('success')}}</label>
    @endif
    <form method="POST" action="{{ route('freelancer.createSkills') }}">
    @csrf
    <div>
      @error('skills')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
      <label><strong>Select Skills for your profile :</strong></label><br/>
      <select style="margin: 15px; height: 200px" class="form-control" name="skill_id[]" multiple="">
        @foreach($skills as $skill)
        <option value="{{$skill->id}}">{{$skill->skill_name}}</option>
        @endforeach

        </select>
    </div>

    <button type="submit" class="btn btn-success">ADD</button>
</div>
</form> </div> @endsection