<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Gallery;
use App\Models\Merchandise;

class WelcomeController extends Controller
{
    public function index()
    {
        // Ambil hanya 1 event terbaru
        $events = Event::orderBy('date', 'asc')->take(1)->get();

        $gallery = Gallery::latest()->take(8)->get();
        $merchandise = Merchandise::latest()->get();

        return view('welcome', compact('events', 'gallery', 'merchandise'));
    }
}
