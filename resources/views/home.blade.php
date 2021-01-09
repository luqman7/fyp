@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-end mb-2">
    <a href="{{ route('newborns.create') }}" class="btn btn-success">Add Newborn</a>
</div>
<div class="card">
    <div class="card-header">Dashboard</div>

    <div class="card-body">
        <h1>Charts</h1>
        <div class="flex">
            <div class="w-1/2">
                {!! $chart3->container() !!}
            </div>
            <div class="w-1/2">
                <h2 class="font-bold text-2xl">Today</h2>
            </div>
        </div>
        <div class="flex">
            <div class="w-1/2">
                {!! $chart->container() !!}
            </div>
            <div class="w-1/2">
                <h2 class="font-bold text-2xl">Monthly</h2>
            </div>
        </div>
        <div class="flex">
            <div class="w-1/2">
                {!! $chart1->container() !!}
            </div>
            <div class="w-1/2">
                <h2 class="font-bold text-2xl">Annually</h2>
            </div>
        </div>

        {!! $chart->script() !!}
        {!! $chart1->script() !!}
        {!! $chart3->script() !!}
    </div>
</div>
@endsection
