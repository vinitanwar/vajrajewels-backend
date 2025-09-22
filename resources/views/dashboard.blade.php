@extends("sidebar")

@section("title","Dashboard")

@section("content")

<div class="bg-black text-gray-200 min-h-screen p-6 w-full">

    <!-- Page Title -->
    <h1 class="text-3xl font-bold mb-6 text-yellow-400 flex items-center gap-2">
        <i class="fas fa-tachometer-alt text-yellow-400"></i> Dashboard
    </h1>

    <!-- Stat Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        @php
            $stats = [
                ['icon'=>'fa-shopping-cart','label'=>'Orders This Month','value'=>$ordersThisMonth],
                ['icon'=>'fa-history','label'=>'Total Orders','value'=>$ordersAllTime],
                ['icon'=>'fa-users','label'=>'Total Users','value'=>$userData->sum()],
                ['icon'=>'fa-truck','label'=>'Delivered Orders','value'=>$ordersByStatus['delivered'] ?? 0],
            ];
        @endphp 
        @foreach($stats as $stat)
            <div class="bg-gray-900 p-6 rounded-lg shadow border border-yellow-500 hover:shadow-yellow-500/30 transition">
                <h2 class="text-lg font-semibold text-gray-300 mb-2 flex items-center justify-center gap-2">
                    {{ $stat['label'] }}
                </h2>
                <div class="flex justify-center text-2xl gap-3 items-center"> 
                    <i class="fas {{ $stat['icon'] }} text-yellow-400"></i>
                    <p class="text-3xl font-extrabold text-yellow-400">{{ $stat['value'] }}</p>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Graphs -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        <div class="bg-gray-900 rounded-lg shadow p-6 border border-yellow-500">
            <h2 class="text-lg font-bold mb-4 text-yellow-400"><i class="fas fa-user-plus mr-2"></i>User Registrations</h2>
            <canvas id="userChart"></canvas>
        </div>

        <div class="bg-gray-900 rounded-lg shadow p-6 border border-yellow-500">
            <h2 class="text-lg font-bold mb-4 text-yellow-400"><i class="fas fa-box mr-2"></i>Orders Per Month</h2>
            <canvas id="orderChart"></canvas>
        </div>

        <div class="bg-gray-900 p-6 rounded-lg shadow border border-yellow-500">
            <h2 class="text-lg font-bold mb-4 text-yellow-400"><i class="fas fa-chart-pie mr-2"></i>Orders by Status</h2>
            <canvas id="statusChart"></canvas>
        </div>
    </div>

    <!-- Mini Stats -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mb-6 text-center">
        @php
            $mini = [
                ['icon'=>'fa-image','label'=>'Banner Count','value'=>$banners],
                ['icon'=>'fa-list','label'=>'Category Count','value'=>$category],
                ['icon'=>'fa-box-open','label'=>'Product Count','value'=>$product],
                ['icon'=>'fa-blog','label'=>'Blog Count','value'=>$blog],
            ];
        @endphp
        @foreach($mini as $m)
        <div class="bg-gray-900 p-4 rounded-lg border border-yellow-500 hover:shadow-yellow-500/30 transition">
            <div class="text-gray-300 flex justify-center items-center gap-2">{{ $m['label'] }}</div>
            <div class="flex justify-center text-2xl gap-3 items-center mt-2">
                <i class="fas {{ $m['icon'] }} text-yellow-400"></i>
                <p class="text-xl font-bold text-yellow-400">{{ $m['value'] }}</p>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Orders Tables (Reusable Component) -->
    @php
        $tables = [
            ['title'=>'Unpaid Orders','icon'=>'fa-money-bill-wave','data'=>$unpaid_orders],
            ['title'=>'Pending Orders','icon'=>'fa-clock','data'=>$pending_orders],
        ];
    @endphp

    @foreach($tables as $t)
    <div class="mb-10">
        <h2 class="text-xl font-bold text-yellow-400 mb-4">
            <i class="fas {{ $t['icon'] }} mr-2"></i> {{ $t['title'] }}
        </h2>
        <table class="min-w-full divide-y divide-gray-700 bg-gray-900 border border-yellow-500 rounded-lg overflow-hidden">
            <thead class="bg-gray-800 text-yellow-400">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider">#</th>
                    <th class="px-6 py-4">User</th>
                    <th class="px-6 py-4">Total</th>
                    <th class="px-6 py-4">Discount</th>
                    <th class="px-6 py-4">Final</th>
                    <th class="px-6 py-4">Payment</th>
                    <th class="px-6 py-4">Pay Status</th>
                    <th class="px-6 py-4">Order Status</th>
                    <th class="px-6 py-4">Tracking</th>
                    <th class="px-6 py-4">Created</th>
                    <th class="px-6 py-4 text-right">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-700 text-gray-300">
                @forelse($t['data'] as $order)
                    <tr class="hover:bg-gray-800 transition">
                        <td class="px-6 py-4 font-bold">{{ $order->order->id }}</td>
                        <td class="px-6 py-4"><i class="fas fa-user-circle text-yellow-400 mr-2"></i>{{ $order->order->user_id }}</td>
                        <td class="px-6 py-4"><i class="fas fa-rupee-sign text-yellow-400 mr-1"></i>{{ number_format($order->price, 2) }}</td>
                        <td class="px-6 py-4"><i class="fas fa-rupee-sign text-yellow-400 mr-1"></i>{{ number_format($order->order->discount, 2) }}</td>
                        <td class="px-6 py-4 font-bold text-green-400"><i class="fas fa-rupee-sign mr-1"></i>{{ number_format($order->price, 2) }}</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-3 py-1 text-xs rounded-full bg-yellow-500 text-black">
                                <i class="fas fa-credit-card mr-2"></i>{{ strtoupper($order->order->payment_method) }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            @if($order->order->payment_status == 'pending')
                                <span class="inline-flex items-center px-3 py-1 text-xs rounded-full bg-yellow-400 text-black animate-pulse">
                                    <i class="fas fa-hourglass-half mr-2"></i>{{ ucfirst($order->order->payment_status) }}
                                </span>
                            @else
                                <span class="inline-flex items-center px-3 py-1 text-xs rounded-full bg-green-400 text-black">
                                    <i class="fas fa-check-circle mr-2"></i>{{ ucfirst($order->order->payment_status) }}
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            @if($order->order->status == 'pending')
                                <span class="inline-flex items-center px-3 py-1 text-xs rounded-full bg-blue-400 text-black">
                                    <i class="fas fa-info-circle mr-2"></i>{{ ucfirst($order->order->status) }}
                                </span>
                            @else
                                <span class="inline-flex items-center px-3 py-1 text-xs rounded-full bg-green-400 text-black">
                                    <i class="fas fa-truck mr-2"></i>{{ ucfirst($order->order->status) }}
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4"><i class="fas fa-shipping-fast text-yellow-400 mr-2"></i>{{ $order->order->tracking_number ?? '—' }}</td>
                        <td class="px-6 py-4"><i class="fas fa-calendar-alt text-yellow-400 mr-2"></i>{{ $order->order->created_at->format('d M Y, h:i A') }}</td>
                        <td class="px-6 py-4 text-right">
                            <a href="/orders/{{ $order->id }}" class="inline-flex items-center gap-2 px-4 py-2 bg-green-500 hover:bg-green-600 text-white text-sm font-semibold rounded-lg shadow transition transform hover:scale-105">
                                <i class="fas fa-eye"></i> View
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="11" class="px-6 py-12 text-center text-gray-500">
                            <i class="fas fa-archive text-5xl text-gray-400 mb-4"></i>
                            <p class="text-xl font-semibold">No orders found</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @endforeach

</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const gold = 'rgba(250,204,21,1)';
    const goldLight = 'rgba(250,204,21,0.2)';

    new Chart(document.getElementById('userChart'), {
        type: 'line',
        data: {
            labels: @json($userLabels),
            datasets: [{
                label: 'Users',
                data: @json($userData),
                borderColor: gold,
                backgroundColor: goldLight,
                fill: true,
                tension: 0.3
            }]
        }
    });

    new Chart(document.getElementById('orderChart'), {
        type: 'bar',
        data: {
            labels: @json($orderLabels),
            datasets: [{
                label: 'Orders',
                data: @json($orderData),
                backgroundColor: 'rgba(250,204,21,0.7)'
            }]
        }
    });

    new Chart(document.getElementById('statusChart'), {
        type: 'scatter',
        data: {
            labels: @json($ordersByStatus->keys()),
            datasets: [{
                data: @json($ordersByStatus->values()),
                backgroundColor: [
                    gold,
                    'rgba(59,130,246,0.7)',
                    'rgba(16,185,129,0.7)',
                    'rgba(239,68,68,0.7)',
                    'rgba(139,92,246,0.7)'
                ]
            }]
        }
    });
});
</script>

@endsection
