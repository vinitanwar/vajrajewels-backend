@extends("sidebar")

@section("title","Testimonials")

@section("content")
<div class=" space-y-8 flex flex-col justify-between min-h-screen">

    <!-- Table -->
    <div class="bg-white shadow-lg rounded-lg overflow-hidden m-6">
        <h2 class="text-xl font-bold px-6 py-4 border-b flex items-center gap-2">
            <i class="fa-solid fa-list text-blue-600"></i> Testimonials List
        </h2>
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">#</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Image</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Name</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Position</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Message</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($testimonials as $index => $testimonial)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $index + 1 }}</td>
                        <td class="px-6 py-4">
                            <img src="{{ asset('storage/'.$testimonial->image) }}" alt="Image" class="w-12 h-12 rounded-full shadow">
                        </td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $testimonial->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $testimonial->position }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ Str::limit($testimonial->message, 50) }}</td>
                        <td class="px-6 py-4 flex space-x-3">
                            <!-- Delete -->
                            <form  method="POST" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="text-red-600 hover:text-red-800">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">No testimonials found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add Form -->
    <div class="  ">
    

        <form action="testimonials" method="POST" enctype="multipart/form-data" class="space-y-4 flex justify-between items-center">
            @csrf

            <!-- Name -->
            <div>
                <label class="block font-semibold mb-1">Name</label>
                <div class="flex items-center border rounded-lg p-2">
                    <i class="fa-solid fa-user text-gray-400 mr-2"></i>
                    <input type="text" name="name" class="w-full focus:outline-none" placeholder="Enter name" required>
                </div>
            </div>

            <!-- Image -->
            <div>
                <label class="block font-semibold mb-1">Image</label>
                <div class="flex items-center border rounded-lg p-2">
                    <i class="fa-solid fa-image text-gray-400 mr-2"></i>
                    <input type="file" name="image" class="w-full focus:outline-none" accept="image/*" required>
                </div>
            </div>

            <!-- Position -->
            <div>
                <label class="block font-semibold mb-1">Position</label>
                <div class="flex items-center border rounded-lg p-2">
                    <i class="fa-solid fa-briefcase text-gray-400 mr-2"></i>
                    <input type="text" name="position" class="w-full focus:outline-none" placeholder="Enter position" required>
                </div>
            </div>

            <!-- Message -->
            <div>
                <label class="block font-semibold mb-1">Message</label>
                <div class="flex items-start border rounded-lg p-2">
                    <i class="fa-solid fa-comment text-gray-400 mr-2 mt-2"></i>
                    <textarea name="message" rows="4" class="w-full focus:outline-none" placeholder="Enter message" required></textarea>
                </div>
            </div>

            <button type="submit" class="bg-green-600 text-white px-4 py-2 h-fit rounded-lg hover:bg-green-700 flex items-center gap-2">
                <i class="fa-solid fa-save"></i> Save
            </button>
        </form>
    </div>
</div>
@endsection
