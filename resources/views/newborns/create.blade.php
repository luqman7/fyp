@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        {{ isset($newborn) ? 'Edit Newborn' : 'Add Newborn'}}
    </div>

    <div class="card-body">
        <form action="{{ isset($newborn) ? route('newborns.update', $newborn->id) : route('newborns.store') }}" method="POST">
            @csrf
            @if(isset($newborn))
            @method('PUT')
            @endif
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value="{{ isset($newborn) ? $newborn->parents_name : '' }}" placeholder="Name">
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" class="form-control" name="dob" value="{{ isset($newborn) ? $newborn->dob : '' }}">
            </div>
            <div class="form-group">
                <label for="sex">Sex</label>
                <select name="sex" id="sex" class="form-control">
                    <option value=''>Please Select</option>
                    <option value='M' {{$newborn->sex=="M" ? "selected" : ""}}>Male</option>
                    <option value='F' {{$newborn->sex=="F" ? "selected" : ""}}>Female</option>
                    <option value='U' {{$newborn->sex=="U" ? "selected" : ""}}>Unknown</option>
                </select>
            </div>
            <div class="form-group">
                <label for="result">Result</label>
                <select name="result" id="result" class="form-control">
                    <option value=''>Please Select</option>
                    <option value='P' {{$newborn->result=="P" ? "selected" : ""}}>Pass</option>
                    <option value='F' {{$newborn->result=="F" ? "selected" : ""}}>Fail</option>
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

            <button type="submit" class="btn btn-success">
                {{ isset($newborn) ? 'Edit Newborn': 'Add Newborn'}}
            </button>
    </div>
    </form>
</div>
</div>
@endsection