<x-guest-layout>
    @php $totalPrice = 0; @endphp

    <div class="bg-white flex flex-col p-6 rounded-2xl shadow-md max-w-3xl mx-auto mt-6">
        <h2 class="font-bold text-3xl mb-4">Basket</h2>

        @if(count($basket->dishes) >= 1)
            @foreach($basket->dishes as $dish)
                @php $totalPrice += $dish->totalPrice(); @endphp
                <div class="flex flex-row justify-between items-center mb-4 border-b pb-2">
                    <div>
                        <h3 class="text-lg font-medium">{{ $dish->pivot->quantity }} × {{ $dish->name }}</h3>
                    </div>
                    <div class="flex items-center gap-4">
                        <h3 class="text-lg font-semibold">${{ number_format($dish->totalPrice(), 2) }}</h3>
                        <form method="POST" action="{{ route('basket.update', [$basket , $dish]) }}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="type" value="Remove">
                            <input type="hidden" name="dish_id" value="{{ $dish->id }}">
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white text-sm px-4 py-2 rounded-2xl">
                                Remove
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach

            <div class="mt-6 flex justify-between items-center">
                <h2 class="text-2xl font-bold">Total: ${{ number_format($totalPrice, 2) }}</h2>
            </div>

            <form method="POST" action="{{ route('order.store', $basket) }}" class="mt-4">
                @csrf
                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                <input type="hidden" name="total_price" value="{{ number_format($totalPrice, 2) }}">
                <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white font-semibold py-3 rounded-2xl mt-2">
                    Place Order
                </button>
            </form>
        @else
            <p class="text-lg">Your basket is empty. You can add items <a href="{{ route('dish.index') }}" class="text-blue-500 underline">here</a>.</p>
        @endif
    </div>
</x-guest-layout>
