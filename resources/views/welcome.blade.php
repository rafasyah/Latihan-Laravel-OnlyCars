@extends('layout.main')

@section('title', 'Welcome To OnlyCars')

@section('content')

{{-- Hero --}}
<div class="bg-blue-950 p-10 rounded-2xl text-gray-100 text-center mb-12 shadow-xl " data-aos="fade-up">
    <h1 class="text-5xl md:text-7xl font-extrabold mb-4">Welcome to Only Cars</h1>
    <p class="text-lg md:text-xl">Hosting events for car enthusiasts 🚗🔥</p>
</div>

{{-- Events --}}
<h2 class="text-4xl font-bold mb-8 text-gray-800 border-b-4 border-blue-600 inline-block pb-2" data-aos="fade-right">
    Upcoming Events
</h2>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
@forelse($events as $event)
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
        <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}" class="w-full h-56 object-cover">
        <div class="p-6">
            <h3 class="text-2xl font-semibold">{{ $event->title }}</h3>
            <p class="text-sm text-gray-500">📅 {{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}</p>
            <p class="text-sm text-gray-500">📍 {{ $event->location }}</p>
            <p class="text-gray-700">{{ $event->description }}</p>
        </div>
    </div>
@empty
    <p class="text-gray-500">No upcoming events.</p>
@endforelse

</div>

{{-- Gallery --}}
<h2 class="text-4xl font-bold mb-8 text-gray-800 border-b-4 border-blue-600 inline-block pb-2" data-aos="fade-left">
    Gallery
</h2>
<div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-16">
    @forelse($gallery as $item)
        <div class="bg-white rounded-xl shadow-md hover:shadow-lg overflow-hidden transition" data-aos="flip-left">
            <img src="{{ asset('storage/' . $item->image_dokumentasi) }}" alt="{{ $item->title }}" class="w-full h-40 object-cover">
            <div class="p-3 text-center">
                <p class="text-gray-800 font-medium">{{ $item->title }}</p>
            </div>
        </div>
    @empty
        <p class="text-gray-500">No images in gallery.</p>
    @endforelse
</div>

{{-- Merchandise --}}
<h2 class="text-4xl font-bold mb-8 text-gray-800 border-b-4 border-blue-600 inline-block pb-2" data-aos="fade-right">
    Merchandise
</h2>
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
    @forelse($merchandise as $merch)
        <div class="bg-white rounded-2xl shadow-md hover:shadow-lg p-5 transition flex flex-col" data-aos="fade-up">
            <img src="{{ asset('storage/' . $merch->image_merch) }}" alt="{{ $merch->name }}" class="rounded-xl h-48 w-full object-cover mb-4">
            <h3 class="font-semibold text-xl text-gray-900 mb-2">{{ $merch->name }}</h3>
            <p class="text-gray-600 flex-grow">{{ $merch->description }}</p>
            <p class="text-blue-600 font-bold mt-3 text-lg">Rp {{ number_format($merch->price, 0, ',', '.') }}</p>
        </div>
    @empty
        <p class="text-gray-500">No merchandise available.</p>
    @endforelse
</div>
@endsection