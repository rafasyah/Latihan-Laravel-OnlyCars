@extends('layout.main')

@section('title', $gallery->title . ' - Only Cars')

@section('content')

{{-- Header Image --}}
<img 
    src="{{ asset('storage/' . $gallery->image_dokumentasi) }}" 
    alt="{{ $gallery->title }}" 
    class="w-full max-h-[200px] object-cover rounded-lg mb-8"
/>

{{-- Container --}}
<div class="max-w-screen-lg mx-auto px-6">

    {{-- Motor Info Card --}}
    <div class="bg-white shadow-md rounded-lg p-6 text-center">
        
       
        <h2 class="text-3xl font-semibold text-gray-800">
            {{ $gallery->title }}
        </h2>

     
     



      
        <div class="mt-6 flex flex-wrap gap-3 justify-center">
           
           


            <a href="{{ route('gallery.edit', $gallery->id) }}" 
                class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                Edit Data
            </a>

            <form action="{{ route('gallery.destroy', $gallery->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" 
                    class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition">
                    Hapus
                </button>
            </form>
        </div>

    </div>

</div>
@endsection
