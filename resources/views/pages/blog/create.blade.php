@extends("sidebar")

@section("title","Blogs")

@section('content')
<div class=" mx-auto bg-black text-white p-10 rounded-2xl shadow-2xl mt-10 border border-yellow-500/30">
    <h1 class="text-3xl font-extrabold mb-8 text-center text-yellow-400 tracking-wide uppercase">
        ✨ Create Blog ✨
    </h1>

    @if(session('success'))
        <div class="bg-green-900/40 text-green-300 border border-green-500/50 p-3 rounded mb-6 text-center">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- Image -->
        <div>
            <label class="block text-yellow-400 font-semibold mb-2">Image</label>
            <input type="file" name="image" 
                   class="w-full border border-yellow-500/50 rounded-lg p-3 bg-black text-white focus:ring-2 focus:ring-yellow-400">
            @error('image') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Title -->
        <div>
            <label class="block text-yellow-400 font-semibold mb-2">Title</label>
            <input type="text" name="title" value="{{ old('title') }}"
                   class="w-full border border-yellow-500/50 rounded-lg p-3 bg-black text-white focus:ring-2 focus:ring-yellow-400">
            @error('title') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Short Description -->
        <div>
            <label class="block text-yellow-400 font-semibold mb-2">Short Description</label>
            <input type="text" name="short_des" value="{{ old('short_des') }}"
                   class="w-full border border-yellow-500/50 rounded-lg p-3 bg-black text-white focus:ring-2 focus:ring-yellow-400">
            @error('short_des') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Author -->
        <div>
            <label class="block text-yellow-400 font-semibold mb-2">Author</label>
            <input type="text" name="author" value="{{ old('author') }}"
                   class="w-full border border-yellow-500/50 rounded-lg p-3 bg-black text-white focus:ring-2 focus:ring-yellow-400">
            @error('author') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Reading Time -->
        <div>
            <label class="block text-yellow-400 font-semibold mb-2">Reading Time</label>
            <input type="text" name="reading_time" value="{{ old('reading_time') }}" placeholder="e.g. 5 min"
                   class="w-full border border-yellow-500/50 rounded-lg p-3 bg-black text-white focus:ring-2 focus:ring-yellow-400">
            @error('reading_time') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Description -->
        <div>
            <label class="block text-yellow-400 font-semibold mb-2">Description</label>
            <textarea name="description" rows="5"
                      class="w-full border border-yellow-500/50 rounded-lg p-3 bg-black text-white focus:ring-2 focus:ring-yellow-400">{{ old('description') }}</textarea>
            @error('description') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Tags -->
        <div>
    <label class="block text-yellow-400 font-semibold mb-2">Tags (press Enter)</label>
    <input type="text" placeholder="Enter tags and press Enter"
           class="w-full border border-yellow-500/50 rounded-lg p-3 bg-black text-white focus:ring-2 focus:ring-yellow-400"
           onkeydown="handeltage(event)">
    <div id="tagsContainer" class="flex flex-wrap mt-3"></div>
    @error('tags') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
</div>

        <!-- Category -->
        <div>
            <label class="block text-yellow-400 font-semibold mb-2">Category</label>
            <select name="category_id"
                    class="w-full border border-yellow-500/50 rounded-lg p-3 bg-black text-white focus:ring-2 focus:ring-yellow-400">
                <option value="">-- Select Category --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id')==$category->id ? 'selected':'' }}>
                        {{ $category->title }}
                    </option>
                @endforeach
            </select>
            @error('category_id') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Submit -->
        <div class="text-center">
            <button type="submit"
                    class="bg-gradient-to-r from-yellow-500 to-yellow-300 text-black font-bold px-8 py-3 rounded-xl shadow-lg hover:scale-105 transition-transform duration-300">
                🚀 Create Blog
            </button>
        </div>
    </form>
</div>

<script>
const handeltage = (e) => {
    if (e.key === "Enter" && e.target.value.trim() !== "") {
        e.preventDefault();

        const tagValue = e.target.value.trim();

        // Create wrapper div for tag + hidden input
        const tagDiv = document.createElement("div");
        tagDiv.classList = "flex items-center bg-yellow-500 text-black px-3 py-1 rounded-lg mr-2 mb-2 font-semibold";

        // Tag text
        const ptag = document.createElement("span");
        ptag.innerText = tagValue;

        // Hidden input to submit value
        const inputTag = document.createElement("input");
        inputTag.type = "hidden";
        inputTag.name = "tags[]";
        inputTag.value = tagValue;

        // Remove button
        const removeBtn = document.createElement("button");
        removeBtn.type = "button";
        removeBtn.innerText = "✖";
        removeBtn.classList = "ml-2 text-red-700 hover:text-red-900 font-bold";
        removeBtn.onclick = () => tagDiv.remove();

        // Append children
        tagDiv.appendChild(ptag);
        tagDiv.appendChild(inputTag);
        tagDiv.appendChild(removeBtn);

        document.getElementById("tagsContainer").appendChild(tagDiv);

        e.target.value = ""; // clear input
    }
};
</script>
@endsection
