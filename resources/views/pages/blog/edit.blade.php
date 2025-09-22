@extends("sidebar")

@section("title","Edit Blog")

@section('content')
<div class="mx-auto bg-black text-white p-10 rounded-2xl shadow-2xl mt-10 border border-yellow-500/30">
    <h1 class="text-3xl font-extrabold mb-8 text-center text-yellow-400 tracking-wide uppercase">
        ✏️ Edit Blog
    </h1>

    @if(session('success'))
        <div class="bg-green-900/40 text-green-300 border border-green-500/50 p-3 rounded mb-6 text-center">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Current Image -->
        @if($blog->image)
        <div class="mb-4 text-center">
            <img src="{{ asset('storage/'.$blog->image) }}" class="w-40 h-40 mx-auto rounded-lg shadow-lg">
        </div>
        @endif

        <!-- Image -->
        <div>
            <label class="block text-yellow-400 font-semibold mb-2">Change Image</label>
            <input type="file" name="image" class="w-full border border-yellow-500/50 rounded-lg p-3 bg-black text-white focus:ring-2 focus:ring-yellow-400">
            @error('image') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Title -->
        <div>
            <label class="block text-yellow-400 font-semibold mb-2">Title</label>
            <input type="text" name="title" value="{{ old('title', $blog->title) }}"
                   class="w-full border border-yellow-500/50 rounded-lg p-3 bg-black text-white focus:ring-2 focus:ring-yellow-400">
            @error('title') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Short Description -->
        <div>
            <label class="block text-yellow-400 font-semibold mb-2">Short Description</label>
            <input type="text" name="short_des" value="{{ old('short_des', $blog->short_des) }}"
                   class="w-full border border-yellow-500/50 rounded-lg p-3 bg-black text-white focus:ring-2 focus:ring-yellow-400">
        </div>

        <!-- Author -->
        <div>
            <label class="block text-yellow-400 font-semibold mb-2">Author</label>
            <input type="text" name="author" value="{{ old('author', $blog->author) }}"
                   class="w-full border border-yellow-500/50 rounded-lg p-3 bg-black text-white focus:ring-2 focus:ring-yellow-400">
        </div>

        <!-- Reading Time -->
        <div>
            <label class="block text-yellow-400 font-semibold mb-2">Reading Time</label>
            <input type="text" name="reading_time" value="{{ old('reading_time', $blog->reading_time) }}"
                   class="w-full border border-yellow-500/50 rounded-lg p-3 bg-black text-white focus:ring-2 focus:ring-yellow-400">
        </div>

        <!-- Description -->
        <div>
            <label class="block text-yellow-400 font-semibold mb-2">Description</label>
            <textarea name="description" rows="5"
                      class="w-full border border-yellow-500/50 rounded-lg p-3 bg-black text-white focus:ring-2 focus:ring-yellow-400">{{ old('description', $blog->description) }}</textarea>
        </div>

        <!-- Tags -->
        <div>
            <label class="block text-yellow-400 font-semibold mb-2">Tags</label>
            <div id="tagsContainer" class="flex flex-wrap mt-3">
                @if($blog->tags)
                    @foreach($blog->tags  as $tag)
                        <div class="flex items-center bg-yellow-500 text-black px-3 py-1 rounded-lg mr-2 mb-2 font-semibold">
                            <span>{{ $tag }}</span>
                            <input type="hidden" name="tags[]" value="{{ $tag }}">
                            <button type="button" class="ml-2 text-red-700 hover:text-red-900 font-bold" onclick="this.parentElement.remove()">✖</button>
                        </div>
                    @endforeach
                @endif
            </div>
            <input type="text" placeholder="Enter tags and press Enter"
                   class="w-full border border-yellow-500/50 rounded-lg p-3 bg-black text-white focus:ring-2 focus:ring-yellow-400"
                   onkeydown="handeltage(event)">
        </div>

        <!-- Category -->
        <div>
            <label class="block text-yellow-400 font-semibold mb-2">Category</label>
            <select name="category_id" class="w-full border border-yellow-500/50 rounded-lg p-3 bg-black text-white focus:ring-2 focus:ring-yellow-400">
                <option value="">-- Select Category --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $blog->category_id) == $category->id ? 'selected':'' }}>
                        {{ $category->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Submit -->
        <div class="text-center">
            <button type="submit"
                    class="bg-gradient-to-r from-yellow-500 to-yellow-300 text-black font-bold px-8 py-3 rounded-xl shadow-lg hover:scale-105 transition-transform duration-300">
                💾 Update Blog
            </button>
        </div>
    </form>
</div>

<script>
const handeltage = (e) => {
    if (e.key === "Enter" && e.target.value.trim() !== "") {
        e.preventDefault();

        const tagValue = e.target.value.trim();
        const tagDiv = document.createElement("div");
        tagDiv.classList = "flex items-center bg-yellow-500 text-black px-3 py-1 rounded-lg mr-2 mb-2 font-semibold";

        const span = document.createElement("span");
        span.innerText = tagValue;

        const hidden = document.createElement("input");
        hidden.type = "hidden";
        hidden.name = "tags[]";
        hidden.value = tagValue;

        const removeBtn = document.createElement("button");
        removeBtn.type = "button";
        removeBtn.innerText = "✖";
        removeBtn.classList = "ml-2 text-red-700 hover:text-red-900 font-bold";
        removeBtn.onclick = () => tagDiv.remove();

        tagDiv.appendChild(span);
        tagDiv.appendChild(hidden);
        tagDiv.appendChild(removeBtn);

        document.getElementById("tagsContainer").appendChild(tagDiv);

        e.target.value = "";
    }
};
</script>
@endsection
