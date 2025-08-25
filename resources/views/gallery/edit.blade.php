@extends('layout.main')

@section('title', 'Edit Gallery Item')

@section('content')
<div class="w-full mx-auto max-w-screen-lg p-6 flex justify-center">

    {{-- Card --}}
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">

        <h2 class="text-2xl font-semibold text-gray-800 text-center mb-6">
            Edit Gallery
        </h2>

        <form action="{{ route('gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Judul --}}
            <div class="mb-5">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Title</label>
                <input value="{{ old('title', $gallery->title) }}" type="text" id="title" name="title"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                           focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Preview Gambar Lama --}}
            @if($gallery->image_dokumentasi)
                <div class="mb-4">
                    <p class="text-sm text-gray-500 mb-2">Current Image:</p>
                    <img src="{{ asset('storage/' . $gallery->image_dokumentasi) }}" 
                         alt="Gallery Image" class="w-40 rounded shadow">
                </div>
            @endif

            {{-- Upload Gambar Baru --}}
            <div class="mb-6">
                <label for="image_dokumentasi" class="block mb-2 text-sm font-medium text-gray-900">
                    New Image (optional)
                </label>
                <input type="file" id="image_dokumentasi" name="image_dokumentasi"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                @error('image_dokumentasi')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
          
            {{-- Submit --}}
            <button type="submit"
                class="w-full text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-lg text-sm px-5 py-2.5 transition">
                Update Gallery Item
            </button>
        </form>

    </div>
</div>
@endsection
