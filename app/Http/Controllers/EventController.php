<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event; // ✅ Make sure to import your model
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{   
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::orderBy("created_at", "desc")->paginate(10);
        return view("Event", compact("events"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validateData = $request->validate([
            'title'       => 'required|string',
            'date'        => 'required|date',
            'location'    => 'required|string',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $validateData['image'] = $path;
        }

        Event::create($validateData);

        return redirect('events');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::findOrFail($id);
        return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = Event::findOrFail($id);
        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $event = Event::findOrFail($id);

        $validateData = $request->validate([
            'title'       => 'required|string|max:255',
            'date'        => 'required|date',
            'location'    => 'required|string',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($event->image) {
                Storage::disk('public')->delete($event->image);
            }
            $path = $request->file('image')->store('images', 'public');
            $validateData['image'] = $path;
        }

        $event->update($validateData);

        return redirect()->route('events.index')->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);

        if ($event->image) {
            Storage::disk('public')->delete($event->image);
        }

        $event->delete();

        return redirect()->route('events.index')->with('success', 'Data berhasil dihapus!');
    }
}
