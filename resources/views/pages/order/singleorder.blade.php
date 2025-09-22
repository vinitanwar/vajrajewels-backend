<div>
    <!-- Smile, breathe, and go slowly. - Thich Nhat Hanh -->
</div>
@extends("sidebar")


@section("title","Orders")


@section("content")



<div class="w-full p-4">

    <!-- Title -->
    <h2 class="text-2xl font-bold mb-6 flex items-center gap-2">
        <i class="fas fa-file-invoice text-green-600"></i> Order #{{ $orderItem->order->id }}
    </h2>

    <!-- Order Summary -->
    <div class="bg-white shadow rounded-lg p-5 mb-6">
        <h3 class="text-lg font-semibold mb-4 flex items-center gap-2">
            <i class="fas fa-clipboard-list text-blue-600"></i> Order Summary
        </h3>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 text-sm">
            <p><strong>User:</strong> {{ $orderItem->order->user->name }} ({{ $orderItem->order->user->email }})</p>
            <p><strong>Total Amount:</strong> ₹{{ number_format($orderItem->order->total_amount, 2) }}</p>
            <p><strong>Discount:</strong> ₹{{ number_format($orderItem->order->discount, 2) }}</p>
            <p><strong>Final Amount:</strong> <span class="text-green-600 font-semibold">₹{{ number_format($orderItem->order->final_amount, 2) }}</span></p>
            <p><strong>Payment:</strong> {{ strtoupper($orderItem->order->payment_method) }}</p>
            <p><strong>Tracking No:</strong> {{ $orderItem->order->tracking_number ?? 'Not Assigned' }}</p>
        </div>
        <div class="mt-3 flex gap-4">
            <span class="px-3 py-1 text-xs font-semibold rounded 
                {{ $orderItem->order->payment_status == 'pending' ? 'bg-yellow-100 text-yellow-700' : 'bg-green-100 text-green-700' }}">
                <i class="fas fa-credit-card"></i> {{ ucfirst($orderItem->order->payment_status) }}
            </span>
            <span class="px-3 py-1 text-xs font-semibold rounded 
                {{ $orderItem->order->status == 'pending' ? 'bg-blue-100 text-blue-700' : 'bg-green-100 text-green-700' }}">
                <i class="fas fa-info-circle"></i> {{ ucfirst($orderItem->order->status) }}
            </span>
        </div>
    </div>

    <!-- Product Details -->
    <div class="bg-white shadow rounded-lg p-5 mb-6">
        <h3 class="text-lg font-semibold mb-4 flex items-center gap-2">
            <i class="fas fa-gem text-pink-600"></i> Product Details
        </h3>
        <div class="flex flex-col md:flex-row gap-6">
            <!-- Product Image -->
            <div class="w-full md:w-[10rem]">
<img src="{{ url('storage/' . $orderItem->product->img1) }}" 
                     alt="{{ $orderItem->product->title }}" 
                     class="rounded-lg shadow-md w-full">
            </div>
            <!-- Product Info -->
            <div class="flex-1 text-sm space-y-2">
                <h4 class="text-lg font-bold">{{ $orderItem->product->title }}</h4>
                <p class="text-gray-600">{!! $orderItem->product->description !!}</p>
                <p><strong>Quantity:</strong> {{ $orderItem->quantity }}</p>
                <p><strong>Price:</strong> ₹{{ number_format($orderItem->price, 2) }}</p>
                <p><strong>Total:</strong> <span class="text-green-600 font-semibold">₹{{ number_format($orderItem->total, 2) }}</span></p>
                <div class="mt-2">
                    <a href="#" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-xs rounded shadow">
                        <i class="fas fa-undo"></i> Return Policy
                    </a>
                    <a href="#" class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white text-xs rounded shadow ml-2">
                        <i class="fas fa-truck"></i> Shipping Info
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Shipping Address -->
    <div class="bg-white shadow rounded-lg p-5 mb-6">
        <h3 class="text-lg font-semibold mb-4 flex items-center gap-2">
            <i class="fas fa-map-marker-alt text-red-600"></i> Shipping Address
        </h3>
        <div class="text-sm space-y-1">
            <p><strong>Name:</strong> {{ $orderItem->order->address->first_name }} {{ $orderItem->order->address->last_name }}</p>
            <p><strong>Email:</strong> {{ $orderItem->order->address->email }}</p>
            <p><strong>Phone:</strong> {{ $orderItem->order->address->phone }}</p>
            <p><strong>Address:</strong> {{ $orderItem->order->address->house_no }}, {{ $orderItem->order->address->address }}, {{ $orderItem->order->address->city }}, {{ $orderItem->order->address->state }} - {{ $orderItem->order->address->postcode }}</p>
            <p><strong>Country:</strong> {{ $orderItem->order->address->country }}</p>
            <p><strong>Landmark:</strong> {{ $orderItem->order->address->landmark ?? 'N/A' }}</p>
            <p><strong>Order Notes:</strong> {{ $orderItem->order->address->order_notes ?? 'None' }}</p>
        </div>
    </div>

    <!-- Customer Info -->
    <div class="bg-white shadow rounded-lg p-5">
        <h3 class="text-lg font-semibold mb-4 flex items-center gap-2">
            <i class="fas fa-user text-purple-600"></i> Customer Information
        </h3>
        <p><strong>Name:</strong> {{ $orderItem->order->user->name }}</p>
        <p><strong>Email:</strong> {{ $orderItem->order->user->email }}</p>
        <p><strong>Status:</strong> {{ $orderItem->order->user->status == 0 ? 'Inactive' : 'Active' }}</p>
        <p><strong>Joined:</strong> {{ $orderItem->order->user->created_at->format('d M Y') }}</p>
    </div>


<button 
  onclick="document.getElementById('orderModal').classList.remove('hidden')" 
  class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg shadow-md justify-self-end m-5"
>
  Update Order
</button>

 <div id="orderModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
  <div class="bg-white p-6 rounded-2xl shadow-lg w-full max-w-3xl relative">
    
    <!-- Close Button -->
    <button 
      onclick="document.getElementById('orderModal').classList.add('hidden')" 
      class="absolute top-3 right-3 text-gray-500 hover:text-gray-700 text-xl"
    >
      &times;
    </button>

    <h2 class="text-lg font-semibold mb-4 text-gray-700">Update Order Details</h2>

    <div class="flex flex-col md:flex-row items-center gap-4">
      
      <!-- Tracking Number Form -->
      <form action="/addtracknumber/{{ $orderItem->order->id }}" method="POST" class="flex items-center gap-2 w-full md:w-1/2">
        @csrf
        <input 
          type="text" 
          placeholder="Enter Tracking Number" 
          name="tracking_number" 
          required
          class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
        >
        <button 
          type="submit" 
          class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-200"
        >
          Save
        </button>
      </form>

      <!-- Status Dropdown Form -->
      <form action="/update-order-status/{{ $orderItem->order->id }}" method="POST" id="statusForm" class="w-full md:w-1/4">
        @csrf
        <select 
          name="status" 
          class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
          onchange="document.getElementById('statusForm').submit()"
        >
          <option value="pending" {{ $orderItem->order->status == 'pending' ? 'selected' : '' }}>Pending</option>
          <option value="processing" {{ $orderItem->order->status == 'processing' ? 'selected' : '' }}>Processing</option>
          <option value="shipped" {{ $orderItem->order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
          <option value="delivered" {{ $orderItem->order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
          <option value="cancelled" {{ $orderItem->order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
        </select>
      </form>

      <!-- Payment Status Dropdown Form -->
      <form action="/update-order-payment/{{ $orderItem->order->id }}" method="POST" id="statusForm2" class="w-full md:w-1/4">
        @csrf
        <select 
          name="status" 
          class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
          onchange="document.getElementById('statusForm2').submit()"
        >
          <option value="paid" {{ $orderItem->order->payment_status == 'paid' ? 'selected' : '' }}>Paid</option>
          <option value="pending" {{ $orderItem->order->payment_status == 'pending' ? 'selected' : '' }}>Pending</option>
        </select>
      </form>

    </div>
  </div>
</div>


</div>



@endsection