<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'total_price' => 'required',
            'user_id' => 'required',
        ]);
        $basket = Basket::where('user_id', $request->get('user_id'))->first();
        $order = Order::create([
            'user_id' => $request->get('user_id'),
            'total_price' => $request->get('total_price'),
        ]);
        foreach ($basket->dishes as $dish) {
            $order->dishes()->attach($dish->id, ['quantity' => $dish->pivot->quantity]);
        }
        $basket->dishes()->detach();

        return redirect()->route('welcome');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view ('order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
