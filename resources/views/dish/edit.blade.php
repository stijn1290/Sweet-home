<x-guest-layout>
    <form method="post" action="{{ route('dish.update', $dish) }}" class="flex flex-col bg-white gap-4 p-4 rounded-2xl">
        @csrf
        @method('put')
        <h2 class="font-semibold">Edit {{ $dish->name }}</h2>
        <input type="text" placeholder="name" name="name" value="{{ $dish->name }}">
        <input type="text" placeholder="price" name="price" value="{{ $dish->price }}">
        <input type="text" placeholder="description" name="description" value="{{ $dish->description }}">
        <select name="category_id">
            @foreach($categories as $category)
                <option>{{ $category->name }}</option>
            @endforeach
        </select>
        <input type="submit" value="Update" class="bg-yellow-400 rounded-2xl cursor-pointer text-white p-2">
    </form>
</x-guest-layout>
