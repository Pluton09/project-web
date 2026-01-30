<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EventController extends Controller
{

public function index(Request $request)
{
    $query = Event::query();

    if ($request->filled('search')) {
        $search = $request->search;

        $query->where(function ($q) use ($search) {
            $q->where('title', 'like', "%{$search}%")
              ->orWhere('city', 'like', "%{$search}%")
              ->orWhere('venue', 'like', "%{$search}%");
        });
    }

    $events = $request->filled('search')
        ? (clone $query)->orderBy('date', 'asc')->get()
        : collect();

    $today = Carbon::today();
    $nextWeek = Carbon::today()->addDays(7);

    $eventMingguIni = (clone $query)
        ->whereBetween('date', [$today, $nextWeek])
        ->orderBy('date', 'asc')
        ->get();

    $eventUpcoming = (clone $query)
        ->where('date', '>=', $today)
        ->orderBy('date', 'asc')
        ->get();

    $eventExpired = (clone $query)
        ->where('date', '<', $today)
        ->orderBy('date', 'desc')
        ->get();

    return view('events.index', compact(
        'events',          
        'eventMingguIni',
        'eventUpcoming',
        'eventExpired'
    ));
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

        Event::create($data);

        return redirect()
            ->route('events.index')
            ->with('success', 'Event berhasil ditambahkan');
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

        return redirect()
            ->route('events.index')
            ->with('success', 'Event berhasil diupdate');
    }

    public function destroy($id)
    {
        Event::destroy($id);

        return redirect()
            ->route('events.index')
            ->with('success', 'Event berhasil dihapus');
    }

    public function dashboard()
    {
        $totalEvent = Event::count();
        $totalCity = Event::distinct('city')->count('city');
        $totalTickets = Event::sum('tickets_available');
        $soldOut = Event::where('tickets_available', 0)->count();

        return view('dashboard', compact(
            'totalEvent',
            'totalCity',
            'totalTickets',
            'soldOut'
        ));
    }
}
