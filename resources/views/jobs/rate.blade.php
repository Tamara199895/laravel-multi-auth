@extends('layouts.app')
@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
      
    @if(session()->has('success'))
        <label class="alert alert-success w-100">{{session('success')}}</label>
    @endif
    </div>
    <h1>Rate the freelancer</h1>
</div> -->


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
     .rate {
         float: left;
         height: 46px;
         padding: 0 10px;
         }
         .rate:not(:checked) > input {
         position:absolute;
         display: none;
         }
         .rate:not(:checked) > label {
         float:right;
         width:1em;
         overflow:hidden;
         white-space:nowrap;
         cursor:pointer;
         font-size:30px;
         color:#ccc;
         }
         .rated:not(:checked) > label {
         float:right;
         width:1em;
         overflow:hidden;
         white-space:nowrap;
         cursor:pointer;
         font-size:30px;
         color:#ccc;
         }
         .rate:not(:checked) > label:before {
         content: '★ ';
         }
         .rate > input:checked ~ label {
         color: #ffc700;
         }
         .rate:not(:checked) > label:hover,
         .rate:not(:checked) > label:hover ~ label {
         color: #deb217;
         }
         .rate > input:checked + label:hover,
         .rate > input:checked + label:hover ~ label,
         .rate > input:checked ~ label:hover,
         .rate > input:checked ~ label:hover ~ label,
         .rate > label:hover ~ input:checked ~ label {
         color: #c59b08;
         }
         .star-rating-complete{
            color: #c59b08;
         }
         .rating-container .form-control:hover, .rating-container .form-control:focus{
         background: #fff;
         border: 1px solid #ced4da;
         }
         .rating-container textarea:focus, .rating-container input:focus {
         color: #000;
         }
         .rated {
         float: left;
         height: 46px;
         padding: 0 10px;
         }
         .rated:not(:checked) > input {
         position:absolute;
         display: none;
         }
         .rated:not(:checked) > label {
         float:right;
         width:1em;
         overflow:hidden;
         white-space:nowrap;
         cursor:pointer;
         font-size:30px;
         color:#ffc700;
         }
         .rated:not(:checked) > label:before {
         content: '★ ';
         }
         .rated > input:checked ~ label {
         color: #ffc700;
         }
         .rated:not(:checked) > label:hover,
         .rated:not(:checked) > label:hover ~ label {
         color: #deb217;
         }
         .rated > input:checked + label:hover,
         .rated > input:checked + label:hover ~ label,
         .rated > input:checked ~ label:hover,
         .rated > input:checked ~ label:hover ~ label,
         .rated > label:hover ~ input:checked ~ label {
         color: #c59b08;
         }
</style>  
                                <div class="container">
                                    <div class="row">
                                       <div class="col mt-4">
                                          <form class="py-2 px-4" action="{{route('jobs.rateJob')}}" style="box-shadow: 0 0 10px 0 #ddd;" method="POST" autocomplete="off">
                                             @csrf
                                             <p class="font-weight-bold ">Review</p>
                                             <div class="form-group row">
                                                <input type="hidden" name="job_id" value="{{$job_id}}">
                                                <input type="hidden" name="freelancer_id" value="{{$freelancer_id   }}">
                                                <div class="col">
                                                   <div class="rate">
                                                      <input type="radio" id="star5" class="rate" name="rate" value="5"/>
                                                      <label for="star5" title="5 star">5 stars</label>
                                                      <input type="radio" checked id="star4" class="rate" name="rate" value="4"/>
                                                      <label for="star4" title="4 star">4 stars</label>
                                                      <input type="radio" id="star3" class="rate" name="rate" value="3"/>
                                                      <label for="star3" title="3 star">3 stars</label>
                                                      <input type="radio" id="star2" class="rate" name="rate" value="2">
                                                      <label for="star2" title="2 star">2 stars</label>
                                                      <input type="radio" id="star1" class="rate" name="rate" value="1"/>
                                                      <label for="star1" title="1 star">1 star</label>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="form-group row mt-4">
                                                <div class="col">
                                                @error('rate_description')
                                                  <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                                   <textarea class="form-control" name="rate_description" rows="6 " placeholder="Comment" maxlength="200"></textarea>
                                                </div>
                                             </div>
                                             <div class="mt-3 text-right">
                                                <button class="btn btn-sm py-2 px-3 btn-info">Submit
                                                </button>
                                             </div>
                                          </form>
                                       </div>
                                    </div>
                                 </div>
@endsection