@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                  You are a Customer- {{auth()->user()->name}}<br>
                 
                  <ul class="nav navbar-nav">
                    <li><a href="{{ route('customer.show', auth()->user()->id)}}">See My Work </a></li>
                </ul>
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection