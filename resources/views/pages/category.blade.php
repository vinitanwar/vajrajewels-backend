@extends("sidebar") 

@section("title","Category")

@section("content")
<div class="container mx-auto p-6 space-y-8 overflow-auto">

    {{-- Success message --}}
    @if(session("success"))
        <div class="bg-gradient-to-r from-green-400 to-green-600 text-white p-4 rounded-xl shadow-lg animate-pulse">
            ✅ {{ session("success") }}
        </div>
    @endif

    {{-- Validation errors --}}
    @if ($errors->any())
        <div class="bg-gradient-to-r from-red-400 to-red-600 text-white p-4 rounded-xl shadow-lg">
            <ul class="list-disc ml-5 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>⚠️ {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Create Category Form --}}
    <div class="backdrop-blur-lg bg-white/70 border border-gray-200 shadow-xl rounded-2xl p-8">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 flex items-center gap-2">
            <i class="fa-solid fa-layer-group text-blue-600"></i> Add New Category
        </h2>
        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <label class="block font-semibold text-gray-700 mb-2">Category Title</label>
                <input type="text" name="title" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-4 focus:ring-blue-400 shadow-sm" value="{{ old('title') }}" placeholder="Enter category name..." required>
            </div>

            <div>
                <label class="block font-semibold text-gray-700 mb-2">Upload Image</label>
                <input type="file" name="image" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-4 focus:ring-blue-400 shadow-sm bg-gray-50" required>
            </div>

            <button type="submit" class="w-full bg-gradient-to-r from-blue-500 to-blue-700 text-white font-semibold py-3 px-4 rounded-xl shadow-lg hover:scale-105 transform transition duration-200">
                <i class="fa-solid fa-save"></i> Save Category
            </button>
        </form>
    </div>

    {{-- Category List --}}
    <div class="backdrop-blur-lg bg-white/10 border border-yellow-500 shadow-2xl rounded-2xl p-8">
    <h2 class="text-3xl font-bold text-yellow-400 mb-6 flex items-center gap-3">
        <i class="fa-solid fa-list"></i> Category List
    </h2>

    @if($categories->count())
        <div class="overflow-x-auto">
            <table class="w-full border-collapse text-white">
                <thead>
                    <tr class="bg-gradient-to-r from-black/70 via-gray-900 to-black/70 text-yellow-400 text-lg uppercase tracking-wide">
                        <th class="p-4 text-left">#</th>
                        <th class="p-4 text-left">Title</th>
                        <th class="p-4 text-left">Image</th>
                        <th class="p-4 text-left">Created</th>
                        <th class="p-4 text-left">Nav</th>
                        <th class="p-4 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @foreach($categories as $index => $category)
                        <tr class="hover:bg-black/20 transition duration-300">
                            <td class="p-4 font-semibold text-yellow-300">{{ $index + 1 }}</td>
                            <td class="p-4 text-yellow-100 capitalize">{{ $category->title }}</td>
                            <td class="p-4">
                                <img src="{{ asset('storage/' . $category->image) }}" 
                                     alt="{{ $category->title }}" 
                                     class="w-16 h-16 object-cover rounded-xl border border-yellow-400 shadow-md hover:scale-110 transition duration-300">
                            </td>
                            <td class="p-4">
                                <span class="px-3 py-1 rounded-full text-sm bg-yellow-100 text-black">
                                    {{ $category->created_at->format('d M Y') }}
                                </span>
                            </td>

                            {{-- Toggle has_in_nav --}}
                            <td class="p-4">
                                <form action="/category/{{ $category->id }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" 
                                        class="px-4 py-2 rounded-full font-semibold shadow-md transition flex items-center gap-2
                                            {{ $category->has_in_nav ? 'bg-yellow-500 text-black hover:bg-yellow-600' : 'bg-gray-700 text-yellow-400 hover:bg-gray-600' }}">
                                        @if($category->has_in_nav)
                                            <i class="fa-solid fa-toggle-on text-xl"></i> On
                                        @else
                                            <i class="fa-solid fa-toggle-off text-xl"></i> Off
                                        @endif
                                    </button>
                                </form>
                            </td>

                            {{-- Actions --}}
                            <td class="p-4 flex gap-3">
                                <form action="{{ route('category.destroy', $category->id) }}" method="POST" 
                                      onsubmit="return confirm('Are you sure you want to delete this category?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg shadow-lg transition flex items-center gap-2">
                                        <i class="fa-solid fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-yellow-300 italic mt-4">🚀 No categories yet. Add one above!</p>
    @endif
</div>


</div>
@endsection
