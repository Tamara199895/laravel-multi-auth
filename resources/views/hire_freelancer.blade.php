<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
@extends('layouts.app')
@section('content')
<div class="container">
    @if(session()->has('success'))
    <label class="alert alert-success w-100">{{session('success')}}</label>
    @endif
    @if(session()->has('error'))
    <label class="alert alert-danger w-100">{{session('error')}}</label>
    @endif
    @error('skill')
           <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    @error('min_price')
           <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    @error('max_price')
           <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="sidebar-widget"> <h3>Search Freelancer basec on skills</h3> <div class="tags-container">
    <form  enctype="multipart/form-data">
    @csrf
      @foreach ($skills as $skill )
      <div class="tag">
      <input type="checkbox" name="skill[]" value="{{ $skill->id }}" id="{{ $skill->skill_name }}"
      @if(request()->input('skill') && in_array($skill->id, request()->input('skill'))) checked  @endif

      />
      <label for="{{ $skill->skill_name }}">{{ $skill->skill_name}}</label>
      </div>
      @endforeach
      </div>
      <div class="clearfix"></div>
      <div id="slider-range">
          <label for="hourly_pay">You can choose Salary Range</label><br>
          min:<input type="text" name="min_price" value="{{request()->input('min_price')}}" class="border-0 fw-bold text-warning"></input>
          max:<input type="text" name="max_price" value="{{request()->input('max_price')}}" class="border-0 fw-bold text-warning"></input>
          <br>
          hight to low:<input type="radio" name="sorting" value="desc" id="sorting"
          @if(request()->input('sorting')=="desc") checked @endif
          />
          <br>
          low to hight:<input type="radio" name="sorting" value="asc" id="sorting" 
          @if(request()->input('sorting')=="asc") checked @endif
          />

    </div>
    <br>    
      <button type="submit" class=" btn-success btn-sm">Filter</button>
      <a class=" btn-danger btn-sm" href="hireFreelancer">Delete Filter</a>
      </form>
    </div>

    


    <div class="col-md-9 mt-3">
                <div class="card ">
                    <div>
                            @if(!empty($freelancers))
                                @foreach($freelancers as $freelancer)
                                                <div class="col-md-4 mt-3">
                                                    <div class="border p-2" style="display:flex;align-items:baseline">
                                                        <h6>{{ $freelancer->user->name }}-</h6>
                                                        <b>{{$freelancer->hourly_pay}}$</b>
                                                        <a class="btn-success" style="margin-left:15px" href="{{route('customer.hire', $freelancer->freelancer_id)}}">Hire</a>
                                                    </div>
                                                </div>
                                  @endforeach
                                  {{ $freelancers->links()}}
                            @else
                                    <p> No one Found</p>
                     
                    </div>
                    @endif
                </div>
            </div>
        </div>
   @endsection