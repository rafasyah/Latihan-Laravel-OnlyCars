@extends('layout.main')

@section('title', 'Add To Gallery')

@section('content')
 <div data-aos="fade-up" class="flex justify-center p-5">
 <a href="{{ route('gallery.create') }}" 
       class="text-white bg-blue-600 px-4 py-2 rounded-lg hover:bg-blue-700 transition">
       New Data
    </a>
  </div>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach ($gallery as $g)
        <div data-aos="fade-up" class="bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
            <a href="#">
                <img class="w-full h-48 object-cover rounded-t-lg" src="{{ asset('storage/' . $g->image_dokumentasi) }}" alt="{{ $g->title }}" />
            </a>
            <div class="p-5">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                    {{ $g->title }}
                </h5>
                <a href="{{ route('gallery.show', $g->id) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white 
                          bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none 
                          focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Read more
                </a>
            </div>
        </div>
    @endforeach
</div>

@endsection