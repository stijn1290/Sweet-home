<x-guest-layout>
    @if($dishes)
        @auth
            <div class="flex flex-row justify-end">
            <a href="{{ route('dish.create') }}" class="text-white bg-green-600 p-2 rounded-xl text-center">New
                dish</a>
            </div>
        @endauth
        <div class="grid grid-cols-3 items-center justify-center gap-3">
            @foreach($dishes as $dish)
                <a class="bg-white rounded-3xl p-4 cursor-pointer hover:bg-yellow-400 hover:text-white flex flex-col"
                   href="{{ route('dish.show', $dish) }}">
                    <h2>{{ $dish->name }}</h2>
                    <p>{{ $dish->description }}</p>
                    <p>€ {{ $dish->price }}</p>
                    <p>{{ $dish->category->name }}</p>
                </a>
            @endforeach
        </div>
    @else
        <h2>No dishes made</h2>
    @endif
</x-guest-layout>
