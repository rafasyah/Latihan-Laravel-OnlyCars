<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery; // ✅ Make sure to import your model
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{   
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gallery = Gallery::orderBy("created_at", "desc")->paginate(10);
        return view("Gallery", compact("gallery"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validateData = $request->validate([
            'title'            => 'required|string',
            'image_dokumentasi'=> 'required|image|mimes:jpeg,png,jpg,gif,svg',

        ]);

        if ($request->hasFile('image_dokumentasi')) {
            $path = $request->file('image_dokumentasi')->store('images', 'public');
            $validateData['image_dokumentasi'] = $path;
        }

        Gallery::create($validateData);

        return redirect('gallery');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('gallery.show', compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $gallery = Gallery::findOrFail($id);

        $validateData = $request->validate([
            'title'       => 'required|string|max:255',
            'image_dokumentasi' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image_dokumentasi')) {
            if ($gallery->image_dokumentasi) {
                Storage::disk('public')->delete($gallery->image_dokumentasi);
            }
            $path = $request->file('image_dokumentasi')->store('images', 'public');
            $validateData['image_dokumentasi'] = $path;
        }

        $gallery->update($validateData);

        return redirect()->route('gallery.index')->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gallery = Gallery::findOrFail($id);

        if ($gallery->image_dokumentasi) {
            Storage::disk('public')->delete($gallery->image_dokumentasi);
        }

        $gallery->delete();

        return redirect()->route('gallery.index')->with('success', 'Data berhasil dihapus!');
    }
}
