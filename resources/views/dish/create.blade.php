<x-guest-layout>
    <form method="post" action="{{ route('dish.store') }}" class="bg-white flex flex-col p-5 rounded-xl gap-4">
        @csrf
        <h2>New dish</h2>
        <input type="text" placeholder="name" name="name" class="rounded-xl">
        <input type="text" placeholder="price" name="price" class="rounded-xl">
        <input type="text" placeholder="description" name="description" class="rounded-xl">
        <input type="submit" class="rounded-xl bg-green-600 text-white pt-2 pb-2 cursor-pointer">
    </form>
</x-guest-layout>
