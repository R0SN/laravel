<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a default user
        User::factory()->create([
            'name' => 'Roshan Jhendi',
            'email' => 'rosn@gmail.com',
            'password' =>'rosn'
        ]);

        // Seed settings table using the Setting model
        Setting::create([
            'website_name' => 'Example Website',
            'slogan' => 'Best Example',
            'logo' => 'logo.png',
            'favicon' => 'favicon.ico',
            'header_logo' => 'header_logo.png',
            'about_website' => 'About the website',
            'about_beer' => 'About beer',
            'about_bread' => 'About bread',
            'food_description' => 'Description of food',
            'phone_no' => 101,
            'google_map_link' => 'https://maps.example.com',
            'twitter_link' => 'tweet@example',
            'github_link' => 'github.com/example',
            'linkedin_link' => 'linkedin.com/in/example',
            'gmail_link' => 'example@gmail.com',
            'status' => 1,
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
