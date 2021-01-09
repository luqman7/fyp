@extends('layouts.app1')

@section('content')
<div class="d-flex justify-content-end mb-2">
    <!--<a href="//" class="btn btn-success">TEST</a>-->
</div>

<div class="card card-default">
    <div class="card-header">List of Appointment</div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <th>Name</th>
                    <th>IC Number</th>
                    <th>Date of Appointment</th>
                    <th>Phone Number</th>
                </thead>

                <tbody>
                    @foreach($appointments as $appt)
                        <tr>
                            <td>
                                {{ $appt->name }}
                            </td>
                            <td>
                                {{ $appt->ic }}
                            </td>
                            <td>
                                {{ $appt->bookdate }}
                            </td>
                            <td>
                                {{ $appt->phone }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</div>
@endsection
