<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'created_by',
        'updatedd_by',
        'deleted_at',
        'created_at',
        'updated_at'
    ];
}
