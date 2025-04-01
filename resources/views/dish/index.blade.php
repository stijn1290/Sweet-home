<x-guest-layout>
    @if($dishes)
        <div class="grid grid-cols-6 items-center justify-center gap-3">
            @foreach($dishes as $dish)
                <a class="bg-white rounded-3xl p-4 cursor-pointer hover:bg-yellow-200 flex flex-col"
                   href="{{ route('dish.show', $dish) }}">
                    <h2>{{ $dish->name }}</h2>
                    <p>{{ $dish->description }}</p>
                    <p>€ {{ $dish->price }}</p>
                </a>
            @endforeach
            @auth
                <a href="{{ route('dish.create') }}" class="text-white bg-green-600 p-2 rounded-xl text-center">New
                    dish</a>
            @endauth
        </div>
    @else
        <h2>No dishes made</h2>
    @endif
</x-guest-layout>
