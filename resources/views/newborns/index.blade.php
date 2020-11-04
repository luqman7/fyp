@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end mb-2">
    <a href="{{ route('newborns.create') }}" class="btn btn-success">Add Newborn</a>
</div>

@foreach($newborns as $newborn)
<div class="card">
    <div class="card-header">
        {{ $newborn->parents_name }}
        <a href="{{ route('newborns.edit', $newborn->id) }}" class="btn btn-info btn-sm">EDIT</a>
    </div>

    <div class="card-body">
        <center>Stage {{ $newborn->stage_id }}</center>
    </div>
</div>
@endforeach

{{ $newborns->links() }}

@endsection