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
        <button class="btn btn-danger btn-sm" onclick="handleDelete({{ $user->id }})">REMOVE USER</button>
    </div>

    <div class="modal" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
          <form action="" method="POST" id="deleteUserForm">
              @csrf
              @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="DeleteModalLabel">Delete User</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p class="text-center">Are you sure you want to remove this user?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-danger">Confirm</button>
                </div>
              </div>
          </form>
        </div>
      </div>


    <div class="card-body">
        <center>{{ $user->email }}</center>
    </div>
</div>
@endforeach



@endsection

@section('scripts')
    <script>
        function handleDelete(id) {
            var form = document.getElementById('deleteUserForm')
            form.action = '/user/' + id
                $('#deleteModal').modal('show')
        }
    </script>
@endsection
