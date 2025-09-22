@extends("sidebar")


@section("title","Banners")



@section("content")
<div class="grid grid-cols-1 md:grid-cols-2  gap-5" >
<form action="/banners" class="space-y-6   bg-white shadow-lg rounded-2xl p-6" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- File Upload -->
    <div class="flex flex-col items-center">
        <label for="inputfile" 
            class="flex flex-col items-center justify-center w-full h-40 border-2 border-dashed border-gray-300 rounded-xl cursor-pointer hover:border-indigo-500 hover:bg-indigo-50 transition duration-300">
            
            <i class="fa-solid fa-images text-4xl text-indigo-500 mb-2"></i>
            <span class="text-gray-600 font-medium">Upload Banner</span>
            <span class="text-xs text-gray-400 mt-1">(jpg, png, webp)</span>
        </label>
        <input type="file" accept=".jpg,.png,.webp" name="banner" id="inputfile" class="hidden" required>
    </div>

    <!-- Count Input -->
    <div>
        <input type="number" name="count" placeholder="Count" required
            class="w-full p-3 rounded-xl border-2 border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-300 outline-none transition duration-300 shadow-sm">
    </div>

    <!-- Submit Button -->
    <button type="submit"
        class="w-full bg-indigo-500 text-white font-semibold py-3 rounded-xl hover:bg-indigo-600 transition duration-300 shadow-md">
        Submit
    </button>
</form>




@foreach ($banners as  $banner)
<div class="bg-white shadow-md rounded-xl overflow-hidden flex flex-col justify-between">
    
            <img src="{{ asset('storage/' . $banner->banner) }}" 
                 alt="Banner {{ $banner->id }}" 
                 class="w-full h-48 object-cover">

            <div class="p-4 flex justify-between">
                <p class="text-gray-700 font-semibold">Count: {{ $banner->count }}</p>
                <form action="/banners/{{ $banner->id }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this banner?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="text-red-700 hover:text-red-900">
        <i class="fa-solid fa-trash text-xl cursor-pointer"></i>
    </button>
</form>
            </div>
        </div>
@endforeach



</div>

@endsection