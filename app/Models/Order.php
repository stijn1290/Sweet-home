<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'dish_id',
        'total_price',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function dishes()
    {
        return $this->belongsToMany(Dish::class, 'order_dish')->withPivot('quantity')->withTimestamps();
    }
}
