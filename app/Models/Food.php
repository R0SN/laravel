<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    protected $table = 'foods';
    protected $fillables = [
        'id',
        'category_id',
        'name',
        'price',
        'discout',
        'image',
        'created_by',
        'updated_by',
        'deleted_at',
        'created_at',
        'updated_at'
    ];
}
