@extends("sidebar")

@section("content")
 <div class="min-h-screen bg-gradient-to-br from-gray-100 to-indigo-50 ">
    {{-- Success / Error Messages --}}
    @if(session("success"))
        <div class="max-w-3xl mx-auto mb-8 p-5 rounded-xl bg-green-600 text-white shadow-lg flex items-center gap-3 animate-fade-in">
            <i class="fa-solid fa-check-circle text-2xl animate-pulse"></i>
            <span class="font-medium">{{ session("success") }}</span>
        </div>
    @endif

    @if($errors->any())
        <div class="max-w-3xl mx-auto mb-8 p-5 rounded-xl bg-red-600 text-white shadow-lg flex flex-col gap-2 animate-fade-in">
            <div class="flex items-center gap-3">
                <i class="fa-solid fa-triangle-exclamation text-2xl animate-pulse"></i>
                <span class="font-medium">Please fix the errors below:</span>
            </div>
            <ul class="ml-8 list-disc text-sm">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form Container --}}
    <div class=" mx-auto bg-white/95 backdrop-blur-md shadow-2xl border border-gray-200 p-8 md:p-12 transition-all duration-500 hover:shadow-3xl">
        <h2 class="text-4xl font-extrabold mb-10 flex items-center text-gray-900 tracking-tight">
            <i class="fa-solid fa-plus mr-4 text-indigo-700 text-3xl animate-bounce"></i> Add New Product
        </h2>

        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf

            {{-- Title & Slug --}}
            <div class="grid md:grid-cols-2 gap-6">
                <div class="relative">
                    <label class="block text-gray-700 font-semibold mb-2">Product Title *</label>
                    <input type="text" name="title" value="{{ old('title') }}"
                        class="w-full border border-gray-300 rounded-xl p-4 bg-white text-gray-900 placeholder-gray-400 focus:ring-2 focus:ring-indigo-400 focus:border-indigo-600 shadow-sm transition duration-300"
                        placeholder="Enter product title" required>
                    @error('title')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="relative">
                    <label class="block text-gray-700 font-semibold mb-2">Slug (optional)</label>
                    <input type="text" name="slug" value="{{ old('slug') }}" placeholder="Auto-generated if empty"
                        class="w-full border border-gray-300 rounded-xl p-4 bg-white text-gray-900 placeholder-gray-400 focus:ring-2 focus:ring-indigo-400 focus:border-indigo-600 shadow-sm transition duration-300">
                    @error('slug')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>
            </div>

            {{-- Prices --}}
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Old Price</label>
                    <input type="text" name="old_price" value="{{ old('old_price') }}" required
                        class="w-full border border-gray-300 rounded-xl p-4 bg-white text-gray-900 placeholder-gray-400 focus:ring-2 focus:ring-indigo-400 focus:border-indigo-600 shadow-sm transition duration-300">
                    @error('old_price')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Current Price *</label>
                    <input type="text" name="price" value="{{ old('price') }}" required
                        class="w-full border border-gray-300 rounded-xl p-4 bg-white text-gray-900 placeholder-gray-400 focus:ring-2 focus:ring-indigo-400 focus:border-indigo-600 shadow-sm transition duration-300" required>
                    @error('price')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>
            </div>

            {{-- Category & Type --}}
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Category *</label>
                    <select name="category_id" required class="w-full border border-gray-300 rounded-xl p-4 bg-white text-gray-900 focus:ring-2 focus:ring-indigo-400 focus:border-indigo-600 shadow-sm transition duration-300">
                        <option value="">-- Select Category --</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? "selected" : "" }}>
                                {{ $category->title }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Type *</label>
                    <select name="type" class="w-full border border-gray-300 rounded-xl p-4 bg-white text-gray-900 focus:ring-2 focus:ring-indigo-400 focus:border-indigo-600 shadow-sm transition duration-300">
                        <option value="all" {{ old('type')=="all" ? "selected" : "" }}>All</option>
                        <option value="male" {{ old('type')=="male" ? "selected" : "" }}>Male</option>
                        <option value="female" {{ old('type')=="female" ? "selected" : "" }}>Female</option>
                        <option value="kids" {{ old('type')=="kids" ? "selected" : "" }}>Kids</option>
                        <option value="baby" {{ old('type')=="baby" ? "selected" : "" }}>Baby</option>
                    </select>
                    @error('type')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>
            </div>

            {{-- Images --}}
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Main Image *</label>
                    <input type="file" name="img1" accept=".jpg,.jpeg,.png,.webp"
                        class="w-full border border-gray-300 rounded-xl p-4 bg-white focus:ring-2 focus:ring-indigo-400 shadow-sm transition duration-300" required>
                    @error('img1')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Secondary Image</label>
                    <input type="file" name="img2" accept=".jpg,.jpeg,.png,.webp"
                        class="w-full border border-gray-300 rounded-xl p-4 bg-white focus:ring-2 focus:ring-indigo-400 shadow-sm transition duration-300">
                    @error('img2')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2">Gallery Images</label>
                <input type="file" name="innerimages[]" multiple accept=".jpg,.jpeg,.png,.webp"
                    class="w-full border border-gray-300 rounded-xl p-4 bg-white focus:ring-2 focus:ring-indigo-400 shadow-sm transition duration-300">
                <p class="text-sm text-gray-500 mt-1">You can upload multiple images (JPG, PNG, WEBP)</p>
                @error('innerimages.*')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            {{-- Description --}}
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Product Description *</label>
                <textarea name="description" rows="6"
                    class="w-full border border-gray-300 rounded-xl p-4 bg-white text-gray-900 placeholder-gray-400 focus:ring-2 focus:ring-indigo-400 focus:border-indigo-600 shadow-sm transition duration-300"
                    placeholder="Enter product description" required>{{ old('description') }}</textarea>
                @error('description')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-gray-800 font-semibold mb-2">Return Policy</label>
                    <textarea name="return_policy" rows="4" class="w-full border-2 rounded-xl p-4">{{ old('return_policy') }}</textarea>
                </div>
                <div>
                    <label class="block text-gray-800 font-semibold mb-2">Shipping Info</label>
                    <textarea name="shipping" rows="4" class="w-full border-2 rounded-xl p-4">{{ old('shipping') }}</textarea>
                </div>
            </div>
           <div>
                <label class="block text-gray-800 font-semibold mb-2">Product Details</label>
                <input id="Details" name="Details"
                    class="w-full border-2 rounded-xl p-4"
                    placeholder="Enter Details and press Enter" onkeydown="handleDetails(event)" />

                <div id="delailsfield" class="my-3 flex flex-wrap gap-3">
                  
                </div>
            </div>
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Add to Nav</label>
                    <select name="produty_nav_type"
                        class="w-full border border-gray-300 rounded-xl p-4 bg-white text-gray-900 focus:ring-2 focus:ring-indigo-400 shadow-sm transition duration-300">
                        <option value="jewellery">Jewellery</option>
                        <option value="engagement">Engagement</option>
                        <option value="gifting">Gifting</option>
                    </select>
                    @error('produty_nav_type')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">For</label>
                    <select name="product_for"
                        class="w-full border border-gray-300 rounded-xl p-4 bg-white text-gray-900 focus:ring-2 focus:ring-indigo-400 shadow-sm transition duration-300">
                        <option value="him">Him</option>
                        <option value="her">Her</option>
                    </select>
                    @error('product_for')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>
            </div>

            {{-- Status --}}
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Status</label>
                <select name="status"
                    class="w-full border border-gray-300 rounded-xl p-4 bg-white text-gray-900 focus:ring-2 focus:ring-indigo-400 shadow-sm transition duration-300">
                    <option value="1" {{ old('status')==1?"selected":"" }}>Active</option>
                    <option value="0" {{ old('status')==0?"selected":"" }}>Inactive</option>
                </select>
                @error('status')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>
  <div class="grid md:grid-cols-2 gap-6">
                <div class="relative">
                    <label class="block text-gray-700 font-semibold mb-2">Meta Title</label>
                    <input type="text" name="meta_title" value="{{ old('meta_title') }}"
                        class="w-full border border-gray-300 rounded-xl p-4 bg-white text-gray-900 placeholder-gray-400 focus:ring-2 focus:ring-indigo-400 focus:border-indigo-600 shadow-sm transition duration-300"
                        placeholder="Enter Meta title" required>
                    @error('meta_title')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="relative">
                    <label class="block text-gray-700 font-semibold mb-2">Meta Description</label>
                    <input type="text" name="meta_des" value="{{ old('meta_des') }}" placeholder="Meta Description"
                        class="w-full border border-gray-300 rounded-xl p-4 bg-white text-gray-900 placeholder-gray-400 focus:ring-2 focus:ring-indigo-400 focus:border-indigo-600 shadow-sm transition duration-300">
                    @error('meta_des')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>
            </div>
            <div class="flex justify-end pt-4">
                <button type="submit"
                    class="bg-gradient-to-r from-indigo-700 to-purple-700 hover:from-indigo-800 hover:to-purple-800 text-white px-10 py-4 rounded-xl shadow-lg font-semibold tracking-wide transition-all duration-300 transform hover:scale-105 hover:shadow-xl flex items-center gap-2">
                    <i class="fa-solid fa-save"></i> Save Product
                </button>
            </div>
        </form>
    </div>
</div>


{{-- ✅ CKEditor for Description --}}
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<script>

const detailsfield = document.getElementById("delailsfield");




    
  const handleDetails = (e) => {
    if (e.key === "Enter") {
      e.preventDefault();

      const value = e.target.value.trim();
      if (!value) return; // skip empty

      // Hidden input for form submission
      const newInput = document.createElement("input");
      newInput.type = "hidden";
      newInput.name = "details[]";
      newInput.value = value;

      // Wrapper div for display + delete
      const wrapper = document.createElement("div");
      wrapper.className = "flex items-center gap-2";

      // Paragraph for display
      const newParagraph = document.createElement("p");
      newParagraph.innerText = value;
      newParagraph.className = "px-2 py-1 rounded-lg bg-orange-200 text-orange-800 inline-block";

      // Delete button
      const deleteBtn = document.createElement("button");
      deleteBtn.type = "button";
      deleteBtn.innerHTML = '<i class="fa-solid fa-xmark"></i>';
      deleteBtn.className = "text-red-500 hover:text-red-700";

      // Delete functionality
      deleteBtn.onclick = () => {
        wrapper.remove();
        newInput.remove();
      };

      // Append elements
      wrapper.appendChild(newParagraph);
      wrapper.appendChild(deleteBtn);
      detailsfield.appendChild(wrapper);
      detailsfield.appendChild(newInput);

      // Clear input for next entry
      e.target.value = "";
    }
  };


    ClassicEditor.create(document.querySelector('#description'), {
        toolbar: [
            'heading', '|', 'bold', 'italic', 'underline', 'link', '|',
            'bulletedList', 'numberedList', 'blockQuote', '|',
            'insertTable', 'imageUpload', 'mediaEmbed', '|',
            'undo', 'redo'
        ],
        placeholder: 'Enter your product description...',
        image: {
            toolbar: ['imageTextAlternative', 'imageStyle:full', 'imageStyle:side']
        }
    }).catch(error => console.error(error));
</script>

{{-- ✅ Tailwind Animation Classes --}}
<style>
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in {
        animation: fadeIn 0.5s ease-out;
    }
    .shadow-3xl {
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }
</style>

















@endsection
