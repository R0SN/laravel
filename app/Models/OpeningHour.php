<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OpeningHour extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'day_of_week',
        'opening_time',
        'closing_time',
        'created_by',
        'updated_by',
    ];
}
