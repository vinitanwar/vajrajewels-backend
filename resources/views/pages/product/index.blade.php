@extends("sidebar")

@section("title","Product")
@section("content")
<div class="flex justify-between m-5">
<p class="text-xl  font-bold">Product</p>
<a href="/product/create" class="px-4 py-1 bg-yellow-500 text-white font-bold text-xl rounded-2xl font-mono">Create</a>
</div>


  <div class="overflow-x-auto bg-white ring-1 ring-gray-100 rounded-lg">
    <table class="min-w-full divide-y divide-gray-200">
      <thead class="bg-gray-50">
        <tr>
          <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Sr no.</th>
          <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Title</th>
          <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Image</th>
          <th class="px-4 py-3 text-right text-sm font-medium text-gray-600">Price</th>
          <th class="px-4 py-3 text-right text-sm font-medium text-gray-600">Old Price</th>
          <th class="px-4 py-3 text-center text-sm font-medium text-gray-600">Type</th>
          <th class="px-4 py-3 text-center text-sm font-medium text-gray-600">Total Orders</th>
          <th class="px-4 py-3 text-center text-sm font-medium text-gray-600">Actions</th>
        </tr>
      </thead>

      <tbody class="bg-white divide-y divide-gray-100">
        @forelse($products as $index => $product)
          <tr class="hover:bg-gray-50">
            <td class="px-4 py-3 text-sm text-gray-700">{{ $index + 1 }}</td>

            <td class="px-4 py-3">
              <div class="flex items-start gap-3">
                <div>
                  <div class="font-semibold text-gray-800">{{ Str::limit($product->title, 60) }}</div>
                  <div class="text-xs text-gray-500 mt-1">
                    <span class="mr-2"><i class="fa fa-hashtag"></i> {{ $product->id }}</span>
                    <span class="text-xs">· {{ $product->slug ?? '-' }}</span>
                  </div>
                </div>
              </div>
            </td>

            <td class="px-4 py-3">
              <div class="flex items-center gap-3">
                @php
                  // adjust path depending on how you store images (storage, public, or full url)
                  $img = $product->img1 ? asset($product->img1) : 'https://via.placeholder.com/80x80?text=No+Image';
                @endphp
                <img src="{{ asset('storage/' . $product->img1) }}"  alt="{{ $product->title }}" class="w-20 h-20 object-cover rounded-md border" />
                <div class="text-xs text-gray-500">
                  <div>{{ $product->innerimages ? (is_array($product->innerimages) ? count($product->innerimages) : 'More') : '' }}</div>
                  <div class="mt-1 text-xxs text-gray-400">{{ $product->created_at ? $product->created_at->format('d M, Y') : '' }}</div>
                </div>
              </div>
            </td>

            <td class="px-4 py-3 text-right">
              <div class="text-sm font-medium text-gray-800">₹{{ number_format($product->price, 2) }}</div>
            </td>

            <td class="px-4 py-3 text-right">
              @if($product->old_price && $product->old_price > $product->price)
                <div class="text-sm text-gray-500 line-through">₹{{ number_format($product->old_price, 2) }}</div>
                <div class="text-xs text-green-600 mt-1">Saved ₹{{ number_format($product->old_price - $product->price, 2) }}</div>
              @else
                <div class="text-sm text-gray-400">—</div>
              @endif
            </td>

            <td class="px-4 py-3 text-center">
              <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold
                {{ $product->type === 'physical' ? 'bg-blue-100 text-blue-800' : ($product->type === 'digital' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800') }}">
                <i class="fa fa-box mr-2"></i> {{ ucfirst($product->type ?? 'N/A') }}
              </span>
            </td>

            <td class="px-4 py-3 text-center text-sm text-gray-700">{{ $product->total_sale_count ?? 0 }}</td>

            <td class="px-4 py-3 text-center">
              <div class="inline-flex items-center gap-2">
                <a href="{{ route('product.edit', $product->id) }}" class="px-3 py-1 rounded-md bg-yellow-50 text-yellow-800 hover:bg-yellow-100 border">
                  <i class="fa fa-pen-to-square"></i>
                </a>

               

                <form action="{{ route('product.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Delete product #{{ $product->id }}?');" class="inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" title="Delete" class="px-3 py-1 rounded-md bg-red-50 text-red-700 hover:bg-red-100 border">
                    <i class="fa fa-trash"></i>
                  </button>
                </form>
              </div>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="8" class="px-4 py-6 text-center text-gray-500">No products found.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <!-- Pagination (if using) -->
  <div class="mt-4">
    {{ $products->links() }}
  </div>
</div>





@endsection