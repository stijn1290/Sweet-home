<x-guest-layout>
    <form action="{{ route('contact.store') }}" method="post" class="bg-white rounded-2xl p-8 grid grid-cols-1 gap-5 items-center">
        @csrf
        <h2 class="font-extrabold">Neem contact met ons op!</h2>
        <input type="text" placeholder="name" name="name" class="rounded-xl">
        <input type="text" placeholder="email" name="email" class="rounded-xl">
        <input type="text" placeholder="phone" name="phone" class="rounded-xl">
        <input type="text" placeholder="message" name="message" class="rounded-xl">
        <input type="submit" class="rounded-xl bg-green-600 text-white p-4 cursor-pointer">
    </form>
</x-guest-layout>
