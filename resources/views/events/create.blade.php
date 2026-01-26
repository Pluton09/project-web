@extends('layouts.app')

@section('content')

<h2 class="mb-4">Tambah Event</h2>

<form action="/events" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-2">
        <input type="text" name="title" class="form-control" placeholder="Judul Event">
    </div>

    <div class="mb-2">
        <textarea name="description" class="form-control" placeholder="Deskripsi"></textarea>
    </div>

    <div class="mb-2">
        <input type="text" name="city" class="form-control" placeholder="Kota">
    </div>

    <div class="mb-2">
        <input type="text" name="venue" class="form-control" placeholder="Venue">
    </div>

    <div class="mb-2">
        <input type="date" name="date" class="form-control">
    </div>

    <div class="mb-2">
        <input type="number" name="price" class="form-control" placeholder="Harga">
    </div>

    <div class="mb-2">
        <input type="number" name="tickets_available" class="form-control" placeholder="Tiket tersedia">
    </div>

    <div class="mb-3">
        <label>Gambar Event</label>
        <input type="file" name="image" class="form-control">
    </div>

    <button class="btn btn-success">Simpan</button>
</form>

@endsection