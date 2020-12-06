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
    <button class="btn-danger btn-sm" onclick="handleDelete({{ $newborn->id }})">REMOVE</button>
    </div>

    <div class="card-body">
        <center>Stage {{ $newborn->stage_id }}</center>
    </div>

    <div class="modal" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
          <form action="" method="POST" id="deleteNewbornForm">
              @@method('DELETE')
              @csrf
            <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Delete Newborn</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="deleteModalLabel">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                  <button type="submit" class="btn btn-danger">Confirm Delete</button>
                </div>
              </div>
          </form>
        </div>
      </div>

</div>
@endforeach

{{ $newborns->links() }}

@endsection

@section('scripts')
    <script>
        function handleDelete(id) {
            var form = document.getElementById('deleteNewbornForm')
            form.action = '/newborns/' + id
                $('deleteModal').modal('show')
        }
    </script>
@endsection
