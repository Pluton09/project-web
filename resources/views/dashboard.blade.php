@extends('layouts.app')

@section('content')

<h2 class="mb-4" style="color: #facc15;">Dashboard</h2>

<div class="row justify-content-center g-4 mt-5">

    <div class="col-md-5">
        <div class="card-custom p-3 text-center">
            <h5>Jumlah Event</h5>
            <h2>{{ $totalEvent }}</h2>
        </div>
    </div>

    <div class="col-md-5">
        <div class="card-custom p-3 text-center">
            <h5>Jumlah Kota</h5>
            <h2>{{ $totalCity }}</h2>
        </div>
    </div>

      <div class="w-100"></div>

    <div class="col-md-5">
        <div class="card-custom p-3 text-center">
            <h5>Tiket Tersedia</h5>
            <h2>{{ $totalTickets }}</h2>
        </div>
    </div>

    <div class="col-md-5">
        <div class="card-custom p-3 text-center">
            <h5>Tiket Habis</h5>
            <h2>{{ $soldOut }}</h2>
        </div>
    </div>

</div>

@endsection