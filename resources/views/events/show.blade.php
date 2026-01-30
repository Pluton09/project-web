@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-body">
        <h2>{{ $event->title }}</h2>

        <p class="mt-3">{{ $event->description }}</p>

        <p><strong>Kota:</strong> {{ $event->city }}</p>
        <p><strong>Venue:</strong> {{ $event->venue }}</p>
        <p><strong>Tanggal:</strong> {{ $event->date }}</p>
        <p><strong>Harga mulai:</strong> Rp {{ number_format($event->price) }}</p>
        <p><strong>Tiket tersedia:</strong> {{ $event->tickets_available }}</p>


      <a href="{{ route('events.index') }}" class="btn btn-secondary mt-3">← Kembali</a>

    </div>
</div>

@endsection