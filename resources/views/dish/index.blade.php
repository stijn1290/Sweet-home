<x-guest-layout>
    @if($categories)
        @auth
            @if($basket->user->is_admin)
                <div class="flex flex-row justify-between mb-6 gap-4">
                    <a href="{{ route('category.create') }}" class="bg-green-600 text-white px-4 py-2 rounded-xl">
                        New Category
                    </a>
                    <a href="{{ route('dish.create') }}" class="bg-green-600 text-white px-4 py-2 rounded-xl">
                        New Dish
                    </a>
                </div>
            @endif
        @endauth

        <div class="flex flex-col gap-6">
            @foreach($categories as $category)
                <div class="mb-4">
                    <h2 class="text-2xl font-bold mb-2">{{ $category->name }}</h2>

                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($category->dishes as $dish)
                            <div class="bg-white rounded-3xl p-4 shadow-md flex flex-col justify-between">
                                <div>
                                    <h3 class="text-xl font-semibold">{{ $dish->name }}</h3>
                                    <p class="text-gray-700">{{ $dish->description }}</p>
                                    <p class="text-green-700 font-bold mt-2">€ {{ number_format($dish->price, 2) }}</p>
                                </div>

                                <div class="mt-4 flex flex-row gap-2">
                                    @if($basket)
                                        @if($basket->user->is_admin)
                                            <a href="{{ route('dish.show', $dish) }}"
                                               class="bg-blue-600 text-white px-3 py-2 rounded-xl text-sm">
                                                Edit Dish
                                            </a>
                                        @else
                                            <form method="post" action="{{ route('basket.update', [$basket, $dish]) }}">
                                                @csrf
                                                @method('put')
                                                <input type="hidden" name="type" value="Add">
                                                <input type="hidden" name="dish_id" value="{{ $dish->id }}">
                                                <input type="submit" value="Add to Basket"
                                                       class="bg-green-500 text-white px-3 py-2 rounded-xl cursor-pointer text-sm">
                                            </form>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center mt-10">
            <h2 class="text-xl font-semibold text-gray-600">No dishes available</h2>
        </div>
    @endif
</x-guest-layout>
