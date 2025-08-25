<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merchandise; // ✅ Make sure to import your model
use Illuminate\Support\Facades\Storage;

class MerchandiseController extends Controller
{   
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $merchandise = Merchandise::orderBy("created_at", "desc")->paginate(10);
        return view("Merchandise", compact("merchandise"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('merchandise.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validateData = $request->validate([
            "name" => "required|string|max:255",
            "price" => "required|numeric|",
            "description" => "required|string",
            "image_merch" => "required|image|mimes:jpeg,png,jpg,gif,svg",

        ]);

        if ($request->hasFile('image_merch')) {
            $path = $request->file('image_merch')->store('images', 'public');
            $validateData['image_merch'] = $path;
        }

        Merchandise::create($validateData);

        return redirect('merchandise');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $merchandise = Merchandise::findOrFail($id);
        return view('merchandise.show', compact('merchandise'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $merchandise = Merchandise::findOrFail($id);
        return view('merchandise.edit', compact('merchandise'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $merchandise = Merchandise::findOrFail($id);

        $validateData = $request->validate([
            "name" => "required|string|max:255",
            "price" => "required|numeric|",
            "description" => "required|string",
            "image_merch" => "image|mimes:jpeg,png,jpg,gif,svg",
        ]);

        if ($request->hasFile('image_merch')) {
            if ($merchandise->image_merch) {
                Storage::disk('public')->delete($merchandise->image_merch);
            }
            $path = $request->file('image_merch')->store('images', 'public');
            $validateData['image_merch'] = $path;
        }

        $merchandise->update($validateData);

        return redirect()->route('merchandise.index')->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $merchandise = Merchandise::findOrFail($id);

        if ($merchandise->image_merch) {
            Storage::disk('public')->delete($merchandise->image_merch);
        }

        $merchandise->delete();

        return redirect()->route('merchandise.index')->with('success', 'Data berhasil dihapus!');
    }
}
