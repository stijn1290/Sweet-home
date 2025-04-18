<x-app-layout>
    <div class="max-w-2xl mx-auto bg-gray-100 rounded-2xl p-6 mt-6 shadow-md">
        <h2 class="text-3xl font-bold text-gray-800 mb-4">Order #{{ $order->id }}</h2>
        <p class="text-lg text-gray-700 mb-6">
            <span class="font-semibold">Customer:</span> {{ $order->user->name }}
        </p>
        <div class="space-y-4 mb-6">
            @foreach($order->dishes as $dish)
                <div class="flex justify-between items-center border-b pb-2">
                    <div class="text-gray-800">
                        <span class="font-medium">{{ $dish->pivot->quantity }}x</span> {{ $dish->name }}
                    </div>
                    <div class="text-gray-600 font-semibold">
                        ${{ number_format($dish->totalPrice(), 2) }}
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-right text-xl font-bold text-green-700 border-t pt-4">
            Total: ${{ number_format($order->total_price, 2) }}
        </div>
    </div>
</x-app-layout>
