<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Dish;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Pest\Laravel\get;

class BasketController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($userId)
    {
        $basket = Basket::with('user', 'dishes')->where('user_id', $userId)->get()->first();
        return view('basket.index', compact('basket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Basket $basket)
    {
        $request->validate([
            'type' => 'required',
            'dish_id' => 'required',
        ]);
        if ($request->get('type') == "Add")
        {
            if ($basket->dishes()->where('dish_id', $request->get('dish_id'))->exists())
            {
                $dish = $basket->dishes()->where('dish_id', $request->get('dish_id'))->first();
                $currentQuantity = $dish->pivot->quantity;
                $basket->dishes()->updateExistingPivot($dish->id , ['quantity' => $currentQuantity + 1] );
            }
            else
            {
                $basket->dishes()->attach($request->get('dish_id'));
            }
        }
        else if ($request->get('type') == "Remove")
        {
            $dish = $basket->dishes()->where('dish_id', $request->get('dish_id'))->first();
            $currentQuantity = $dish->pivot->quantity;
            if ($currentQuantity >= 1)
            {
                $basket->dishes()->updateExistingPivot($dish->id , ['quantity' => $currentQuantity - 1] );
                $updatedQuantity = $currentQuantity - 1;
                if ($updatedQuantity == 0)
                {
                    $basket->dishes()->detach($request->get('dish_id'));
                }
            }
            else
            {
                $basket->dishes()->detach($request->get('dish_id'));
            }
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
