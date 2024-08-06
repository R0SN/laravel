<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Support\Facades\Auth;
use App\Models\Food;
use App\Models\FoodCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\OpeningHour;

class IndexController extends Controller
{
    public function index()
    {
        $foods = Food::with('category')->orderBy('name')->get(); // Fetch foods with category
        $categories = FoodCategory::orderBy('name')->get();
        $openingHours = OpeningHour::all()->groupBy('day_of_week');

        return view('frontend.index', compact('foods', 'categories','openingHours'));
    }
    public function storeReservation(Request $request)
    {
        $data = $request->all();
        $data['created_by'] = Auth::id();

        if (Reservation::create($data)) {
            return redirect()->back()->with('success', 'Reservation made!')->with('scroll_to', 'reservation');
        } else {
            return redirect()->back()->with('error', 'Reservation failed!')->with('scroll_to', 'reservation');
        }
    }
}
