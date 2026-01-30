@extends('layouts.app')

@section('content')

<h2 class="mb-4" style="color: #facc15;">Event Terbaru</h2>

<a href="{{ route('events.create') }}" class="btn btn-primary mb-4">+ Tambah Event</a>

<form action="{{ route('events.index') }}" method="GET" class="mb-4">
    <div class="input-group">
        <input 
            type="text" 
            name="search" 
            class="form-control"
            placeholder="Cari event (judul, kota, venue)..."
            value="{{ request('search') }}">
        <button class="btn btn-primary">Cari</button>
    </div>
</form>

@if(request('search'))
    <h4 class="mb-3 text-warning">🔍 Hasil Pencarian</h4>

    <div class="row g-4 mb-5">
        @forelse($events as $event)
            @include('partials.card', ['event' => $event, 'isExpired' => false])
        @empty
            <p class="text-muted">Event tidak ditemukan.</p>
        @endforelse
    </div>
@endif

@if(!request('search'))
<h4 class="mb-3 text-warning">🔥 Event Minggu Ini</h4>

<div class="row g-4 mb-5">
    @forelse($eventMingguIni as $event)
        @php $isExpired = false; @endphp
        @includeWhen(true, 'partials.card', ['event' => $event, 'isExpired' => false])
    @empty
        <p class="text-muted">Belum ada event minggu ini.</p>
    @endforelse
</div>

<h4 class="mb-3 text-secondary">⛔ Event Berakhir</h4>
<div class="row g-4 mb-5">
    @forelse($eventExpired as $event)
        @includeWhen(true, 'partials.card', ['event' => $event, 'isExpired' => true])
    @empty
        <p class="text-muted">Belum ada event berakhir.</p>
    @endforelse
</div>

<h4 class="mb-3 text-warning">📅 Event Akan Datang</h4>
<div class="row g-4 mb-5">
    @forelse($eventUpcoming as $event)
        @includeWhen(true, 'partials.card', ['event' => $event, 'isExpired' => false])
    @empty
        <p class="text-muted">Belum ada event akan datang.</p>
    @endforelse
</div>

@endif

@endsection