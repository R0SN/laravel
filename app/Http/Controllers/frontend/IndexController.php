<?php

namespace App\Http\Controllers\frontend;
use Illuminate\Support\Facades\Auth;
use App\Models\Food;
use App\Models\FoodCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;

class IndexController extends Controller
{
    public function index()
    {
        $foods = Food::with('category')->orderBy('name')->get(); // Fetch foods with category
        $categories = FoodCategory::orderBy('name')->get();
        return view('frontend.index', compact('foods', 'categories'));
    }
    public function storeReservation(Request $request)
    {
        // $request->validate([
        //     'fname' => 'required|string|max:255',
        //     'lname' => 'required|string|max:255',
        //     'state' => 'required|string|max:255',
        //     'reservation_date_and_time' => 'required',
        //     'phone' => 'required|string|max:15',
        //     'guest_number' => 'required|integer',
        //     'email' => 'required|email|max:255',
        //     'subject' => 'required|string|max:255'
        // ]);
        // dd($request->all());
            $data = $request->all();
            $data['created_by'] = Auth::id();
    
            if (Reservation::create($data)) {
                return redirect()->back()->with('success', 'Reservation made successfully!');
            } else {
                return redirect()->back()->with('error', 'Reservation failed!');
            }
        }
    
    }
