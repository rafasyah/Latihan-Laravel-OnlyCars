@extends('layout.main')

@section('title', $merchandise->name . ' - Only Cars')

@section('content')

{{-- Header Image --}}
<img 
    src="{{ asset('storage/' . $merchandise->image_merch) }}" 
    alt="{{ $merchandise->name }}" 
    class="w-full max-h-[200px] object-cover rounded-lg mb-8"
/>

{{-- Container --}}
<div class="max-w-screen-lg mx-auto px-6">

    {{-- Motor Info Card --}}
    <div class="bg-white shadow-md rounded-lg p-6 text-center">
        
       
        <h2 class="text-3xl font-semibold text-gray-800">
            {{ $merchandise->name }}
        </h2>

     
        <p class="mt-4 text-blue-600 font-bold text-2xl">
            Rp {{ ($merchandise->price) }}
        </p>

        <div class="mt-4 space-y-2 text-gray-700">
            <p><strong>Tahun:</strong> {{ $merchandise->price }}</p>
            <p><strong>Jarak Tempuh:</strong> {{ $merchandise->description }}</p>
        </div>


      
        <div class="mt-6 flex flex-wrap gap-3 justify-center">
           
           


            <a href="{{ route('merchandise.edit', $merchandise->id) }}" 
                class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                Edit Data
            </a>

            <form action="{{ route('merchandise.destroy', $merchandise->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
