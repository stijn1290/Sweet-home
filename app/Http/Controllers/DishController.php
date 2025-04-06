<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dishes = Dish::all();
        return view('dish.index', ['dishes' => $dishes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('dish.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'category_id' => 'required',
        ]);
        $category_id = Category::where('name', $request->get('category_id'))->pluck('id')->first();
        $dish = Dish::create([
            'name' => $request->get('name'),
            'price' => $request->get('price'),
            'description' => $request->get('description'),
            'category_id' => $category_id,
        ]);
        if ($dish) {
            return redirect()->route('dish.index')->with('success', 'Dish created successfully');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Dish $dish)
    {
        return view('dish.show', ['dish' => $dish]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dish $dish)
    {
        $categories = Category::all();
        return view('dish.edit', ['dish' => $dish, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'category_id' => 'required',
        ]);
        $category_id = Category::where('name', $request->get('category_id'))->pluck('id')->first();
        $dish = Dish::where('name', $request->get('name'))->get()->first();
        $dish->update([
            'name' => $request->get('name'),
            'price' => $request->get('price'),
            'description' => $request->get('description'),
            'category_id' => $category_id,
        ]);
        return redirect()->route('dish.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish)
    {
        $dish->delete();
        return redirect()->route('dish.index');
    }
}
