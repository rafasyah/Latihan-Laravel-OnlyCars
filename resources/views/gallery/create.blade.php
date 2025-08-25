@extends('layout.main')

@section('title', 'Add to Gallery')

@section('content')
<div class="w-full mx-auto max-w-screen-lg p-6 flex justify-center">

    {{-- Card --}}
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">

        <h2 class="text-2xl font-semibold text-gray-800 text-center mb-6">
            Tambah Image Gallery Baru
        </h2>

        <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Nama Event --}}
            <div class="mb-5">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900">
                    Nama Gallery
                </label>
                <input type="text" id="title" name="title"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                    required>
            </div>
            {{-- image --}}
            <div class="mb-6">
                <label for="image_dokumentasi" class="block mb-2 text-sm font-medium text-gray-900">
                    Image
                </label>
                <input type="file" id="image_dokumentasi" name="image_dokumentasi"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                    required>
            </div>

            {{-- Submit --}}
            <button type="submit"
                class="w-full text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-lg text-sm px-5 py-2.5 transition">
                Confirm New Gallery
            </button>
        </form>

    </div>
</div>
@endsection