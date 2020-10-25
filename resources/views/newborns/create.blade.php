@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Add New Newborn</div>

    <div class="card-body">
        <form action="{{ route('newborns.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value="" placeholder="Name">
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" class="form-control" name="dob" value="">
            </div>
            <div class="form-group">
                <label for="sex">Sex</label>
                <select name="sex" id="sex" class="form-control">
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                    <option value="U">Unknown</option>
                </select>
            </div>
            <div class="form-group">
                <label for="result">Result</label>
                <select name="result" id="result" class="form-control">
                    <option value="P">Pass</option>
                    <option value="F">Fail</option>
                </select>
            </div>
            <div class="form-group">
                <label for="stage">Stage</label>
                <select name="stage" id="stage" class="form-control">
                    @foreach($stages as $stage)
                    <option value="{{ $stage->id }}">{{ $stage->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <button type="submit" class="btn btn-success">Add Newborn</button>
    </div>
    </form>
</div>
</div>
@endsection