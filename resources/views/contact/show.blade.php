<x-app-layout>
    <div class="max-w-2xl mx-auto bg-white shadow-md rounded-2xl p-6 mt-6 space-y-4">
        <h2 class="text-2xl font-bold text-gray-800">Contact Request #{{ $contact->id }}</h2>

        <div class="text-gray-700">
            <p><span class="font-semibold">Name:</span> {{ $contact->name }}</p>
            <p><span class="font-semibold">Phone:</span> {{ $contact->phone }}</p>
            <p><span class="font-semibold">Email:</span> {{ $contact->email }}</p>
            <p><span class="font-semibold">Message:</span> {{ $contact->message }}</p>
        </div>
    </div>
</x-app-layout>

