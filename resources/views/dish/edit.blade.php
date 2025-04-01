<x-guest-layout>
    <form method="post" action="{{ route('dish.update', $dish) }}">
        @csrf
        @method('put')
        <input type="text" placeholder="name" name="name" value="{{ $dish->name }}">
        <input type="text" placeholder="price" name="price" value="{{ $dish->price }}">
        <input type="text" placeholder="description" name="description" value="{{ $dish->description }}">
        <input type="submit">
    </form>
</x-guest-layout>
