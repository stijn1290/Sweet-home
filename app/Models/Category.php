<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'name',
    ];
    public function dishes()
    {
        return $this->hasMany(Dish::class);
    }
}
