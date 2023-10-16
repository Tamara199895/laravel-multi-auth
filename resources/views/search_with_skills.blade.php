@extends('layouts.app')
@section('content')
<div class="container">
    <div class="sidebar-widget"> <h3>Search Jobs depending on skills</h3> <div class="tags-container">
    <form action="{{ route('freelancer.filter') }}" enctype="multipart/form-data">
    @csrf
      @foreach ($skills as $skill )
      <div class="tag">
      <input type="checkbox" name="skill[]" value="{{ $skill->id }}" id="{{ $skill->skill_name }}" />
      <label for="{{ $skill->skill_name }}">{{ $skill->skill_name}}</label>
      </div>
      @endforeach
      </div>
      <div class="clearfix"></div>
      <button type="submit" class="btn btn-success btn-sm">Filter</button>
      <a class="btn btn-danger btn-sm" href="searchWithSkills">Delete Filter</a>
      </form>
    </div>

    <div class="col-md-9 mt-3">
                <div class="card ">
                    <div>
                            @if(!empty($jobs))
                                @foreach($jobs as $job)
                                                <div class="col-md-4 mt-3">
                                                    <div class="border p-2">
                                                        <h6>Job name - {{ $job->work_name }}</h6>
                                                    </div>
                                                </div>
                                  @endforeach
                                
                            @else
                                    <p> No Job Found</p>
                     
                    </div>
                    @endif
                </div>
            </div>
        </div>
   @endsection