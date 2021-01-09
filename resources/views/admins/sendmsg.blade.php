@extends('layouts.app1')

@section('content')
<div class="card">
    <div class="card-header">
        Push to Telegram
    </div>
    <div class="card-body">
        <form action="{{ url('/send-message') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter your subject">
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" id="message" class="form-control" placeholder="Enter your query" rows="10"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    </div>
</div>
@endsection
