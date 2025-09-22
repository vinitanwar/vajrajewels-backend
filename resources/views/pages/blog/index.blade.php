@extends("sidebar")

@section("title","Blogs")

@section("content")

<div class="flex justify-between items-center mb-6">
    <p class="font-bold text-2xl text-yellow-500">Blogs</p>
    <a href="{{ route('blogs.create') }}" class="bg-yellow-600 text-white font-semibold px-4 py-2 rounded-xl hover:bg-yellow-700 transition">
        ➕ Create
    </a>
</div>

@if(session('success'))
    <div class="bg-green-900/40 text-green-300 border border-green-500/50 p-3 rounded mb-6">
        {{ session('success') }}
    </div>
@endif

<div class="overflow-x-auto">
    <table class="min-w-full border border-yellow-500/30 rounded-lg shadow-lg overflow-hidden">
        <thead class="bg-yellow-600 text-white">
            <tr>
                <th class="px-4 py-3 text-left">#</th>
                <th class="px-4 py-3 text-left">Image</th>
                <th class="px-4 py-3 text-left">Title</th>
                <th class="px-4 py-3 text-left">Author</th>
                <th class="px-4 py-3 text-left">Category</th>
                <th class="px-4 py-3 text-left">Reading Time</th>
                <th class="px-4 py-3 text-left">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-black text-white divide-y divide-yellow-500/20">
            @forelse($blogs as $index => $blog)
                <tr>
                    <td class="px-4 py-3">{{ $index+1 }}</td>
                    <td class="px-4 py-3">
                        @if($blog->image)
                            <img src="{{ asset('storage/'.$blog->image) }}" class="w-14 h-14 rounded-lg object-cover border border-yellow-500/40">
                        @else
                            <span class="text-gray-400">No Image</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 font-semibold">{{ $blog->title }}</td>
                    <td class="px-4 py-3">{{ $blog->author }}</td>
                    <td class="px-4 py-3">{{ optional($blog->category)->title }}</td>
                    <td class="px-4 py-3">{{ $blog->reading_time }}</td>
                    <td class="px-4 py-3 flex space-x-2">
                        <a href="{{ route('blogs.edit',$blog->id) }}" 
                           class="bg-blue-600 text-white px-3 py-1 rounded-lg hover:bg-blue-700 transition">
                           ✏️ Edit
                        </a>

                        <form action="{{ route('blogs.destroy',$blog->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this blog?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="bg-red-600 text-white px-3 py-1 rounded-lg hover:bg-red-700 transition">
                                🗑 Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center py-6 text-gray-400">No blogs found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
