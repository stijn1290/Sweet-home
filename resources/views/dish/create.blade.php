<x-guest-layout>
    <form method="post" action="{{ route('dish.store') }}" class="bg-white flex flex-col p-5 rounded-xl shadow-2xl gap-4">
        @csrf
        <h2 class="font-extrabold">New dish</h2>
        <input type="text" placeholder="name" name="name" class="rounded-xl">
        <input type="text" placeholder="price" name="price" class="rounded-xl">
        <input type="text" placeholder="description" name="description" class="rounded-xl">
        <select class="rounded-xl" name="category_id">
            @foreach($categories as $category)
                <option>{{ $category->name }}</option>
            @endforeach
        </select>
        <input type="submit" class="rounded-xl bg-green-600 text-white pt-2 pb-2 cursor-pointer">
    </form>
</x-guest-layout>
