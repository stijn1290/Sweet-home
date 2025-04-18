<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    protected $table = 'baskets';
    protected $fillable = [
        'dish_id',
        'user_id',
    ];
    public function dishes()
    {
        return $this->belongsToMany(Dish::class)->withPivot('quantity')->withTimestamps();
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
