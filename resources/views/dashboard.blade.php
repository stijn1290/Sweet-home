<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-3">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-bold">Contact requests</h2>
                    @foreach(\App\Models\Contact::all() as $contact)
                        <a class="flex flex-row justify-between bg-gray-300 rounded-2xl p-2 hover:bg-gray-400" href="{{ route('contact.show', $contact) }}">
                            <div class="flex flex-row gap-2">
                                <h2>{{ $contact->id }}</h2>
                                <h2>{{ $contact->name }}</h2>
                            </div>
                            <h2>{{ $contact->created_at }}</h2>
                            <h2>{{ $contact->phone }}</h2>
                            <h2>{{ $contact->email }}</h2>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-bold">Orders</h2>
                    @foreach(\App\Models\Order::all() as $order)
                        <a class="flex flex-row justify-between bg-gray-300 rounded-2xl p-2 hover:bg-gray-400 mb-4" href="{{ route('order.show', $order) }}">
                            <div class="flex flex-row gap-2">
                                <h2>{{ $order->id }}</h2>
                                <h2>{{ $order->user->name }}</h2>
                            </div>
                            <h2>{{ $order->created_at }}</h2>
                            <h2>${{ $order->total_price }}</h2>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
