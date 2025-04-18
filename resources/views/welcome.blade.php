<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<x-guest-layout>
    <div class="grid grid-cols-2 items-center gap-8 -mt-6">
        <div class="flex flex-col pl-6 gap-4">
            <b class="text-6xl font-extrabold pb-4">The best mixed grills and gyros made with attention</b>
            <p>
                Sweet Home operates since 1999 and is run and managed as a family business. During all these years our first
                priority is to offer top quality products and services to our customers. This is the main reason why Sweet
                Home not only, claims the title, but is the leading café-gelateria in Hersonissos.

                Sweet Home is very famous in hersonissos for the delicious home-made ice-cream made out from fresh milk,
                following the steps of the secret recipe of the family. It is also known for the quality coffee it offers,
                because it uses only the leader brands in coffee Illy and Douwe Edwards, in order to give the best
                servives.</p>
            <a href="{{ route('dish.index') }}" class="bg-green-400 rounded-2xl cursor-pointer text-white p-4 max-w-max mt-4">Order now!</a>
        </div>
        <img src="https://res.cloudinary.com/the-infatuation/image/upload/q_auto,f_auto/images/EV_OCA_20200201_01_028-S_xqxnsy"
             alt="image">
    </div>
</x-guest-layout>
</html>
