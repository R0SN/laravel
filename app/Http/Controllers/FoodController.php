<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index()
    {
        $foods = Food::orderBy('name')->get();
        // Send data from controller to view
        return view('backend.food', compact('foods'));
    }

    public function destroy($id)
    {
        $food = Food::findOrFail($id);
        $food->delete();
        return redirect()->route('backend.food')->with('success', 'Food item deleted successfully');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'price' => 'required',
            'image' => 'nullable|file|mimes:jpg,jpeg,bmp,png|max:10000'
        ]);

        $data = $request->all();
        $data['created_by'] = Auth::id(); // Ensure `created_by` is set to authenticated user ID

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/images/FoodItems'), $fileName);
            $data['image'] = $fileName;
        }

        if (Food::create($data)) {
            $request->session()->flash('success', 'Food item created successfully');
        } else {
            $request->session()->flash('error', 'Food item creation failed');
        }

        return redirect()->route('backend.food');
    }
}
