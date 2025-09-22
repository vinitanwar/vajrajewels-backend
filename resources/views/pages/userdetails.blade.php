@extends("sidebar")

@section("title", $user->name)

@section("content")
<div class="p-6 space-y-8">
    
    <!-- User Profile Card -->
    <div class="bg-white shadow rounded-2xl p-6">
        <div class="flex items-center gap-6">
            <div class="w-20 h-20 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 text-3xl font-bold">
                {{ strtoupper(substr($user->name, 0, 1)) }}
            </div>
            <div>
                <h2 class="text-2xl font-semibold text-gray-800 flex items-center gap-2">
                    <i class="fas fa-user text-indigo-500"></i> 
                    {{ $user->name }}
                </h2>
                <p class="text-gray-600 flex items-center gap-2">
                    <i class="fas fa-envelope text-gray-400"></i> 
                    {{ $user->email }}
                </p>
                <p class="text-gray-600 flex items-center gap-2">
                    <i class="fas fa-calendar-alt text-gray-400"></i> 
                    Joined: {{ $user->created_at->format("d M Y") }}
                </p>
            </div>
        </div>
    </div>

    <!-- Cart Items -->
    <div class="bg-white shadow rounded-2xl p-6">
        <h3 class="text-xl font-semibold mb-4 flex items-center gap-2">
            <i class="fas fa-shopping-cart text-green-500"></i> Cart Items
        </h3>
        @if($cart->isEmpty())
            <p class="text-gray-500">No items in cart.</p>
        @else
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left">Product</th>
                        <th class="px-6 py-3 text-left">Quantity</th>
                        <th class="px-6 py-3 text-left">Price</th>
                        <th class="px-6 py-3 text-left">Total</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($cart as $c)
                        <tr>
                            <td class="px-6 py-3">{{ $c->product->title ?? 'N/A' }}</td>
                            <td class="px-6 py-3">{{ $c->count }}</td>
                            <td class="px-6 py-3">₹{{ $c->product->price ?? 0 }}</td>
                            <td class="px-6 py-3">₹{{ ($c->product->price ?? 0) * $c->count }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <!-- Addresses -->
    <div class="bg-white shadow rounded-2xl p-6">
        <h3 class="text-xl font-semibold mb-4 flex items-center gap-2">
            <i class="fas fa-map-marker-alt text-red-500"></i> Saved Addresses
        </h3>
        @if($addresses->isEmpty())
            <p class="text-gray-500">No addresses saved.</p>
        @else
            <ul class="space-y-3">
               @foreach($addresses as $a)
    <li class="p-4 border rounded-lg hover:bg-gray-50 transition space-y-1">
        <p class="font-medium text-lg flex items-center gap-2">
            <i class="fas fa-user text-indigo-500"></i> 
            {{ $a->first_name }} {{ $a->last_name }} 
            <span class="ml-2 text-sm text-gray-500">({{ ucfirst($a->gender) }})</span>
        </p>

        <p class="text-gray-600 flex items-center gap-2">
            <i class="fas fa-envelope text-gray-400"></i> {{ $a->email }}
        </p>

        <p class="text-gray-600 flex items-center gap-2">
            <i class="fas fa-map-marker-alt text-red-400"></i> 
            {{ $a->house_no }}, {{ $a->address }}, 
            {{ $a->landmark ?? 'N/A' }}, {{ $a->city }}, 
            {{ $a->state }}, {{ $a->country }} - {{ $a->postcode }}
        </p>

        <p class="text-gray-600 flex items-center gap-2">
            <i class="fas fa-phone-alt text-green-500"></i> {{ $a->phone }}
        </p>

        @if($a->order_notes)
            <p class="text-gray-600 flex items-center gap-2 italic">
                <i class="fas fa-sticky-note text-yellow-500"></i> {{ $a->order_notes }}
            </p>
        @endif
    </li>
@endforeach

            </ul>
        @endif
    </div>

    <!-- Orders -->
    <div class="bg-white shadow rounded-2xl p-6">
        <h3 class="text-xl font-semibold mb-4 flex items-center gap-2">
            <i class="fas fa-box text-yellow-500"></i> Orders
        </h3>
        @if($orders->isEmpty())
            <p class="text-gray-500">No orders placed yet.</p>
        @else
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left">Order ID</th>
                        <th class="px-6 py-3 text-left">Total</th>
                        <th class="px-6 py-3 text-left">Status</th>
                        <th class="px-6 py-3 text-left">Payment</th>
                        <th class="px-6 py-3 text-left">Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($orders as $o)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-3">#{{ $o->id }}</td>
                            <td class="px-6 py-3">₹{{ $o->final_amount }}</td>
                            <td class="px-6 py-3">
                                <span class="px-3 py-1 rounded-full text-sm
                                    @if($o->status == 'delivered') bg-green-100 text-green-600
                                    @elseif($o->status == 'cancelled') bg-red-100 text-red-600
                                    @else bg-yellow-100 text-yellow-600
                                    @endif">
                                    {{ ucfirst($o->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-3">{{ ucfirst($o->payment_method) }} ({{ $o->payment_status }})</td>
                            <td class="px-6 py-3">{{ $o->created_at->format("d M Y") }}</td>
                        </tr>
                        <tr>
                            <td colspan="5" class="px-6 py-3 bg-gray-50">
                                <strong>Items:</strong>
                                <ul class="list-disc list-inside text-gray-700">
                                    @foreach($o->items as $item)
                                        <li>
                                            {{ $item->product->title ?? 'N/A' }} × {{ $item->quantity }} 
                                            = ₹{{ $item->total }}
                                        </li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

</div>
@endsection
