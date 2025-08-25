@extends('layout.main')

@section('title', 'Add to Events')

@section('content')
<div class="w-full mx-auto max-w-screen-lg p-6 flex justify-center">

    {{-- Card --}}
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">

        <h2 class="text-2xl font-semibold text-gray-800 text-center mb-6">
            Tambah Merch Baru
        </h2>

        <form action="{{ route('merchandise.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Nama Merch --}}
            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">
                    Nama Merch
                </label>
                <input type="text" id="name" name="name" value="{{ old('name') }}"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                    required>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Harga --}}
            <div class="mb-5">
                <label for="price" class="block mb-2 text-sm font-medium text-gray-900">
                    Harga
                </label>
                <input type="number" id="price" name="price" value="{{ old('price') }}" step="0.01" min="0"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                    required>
                @error('price')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Deskripsi --}}
            <div class="mb-5">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900">
                    Deskripsi
                </label>
                <textarea id="description" name="description"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                    required>{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Image --}}
            <div class="mb-6">
                <label for="image_merch" class="block mb-2 text-sm font-medium text-gray-900">
                    Image
                </label>
                <input type="file" id="image_merch" name="image_merch"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                    required>
                @error('image_merch')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit --}}
            <button type="submit"
                class="w-full text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-lg text-sm px-5 py-2.5 transition">
                Confirm New Merch
            </button>
        </form>

    </div>
</div>
@endsection
