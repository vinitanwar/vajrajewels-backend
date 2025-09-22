@extends("sidebar")

@section("title","Orders")

@section("content")
<div class="w-full bg-black text-gray-200 min-h-screen font-sans p-6">
    <!-- Page Title -->
    <h2 class="text-3xl font-extrabold mb-8 flex items-center gap-4 text-yellow-400">
        <i class="fas fa-box-open text-yellow-400"></i> {{ $heading }}
    </h2>

    <!-- Orders Table -->
    <div class="bg-gray-900 shadow-lg rounded-lg overflow-hidden border border-yellow-500">
        <table class="min-w-full divide-y divide-gray-700">
            <thead class="bg-gray-800 text-yellow-400">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider">#</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider">User</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider">Total</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider">Discount</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider">Final</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider">Payment</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider">Pay Status</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider">Order Status</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider">Tracking</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider">Created</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-700">
                @forelse($orders as $order)
                    <tr class="hover:bg-gray-800 transition-all duration-300">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-yellow-400">
                            #{{ $order->order->id }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                            <i class="fas fa-user-circle text-yellow-400 mr-2"></i> {{ $order->order->user_id }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                            <i class="fas fa-rupee-sign mr-1 text-yellow-400"></i>{{ number_format($order->price, 2) }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                            <i class="fas fa-rupee-sign mr-1 text-yellow-400"></i>{{ number_format($order->order->discount, 2) }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-green-400">
                            <i class="fas fa-rupee-sign mr-1"></i>{{ number_format($order->price, 2) }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-3 py-1 text-xs font-medium rounded-full bg-yellow-500 text-black">
                                <i class="fas fa-credit-card mr-2"></i> {{ strtoupper($order->order->payment_method) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($order->order->payment_status == 'pending')
                                <span class="inline-flex items-center px-3 py-1 text-xs font-medium rounded-full bg-yellow-400 text-black animate-pulse">
                                    <i class="fas fa-hourglass-half mr-2"></i> {{ ucfirst($order->order->payment_status) }}
                                </span>
                            @else
                                <span class="inline-flex items-center px-3 py-1 text-xs font-medium rounded-full bg-green-400 text-black">
                                    <i class="fas fa-check-circle mr-2"></i> {{ ucfirst($order->order->payment_status) }}
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($order->order->status == 'pending')
                                <span class="inline-flex items-center px-3 py-1 text-xs font-medium rounded-full bg-blue-400 text-black">
                                    <i class="fas fa-info-circle mr-2"></i> {{ ucfirst($order->order->status) }}
                                </span>
                            @else
                                <span class="inline-flex items-center px-3 py-1 text-xs font-medium rounded-full bg-green-400 text-black">
                                    <i class="fas fa-truck mr-2"></i> {{ ucfirst($order->order->status) }}
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                            <i class="fas fa-shipping-fast text-yellow-400 mr-2"></i> {{ $order->order->tracking_number ?? '—' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">
                            <i class="fas fa-calendar-alt mr-2"></i> {{ $order->order->created_at->format('d M Y, h:i A') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="/orders/{{ $order->id }}" 
                               class="inline-flex items-center gap-2 px-4 py-2 bg-green-500 hover:bg-green-600 text-white text-sm font-semibold rounded-lg shadow-lg transition-transform transform hover:scale-105">
                                <i class="fas fa-eye"></i> View
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="11" class="px-6 py-12 text-center text-gray-500">
                            <div class="flex flex-col items-center justify-center">
                                <i class="fas fa-archive text-5xl text-gray-400"></i>
                                <p class="mt-4 text-xl font-semibold">No orders found</p>
                                <p class="mt-2 text-md">Start by placing your first order!</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
