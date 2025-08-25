@extends('layout.main')

@section('title', 'Add to Events')

@section('content')
<div class="w-full mx-auto max-w-screen-lg p-6 flex justify-center">

    {{-- Card --}}
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">

        <h2 class="text-2xl font-semibold text-gray-800 text-center mb-6">
            Tambah Event Baru
        </h2>

        <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Nama Event --}}
            <div class="mb-5">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900">
                    Nama Event
                </label>
                <input type="text" id="title" name="title"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                    required>
            </div>

            {{-- Tanggal Event --}}
            <div class="mb-5">
                <label for="date" class="block mb-2 text-sm font-medium text-gray-900">
                    Tanggal Event
                </label>
                <input type="text" id="date" name="date"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                    required>
            </div>

            {{-- Location --}}
            <div class="mb-5">
                <label for="location" class="block mb-2 text-sm font-medium text-gray-900">
                    Location
                </label>
                <input type="text" id="location" name="location"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                    required>
            </div>

            {{-- Deskripsi --}}
            <div class="mb-5">
                <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900">
                    Deskripsi
                </label>
                <textarea id="description" name="description"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                    required></textarea>
            </div>

            {{-- image --}}
            <div class="mb-6">
                <label for="image" class="block mb-2 text-sm font-medium text-gray-900">
                    Image
                </label>
                <input type="file" id="image" name="image"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                    required>
            </div>

            {{-- Submit --}}
            <button type="submit"
                class="w-full text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-lg text-sm px-5 py-2.5 transition">
                Confirm New Event
            </button>
        </form>

    </div>
</div>
@endsection