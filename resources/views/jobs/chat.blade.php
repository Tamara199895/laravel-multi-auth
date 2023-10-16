<!-- resources/views/chat.blade.php -->

@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Chat</div>

                <div class="panel-body">
                    @error('message')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
               
                <form method="POST" action="{{ route('jobs.send_message') }}">
                        @csrf
                        <input type="hidden" name="customer_id" value="{{ $customer_id }}">
                        <input type="hidden" name="freelancer_id" value="{{ $freelancer_id }}">
                        <input type="hidden" name="job_id" value="{{ $job_id }}">
                        <div class="row mb-3">
                            <label for="message" class="col-md-4 col-form-label text-md-end">Message</label>

                            <div class="col-md-6">
                                <textarea id="message" type="text" class="form-control" name="message" value="{{ old('message') }}"></textarea>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   Send Message
                                </button>
                            </div>
                        </div>
                    </form>

            </div>
        </div>
    </div>
</div>
@endsection
