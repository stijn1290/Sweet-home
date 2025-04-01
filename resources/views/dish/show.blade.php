<x-guest-layout>
    <div class="bg-white rounded-2xl p-5">
        <h2 class="">{{ $dish->name }}</h2>
        <p>{{ $dish->description }}</p>
        <p>€ {{ $dish->price }}</p>
        <div class="flex flex-row gap-4">
            <a href="{{ route('dish.edit', $dish) }}" class="bg-blue-600 p-2 rounded-xl text-white">Edit {{ $dish->name }}</a>
            <form method="post" action="{{ route('dish.destroy', $dish) }}">
                @csrf
                @method('delete')
                <input type="submit" value="delete" class="bg-red-500 text-white p-2 rounded-xl cursor-pointer">
            </form>
        </div>
    </div>
</x-guest-layout>
