@extends('layouts.app')

@section('content')

<h2>Edit Event</h2>

<form action="{{ route('events.update', $event->id) }}" method="POST">

    @csrf
    @method('PUT')

    <input type="text" name="title" value="{{ $event->title }}" class="form-control mb-2">
    <textarea name="description" class="form-control mb-2">{{ $event->description }}</textarea>
    <input type="text" name="city" value="{{ $event->city }}" class="form-control mb-2">
    <input type="text" name="venue" value="{{ $event->venue }}" class="form-control mb-2">
    <input type="date" name="date" value="{{ $event->date }}" class="form-control mb-2">
    <input type="number" name="price" value="{{ $event->price }}" class="form-control mb-2">
    <input type="number" name="tickets_available" value="{{ $event->tickets_available }}" class="form-control mb-2">

    <button class="btn btn-success">Update</button>
</form>

@endsection