@extends('layouts.app1')

@section('content')
<div class="d-flex justify-content-end mb-2">
    <a href="//" class="btn btn-success">TEST</a>
</div>

@foreach($users as $user)
<div class="card">
    <div class="card-header">
        {{ $user->name }}
        <a href="" class="btn btn-info btn-sm">VIEW</a>
    </div>

    <div class="card-body">
        <center>{{ $user->email }}</center>
    </div>
</div>
@endforeach



@endsection
