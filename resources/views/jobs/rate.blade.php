@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
      
    @if(session()->has('success'))
        <label class="alert alert-success w-100">{{session('success')}}</label>
    @endif
    </div>
    <h1>Rate the freelancer</h1>
</div>
@endsection