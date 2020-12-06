@extends('layouts.app1')

@section('content')

<div class="card">
    <div class="card-header">
        {{ isset($user) ? 'Edit Admin' : 'Add Admin'}}
    </div>

    <div class="card-body">
        <form action="{{ isset($user) ? route('admins.update', $user->id) : route('admins.store') }}" method="POST">
            @csrf
            @if(isset($user))
            @method('PUT')
            @endif
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value="{{ isset($user) ? $user->name : '' }}" placeholder="Name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" value="{{ isset($user) ? $user->email : '' }}">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" value="{{ isset($user) ? $user->password : '' }}">
            </div>

            <button type="submit" class="btn btn-success">
                {{ isset($user) ? 'Edit Admin': 'Add Admin'}}
            </button>
    </div>
    </form>
</div>
</div>
@endsection
