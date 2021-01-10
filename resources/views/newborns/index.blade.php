@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end mb-2">
    <a href="{{ route('newborns.create') }}" class="btn btn-success">Add Newborn</a>
</div>

<div class="card card-default">
    <div class="card-header">List of Tested Newborns</div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <th>Name</th>
                    <th>Stage</th>
                    <th>Test Result (P/F)</th>
                    <th></th>
                </thead>

                <tbody>
                    @foreach($newborns as $newborn)
                        <tr>
                            <td>
                                {{ $newborn->parents_name }}
                            </td>
                            <td>
                                Stage {{ $newborn->stage_id }}
                            </td>
                            <td>
                                {{ $newborn->result }}
                            </td>
                            <td>
                                <a href="{{ route('newborns.edit', $newborn->id) }}" class="btn btn-info btn-sm">EDIT</a>
                                <button class="btn btn-danger btn-sm" onclick="handleDelete({{ $newborn->id }})">DELETE</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="modal" id="deleteModal" tabindex="-1">
            <div class="modal-dialog">
              <form action="" method="POST" id="deleteNewbornForm">
                  @csrf
                  @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="DeleteModalLabel">Delete Newborn</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p class="text-center">Are you sure you want to delete this newborn?</p>
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

{{ $newborns->links() }}

@endsection

@section('scripts')
    <script>
        function handleDelete(id) {
            var form = document.getElementById('deleteNewbornForm')
            form.action = '/newborns/' + id
                $('#deleteModal').modal('show')
        }
    </script>
@endsection
