@extends("sidebar")

@section("title","User")

@section("content")

<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Users</h1>

    <div class="overflow-x-auto bg-white shadow-lg rounded-2xl">
        <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
            <thead class="bg-gradient-to-r from-indigo-500 to-purple-500 text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold">ID</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Name</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Email</th>
                    <!-- <th class="px-6 py-3 text-left text-sm font-semibold">Status</th> -->
                    <th class="px-6 py-3 text-left text-sm font-semibold"> <i class="fas fa-shopping-cart"></i>Cart Item</th>
  
                    <th class="px-6 py-3 text-left text-sm font-semibold">Created At</th>
                    <th class="px-6 py-3 text-center text-sm font-semibold">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($user as $u) 
                
                <tr  onclick="window.location='/users/{{ $u->id }}'"  class="hover:bg-gray-50 transition">
                    <td class="px-6 py-3">{{ $u->id }}</td>
                    <td class="px-6 py-3 font-medium text-gray-800">{{ $u->name }}</td>
                    <td class="px-6 py-3 text-gray-600">{{ $u->email }}</td>
                    
                    {{-- Toggle for status --}}
                    <!-- <td class="px-6 py-3">
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer" 
                                   @if($u->status) checked @endif>
                            <div class="w-11 h-6 bg-gray-300 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300 rounded-full peer peer-checked:bg-indigo-600 relative transition">
                                <div class="absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition peer-checked:translate-x-5"></div>
                            </div>
                        </label>
                    </td> -->


<td class="text-center">
    @if($u->carts->count() > 0)
        <span class="inline-flex items-center gap-2 bg-indigo-100 text-indigo-600 px-3 py-1 rounded-full text-sm font-medium">
            <i class="fas fa-shopping-cart"></i>
            {{ $u->carts->count() }}
        </span>
    @else
        <span class="text-gray-400 text-sm italic">No Cart</span>
    @endif
</td>




                    <td class="px-6 py-3 text-gray-500">{{ $u->created_at->format("d M Y") }}</td>

                    {{-- Action buttons with Font Awesome --}}
                    <td class="px-6 py-3 text-center space-x-3">
                      
                        <form  method="POST" class="inline">
                            @csrf
                            @method("DELETE")
                            <button type="submit" onclick="return confirm('Are you sure?')" 
                                    class="text-red-600 hover:text-red-800">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- Load Font Awesome --}}
<!-- <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> -->

@endsection
