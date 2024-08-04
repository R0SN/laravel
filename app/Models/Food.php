<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    protected $table = 'foods';
    protected $fillable = [
        'id',
        'category_id',
        'name',
        'price',
        'img',
        'created_by',
        'updated_by',
        'deleted_at',
        'created_at',
        'updated_at'
    ];
    public function category()
    {
        return $this->belongsTo(FoodCategory::class, 'category_id');
    }
}
