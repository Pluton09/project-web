<div class="col-md-4">
    <div class="card-custom p-0 overflow-hidden {{ $isExpired ? 'event-expired' : '' }}">

        <div style="position:relative;">
            @if($event->image)
                <img src="{{ asset('storage/' . $event->image) }}"
                     style="width:100%; height:180px; object-fit:cover;">
            @else
                <div style="height:180px; background:#222;"></div>
            @endif

            @if($isExpired)
                <span class="expired-badge">EVENT BERAKHIR</span>
            @endif

            @if($event->tickets_available == 0)
                <span style="
                    position:absolute;
                    top:12px;
                    right:12px;
                    background:#dc2626;
                    color:white;
                    padding:6px 14px;
                    border-radius:999px;
                    font-size:12px;
                    font-weight:600;">
                    SOLD OUT
                </span>
            @endif
        </div>

        <div class="p-4">
            <h5 class="fw-semibold">{{ $event->title }}</h5>
            <p class="text-muted mb-1">{{ $event->city }}</p>
            <p class="mb-3">Mulai dari: <strong>Rp {{ number_format($event->price) }}</strong></p>

            <div class="d-flex gap-2">
                <a href="{{ route('events.show', $event) }}" class="btn btn-warning btn-sm">Detail</a>
                <a href="{{ route('events.edit', $event) }}" class="btn btn-info btn-sm">Edit</a>

                <form action="{{ route('events.destroy', $event) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm"
                        onclick="return confirm('Yakin hapus event ini?')">
                        Delete
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>