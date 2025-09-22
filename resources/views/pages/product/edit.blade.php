@extends("sidebar")

@section("content")
<div class="min-h-screen bg-gradient-to-br from-gray-100 to-indigo-100">

    {{-- ✅ Success Message --}}
    @if(session("success"))
        <div class="bg-gradient-to-r from-green-600 to-emerald-700 text-white p-5 rounded-xl mb-8 shadow-lg flex items-center transform transition-all duration-300 hover:shadow-xl">
            <i class="fa-solid fa-check-circle mr-3 text-2xl animate-pulse"></i>
            <span class="font-medium">{{ session("success") }}</span>
        </div>
    @endif

    {{-- ✅ Validation Errors --}}
    @if($errors->any())
        <div class="bg-gradient-to-r from-red-600 to-pink-700 text-white p-5 rounded-xl mb-8 shadow-lg flex items-center transform transition-all duration-300 hover:shadow-xl">
            <i class="fa-solid fa-triangle-exclamation mr-3 text-2xl animate-pulse"></i>
            <span class="font-medium">Please fix the errors below:</span>
            <ul class="ml-4 list-disc">
                @foreach($errors->all() as $error)
                    <li class="text-sm">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- ✅ Edit Product Form --}}
    <div class="bg-white/95 backdrop-blur-xl shadow-2xl rounded-2xl p-8 md:p-12 border border-gray-200 transition-all duration-500 hover:shadow-3xl">
        <h2 class="text-4xl font-extrabold mb-10 flex items-center text-gray-900 tracking-tight">
            <i class="fa-solid fa-pen-to-square mr-4 text-indigo-700 text-3xl"></i> Edit Product
        </h2>

        <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-10">
            @csrf
            @method("PUT")

            {{-- Title & Slug --}}
            <div class="grid md:grid-cols-2 gap-6">
                <div class="relative">
                    <label class="block text-gray-800 font-semibold mb-2">Product Title</label>
                    <input type="text" name="title" value="{{ old('title', $product->title) }}"
                        class="w-full rounded-xl border-2 border-gray-400 p-4 bg-white text-gray-900 focus:ring-4 focus:ring-indigo-400 transition-all duration-300 shadow-md hover:shadow-lg">
                </div>
                <div class="relative">
                    <label class="block text-gray-800 font-semibold mb-2">Slug</label>
                    <input type="text" name="slug" value="{{ old('slug', $product->slug) }}"
                        class="w-full rounded-xl border-2 border-gray-400 p-4 bg-white text-gray-900 focus:ring-4 focus:ring-indigo-400 transition-all duration-300 shadow-md hover:shadow-lg">
                </div>
            </div>

            {{-- Prices --}}
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-gray-800 font-semibold mb-2">Old Price</label>
                    <input type="text" name="old_price" value="{{ old('old_price', $product->old_price) }}"
                        class="w-full rounded-xl border-2 border-gray-400 p-4 bg-white text-gray-900 focus:ring-4 focus:ring-indigo-400">
                </div>
                <div>
                    <label class="block text-gray-800 font-semibold mb-2">Current Price</label>
                    <input type="text" name="price" value="{{ old('price', $product->price) }}"
                        class="w-full rounded-xl border-2 border-gray-400 p-4 bg-white text-gray-900 focus:ring-4 focus:ring-indigo-400">
                </div>
            </div>

            {{-- Category & Type --}}
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-gray-800 font-semibold mb-2">Category</label>
                    <select name="category_id" class="w-full rounded-xl border-2 border-gray-400 p-4">
                        <option value="">-- Select Category --</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? "selected" : "" }}>
                                {{ $category->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-gray-800 font-semibold mb-2">Type</label>
                    <select name="type" class="w-full rounded-xl border-2 border-gray-400 p-4">
                        <option value="all" {{ old('type', $product->type) == "all" ? "selected" : "" }}>All</option>
                        <option value="male" {{ old('type', $product->type) == "male" ? "selected" : "" }}>Male</option>
                        <option value="female" {{ old('type', $product->type) == "female" ? "selected" : "" }}>Female</option>
                        <option value="kids" {{ old('type', $product->type) == "kids" ? "selected" : "" }}>Kids</option>
                        <option value="baby" {{ old('type', $product->type) == "baby" ? "selected" : "" }}>Baby</option>
                    </select>
                </div>
            </div>

            {{-- Images --}}
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-gray-800 font-semibold mb-2">Main Image</label>
                    <input type="file" name="img1" class="w-full border-2 rounded-xl p-4">
                    @if($product->img1)
                        <img src="{{ asset('storage/'.$product->img1) }}" class="mt-2 w-32 rounded shadow">
                    @endif
                </div>
                <div>
                    <label class="block text-gray-800 font-semibold mb-2">Secondary Image</label>
                    <input type="file" name="img2" class="w-full border-2 rounded-xl p-4">
                    @if($product->img2)
                        <img src="{{ asset('storage/'.$product->img2) }}" class="mt-2 w-32 rounded shadow">
                    @endif
                </div>
            </div>

            {{-- Inner Images --}}
            <div>
                <label class="block text-gray-800 font-semibold mb-2">Gallery Images</label>
                <input type="file" name="innerimages[]" multiple class="w-full border-2 rounded-xl p-4">
                @if($product->innerimages)
                    <div class="flex gap-2 mt-2 flex-wrap">
                        @foreach($product->innerimages?? [] as $img)
                            <img src="{{ asset('storage/'.$img) }}" class="w-20 h-20 object-cover rounded border">
                        @endforeach
                    </div>
                @endif
            </div>

            {{-- Description --}}
            <div>
                <label class="block text-gray-800 font-semibold mb-2">Product Description</label>
                <textarea id="description" name="description" rows="6"
                    class="w-full border-2 rounded-xl p-4">{{ old('description', $product->description) }}</textarea>
            </div>

            {{-- Return Policy & Shipping --}}
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-gray-800 font-semibold mb-2">Return Policy</label>
                    <textarea name="return_policy" rows="4" class="w-full border-2 rounded-xl p-4">{{ old('return_policy', $product->return_policy) }}</textarea>
                </div>
                <div>
                    <label class="block text-gray-800 font-semibold mb-2">Shipping Info</label>
                    <textarea name="shipping" rows="4" class="w-full border-2 rounded-xl p-4">{{ old('shipping', $product->shipping) }}</textarea>
                </div>
            </div>

            {{-- Details --}}
            <div>
                <label class="block text-gray-800 font-semibold mb-2">Product Details</label>
                <input id="Details" name="Details"
                    class="w-full border-2 rounded-xl p-4"
                    placeholder="Enter Details and press Enter" onkeydown="handleDetails(event)" />

                <div id="delailsfield" class="my-3 flex flex-wrap gap-3">
                    @if($product->details)
                        @foreach($product->details ?? [] as $detail)
                            <div class="flex items-center gap-2">
                                <p class="px-2 py-1 rounded-lg bg-orange-200 text-orange-800">{{ $detail }}</p>
                                <button type="button" class="text-red-500 hover:text-red-700" onclick="this.parentElement.remove()"> 
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                                <input type="hidden" name="details[]" value="{{ $detail }}">
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

           <div class="grid md:grid-cols-2 gap-6">
    {{-- Add to Nav --}}
    <div class="relative">
        <label class="block text-gray-800 font-semibold mb-2">Add to Nav</label>
        <select name="produty_nav_type"
            class="w-full border border-gray-300 rounded-xl p-4 bg-white text-gray-900 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-indigo-600 transition duration-300">
            <option value="jewellery" {{ old('produty_nav_type', $product->produty_nav_type) == "jewellery" ? "selected" : "" }}>Jewellery</option>
            <option value="engagement" {{ old('produty_nav_type', $product->produty_nav_type) == "engagement" ? "selected" : "" }}>Engagement</option>
            <option value="gifting" {{ old('produty_nav_type', $product->produty_nav_type) == "gifting" ? "selected" : "" }}>Gifting</option>
        </select>
        @error('produty_nav_type')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Product For --}}
    <div class="relative">
        <label class="block text-gray-800 font-semibold mb-2">For</label>
        <select name="product_for"
            class="w-full border border-gray-300 rounded-xl p-4 bg-white text-gray-900 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-indigo-600 transition duration-300">
            <option value="him" {{ old('product_for', $product->product_for) == "him" ? "selected" : "" }}>Him</option>
            <option value="her" {{ old('product_for', $product->product_for) == "her" ? "selected" : "" }}>Her</option>
        </select>
        @error('product_for')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>


            {{-- Status --}}
            <div>
                <label class="block text-gray-800 font-semibold mb-2">Status</label>
                <select name="status" class="w-full border-2 rounded-xl p-4">
                    <option value="1" {{ old('status', $product->status) == 1 ? "selected" : "" }}>Active</option>
                    <option value="0" {{ old('status', $product->status) == 0 ? "selected" : "" }}>Inactive</option>
                </select>
            </div>


              <div class="grid md:grid-cols-2 gap-6">
                <div class="relative">
                    <label class="block text-gray-700 font-semibold mb-2">Meta Title</label>
                    <input type="text" name="meta_title" value="{{ old('meta_title', $product->meta_title) }}"
                        class="w-full border border-gray-300 rounded-xl p-4 bg-white text-gray-900 placeholder-gray-400 focus:ring-2 focus:ring-indigo-400 focus:border-indigo-600 shadow-sm transition duration-300"
                        placeholder="Enter Meta title" required>
                    @error('meta_title')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="relative">
                    <label class="block text-gray-700 font-semibold mb-2">Meta Description</label>
                    <input type="text" name="meta_des" value="{{ old('meta_des', $product->meta_des) }}" placeholder="Meta Description"
                        class="w-full border border-gray-300 rounded-xl p-4 bg-white text-gray-900 placeholder-gray-400 focus:ring-2 focus:ring-indigo-400 focus:border-indigo-600 shadow-sm transition duration-300">
                    @error('meta_des')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>
            </div>

            {{-- Submit --}}
            <div class="pt-6 flex justify-end">
                <button type="submit"
                    class="bg-gradient-to-r from-indigo-700 to-purple-700 hover:from-indigo-800 hover:to-purple-800 text-white px-10 py-4 rounded-xl shadow-lg font-semibold tracking-wide transition-all duration-300">
                    <i class="fa-solid fa-save mr-2"></i> Update Product
                </button>
            </div>
        </form>
    </div>
</div>

{{-- ✅ CKEditor --}}
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<script>
  // Same handleDetails as your add form
  const detailsfield = document.getElementById("delailsfield");
  const handleDetails = (e) => {
    if (e.key === "Enter") {
      e.preventDefault();
      const value = e.target.value.trim();
      if (!value) return;
      const newInput = document.createElement("input");
      newInput.type = "hidden";
      newInput.name = "details[]";
      newInput.value = value;
      const wrapper = document.createElement("div");
      wrapper.className = "flex items-center gap-2";
      const newParagraph = document.createElement("p");
      newParagraph.innerText = value;
      newParagraph.className = "px-2 py-1 rounded-lg bg-orange-200 text-orange-800";
      const deleteBtn = document.createElement("button");
      deleteBtn.type = "button";
      deleteBtn.innerHTML = '<i class="fa-solid fa-xmark"></i>';
      deleteBtn.className = "text-red-500 hover:text-red-700";
      deleteBtn.onclick = () => { wrapper.remove(); newInput.remove(); };
      wrapper.appendChild(newParagraph);
      wrapper.appendChild(deleteBtn);
      detailsfield.appendChild(wrapper);
      detailsfield.appendChild(newInput);
      e.target.value = "";
    }
  };

  ClassicEditor.create(document.querySelector('#description'))
    .catch(error => console.error(error));
</script>
@endsection
