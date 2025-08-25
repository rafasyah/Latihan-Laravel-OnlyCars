@extends('layout.main')

@section('title', 'Edit Motor - Baherindo Motor')

@section('content')
<div class="flex justify-center bg-gray-100 py-10">
    <div class="bg-white rounded-lg shadow-md p-8 w-full max-w-lg">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Data Merch</h1>

         <form action="{{ route('merchandise.update', $merchandise->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

           
            <div class="mb-5">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Nama Merch</label>
                <input value="{{ $merchandise->name }}" type="text" id="name" name="name"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                           focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
            </div>

          
            <div class="mb-5">
                <label for="date" class="block mb-2 text-sm font-medium text-gray-900">Harga</label>
                <input value="{{ $merchandise->price }}" type="number" id="price" name="price"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                           focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
            </div>

            
            <div class="mb-5">
                <label for="location" class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                <input value="{{ $merchandise->description }}" type="text" id="description" name="description"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                           focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
            </div>
  @if($merchandise->image_merch)
                <div class="mb-4">
                    <p class="text-sm text-gray-500 mb-2">Current Image:</p>
                    <img src="{{ asset('storage/' . $merchandise->image_merch) }}" 
                         alt="Merchandise Image" class="w-40 rounded shadow">
                </div>
            @endif
        <div class="mb-6">
                <label for="image_merch" class="block mb-2 text-sm font-medium text-gray-900">
                    New Image (optional)
                </label>
                <input type="file" id="image_merch" name="image_merch"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                @error('image_merch')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
         <button type="submit" 
                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none 
                       focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                Update merch
            </button>
            </div>

            {{-- Submit Button --}}
          
        </form>
    </div>
</div>
@endsection