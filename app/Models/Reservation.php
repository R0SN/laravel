<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'fname',
        'lname',
        'email',
        'state',
        'phone',
        'subject',
        'reservation_date_and_time',
        'guest_number',
        'created_by',
        'updatedd_by',
        'deleted_at',
        'created_at',
        'updated_at'
    ];
}
