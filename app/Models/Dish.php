<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $table = 'dishes';
    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function baskets()
    {
        return $this->belongsToMany(Basket::class)->withPivot('quantity')->withTimestamps();
    }
    public function totalPrice()
    {
        return $this->pivot->quantity * $this['price'];
    }
}
