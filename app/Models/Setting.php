<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'website_name',
        'slogan',
        'logo',
        'favicon',
        'header_logo',
        'about_website',
        'about_beer',
        'about_bread',
        'food_description',
        'google_map_link',
        'twitter_link',
        'github_link',
        'linkedin_link',
        'gmail_link',
        'opening_hours',
        'status',
        'created_by',
        'updated_by',
        'deleted_at',
        'created_at',
        'updated_at'
    ];
}
