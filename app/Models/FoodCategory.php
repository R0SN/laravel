<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodCategory extends Model
{
    use HasFactory;
    protected $table = 'food_categories';

    protected $fillable = [
        'id',
        'name',
        'created_by',
        'updatedd_by',
        'deleted_at',
        'created_at',
        'updated_at'
    ];
    public function foods()
    {
        return $this->hasMany(Food::class, 'category_id');
    }
}
