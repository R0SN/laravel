<?php

namespace App\Http\Controllers\frontend;
use App\Models\Food;
use App\Models\FoodCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
{
    $foods = Food::with('category')->orderBy('name')->get(); // Fetch foods with category
    $categories = FoodCategory::orderBy('name')->get();
    return view('frontend.index', compact('foods', 'categories'));
}
}
