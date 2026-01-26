<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->get();
        return view('events.index', compact('events'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
{
    $data = $request->validate([
        'title' => 'required',
        'description' => 'required',
        'city' => 'required',
        'venue' => 'required',
        'date' => 'required|date',
        'price' => 'required|numeric',
        'tickets_available' => 'required|numeric',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
    ]);

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('events', 'public');
    }

    \App\Models\Event::create($data);

    return redirect('/events')->with('success', 'Event berhasil ditambahkan');
}

    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('events.show', compact('event'));
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, $id)
{
        $event = Event::findOrFail($id);


        $data = $request->validate([
        'title' => 'required',
        'description' => 'required',
        'city' => 'required',
        'venue' => 'required',
        'date' => 'required|date',
        'price' => 'required|numeric',
        'tickets_available' => 'required|numeric',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);


        if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('events', 'public');
        }


        $event->update($data);


        return redirect('/events')->with('success', 'Event berhasil diupdate');
        }

    public function destroy($id)
    {
        Event::destroy($id);
        return redirect('/events')->with('success', 'Event berhasil dihapus');
    }
    public function dashboard()
{
        $totalEvent = \App\Models\Event::count();
        $totalCity = \App\Models\Event::distinct('city')->count('city');
        $totalTickets = \App\Models\Event::sum('tickets_available');
        $soldOut = \App\Models\Event::where('tickets_available', 0)->count();


        return view('dashboard', compact(
        'totalEvent',
        'totalCity',
        'totalTickets',
        'soldOut'
        ));
        }
}