@extends('layouts.app')

@section('content')

<h2 class="mb-4">Tambah Event</h2>

<form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">

    @csrf

    <div class="mb-2">
        <label>Nama Event</label>
        <input type="text" name="title" class="form-control">
    </div>

    <div class="mb-2">
        <label>Deskripsi</label>
        <textarea name="description" class="form-control" ></textarea>
    </div>

    <div class="mb-2">
        <label>Kota</label>
        <input type="text" name="city" class="form-control">
    </div>

    <div class="mb-2">
        <label>Nama Venue</label>
        <input type="text" name="venue" class="form-control">
    </div>

    <div class="mb-2">
        <label>Tanggal Event</label>
        <input type="date" name="date" class="form-control">
    </div>

    <div class="mb-2">
        <label>Harga</label>
        <input type="number" name="price" class="form-control">
    </div>

    <div class="mb-2">
        <label>Stock</label>
        <input type="number" name="tickets_available" class="form-control">
    </div>

    <div class="mb-3">
        <label>Gambar Event</label>
        <input type="file" name="image" class="form-control">
    </div>

    <button class="btn btn-success">Simpan</button>
</form>

@endsection