@extends("sidebar")

@section("title","Settings")

@section("content")
<div class="w-full bg-black min-h-screen font-sans p-6">
    <div class="max-w-3xl mx-auto bg-gray-900 rounded-xl shadow-lg p-8 border border-yellow-500">
        <h2 class="text-3xl font-bold text-yellow-400 mb-6 flex items-center gap-3">
            <i class="fas fa-cogs text-yellow-400"></i> Website Settings
        </h2>

        <form action="/settings/update" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
           
            <input type="text" name="id" value="{{ $layout->id }}" class="hidden">

            <!-- Phone Number --> 
            <div>
                <label for="number" class="block text-sm font-medium text-yellow-400">Phone Number</label>
                <input type="text" name="number" id="number" 
                       value="{{ old('number', $layout->number) }}"
                       class="mt-2 block w-full rounded-lg border-gray-700 bg-black text-white shadow-sm focus:ring-yellow-400 focus:border-yellow-400 sm:text-sm p-3">
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-yellow-400">Email</label>
                <input type="email" name="email" id="email" 
                       value="{{ old('email', $layout->email) }}"
                       class="mt-2 block w-full rounded-lg border-gray-700 bg-black text-white shadow-sm focus:ring-yellow-400 focus:border-yellow-400 sm:text-sm p-3">
            </div>

            <!-- Address -->
            <div>
                <label for="address" class="block text-sm font-medium text-yellow-400">Address</label>
                <textarea name="address" id="address" rows="3"
                          class="mt-2 block w-full rounded-lg border-gray-700 bg-black text-white shadow-sm focus:ring-yellow-400 focus:border-yellow-400 sm:text-sm p-3">{{ old('address', $layout->address) }}</textarea>
            </div>

            <!-- Social Links -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="yt_link" class="block text-sm font-medium text-yellow-400">YouTube Link</label>
                    <input type="url" name="yt_link" id="yt_link"
                           value="{{ old('yt_link', $layout->yt_link) }}"
                           class="mt-2 block w-full rounded-lg border-gray-700 bg-black text-white shadow-sm focus:ring-yellow-400 focus:border-yellow-400 sm:text-sm p-3">
                </div>
                <div>
                    <label for="fb_link" class="block text-sm font-medium text-yellow-400">Facebook Link</label>
                    <input type="url" name="fb_link" id="fb_link"
                           value="{{ old('fb_link', $layout->fb_link) }}"
                           class="mt-2 block w-full rounded-lg border-gray-700 bg-black text-white shadow-sm focus:ring-yellow-400 focus:border-yellow-400 sm:text-sm p-3">
                </div>
                <div>
                    <label for="insta_link" class="block text-sm font-medium text-yellow-400">Instagram Link</label>
                    <input type="url" name="insta_link" id="insta_link"
                           value="{{ old('insta_link', $layout->insta_link) }}"
                           class="mt-2 block w-full rounded-lg border-gray-700 bg-black text-white shadow-sm focus:ring-yellow-400 focus:border-yellow-400 sm:text-sm p-3">
                </div>
                <div>
                    <label for="x_link" class="block text-sm font-medium text-yellow-400">X (Twitter) Link</label>
                    <input type="url" name="x_link" id="x_link"
                           value="{{ old('x_link', $layout->x_link) }}"
                           class="mt-2 block w-full rounded-lg border-gray-700 bg-black text-white shadow-sm focus:ring-yellow-400 focus:border-yellow-400 sm:text-sm p-3">
                </div>
                <div>
                    <label for="linkedin_link" class="block text-sm font-medium text-yellow-400">LinkedIn Link</label>
                    <input type="url" name="linkedin_link" id="linkedin_link"
                           value="{{ old('linkedin_link', $layout->linkedin_link) }}"
                           class="mt-2 block w-full rounded-lg border-gray-700 bg-black text-white shadow-sm focus:ring-yellow-400 focus:border-yellow-400 sm:text-sm p-3">
                </div>
                <div>
                    <label for="thread_link" class="block text-sm font-medium text-yellow-400">Threads Link</label>
                    <input type="url" name="thread_link" id="thread_link"
                           value="{{ old('thread_link', $layout->thread_link) }}"
                           class="mt-2 block w-full rounded-lg border-gray-700 bg-black text-white shadow-sm focus:ring-yellow-400 focus:border-yellow-400 sm:text-sm p-3">
                </div>
            </div>

            <!-- Logo Upload -->
            <div>
                <label for="logo" class="block text-sm font-medium text-yellow-400">Website Logo</label>
                <input type="file" name="logo" id="logo"
                       class="mt-2 block w-full text-sm text-white file:mr-4 file:py-2 file:px-4
                              file:rounded-full file:border-0
                              file:text-sm file:font-semibold
                              file:bg-yellow-400 file:text-black
                              hover:file:bg-yellow-500">

                @if($layout->logo)
                    <div class="mt-4">
                        <img src="{{ asset('storage/' . $layout->logo) }}" 
                             alt="Logo" 
                             class="h-20 rounded-lg shadow-md border border-yellow-500">
                    </div>
                @endif
            </div>

            <!-- Submit -->
            <div class="pt-4">
                <button type="submit" 
                        class="w-full bg-yellow-400 text-black py-3 px-6 rounded-lg font-semibold hover:bg-yellow-500 shadow-md transition">
                    <i class="fas fa-save mr-2"></i> Save Changes
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
