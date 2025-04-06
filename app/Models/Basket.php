<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    protected $table = 'basket';
    protected $fillable = [
        'dish_id',
        'user_id',
    ];
    public function dish()
    {
        return $this->hasMany(Dish::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
