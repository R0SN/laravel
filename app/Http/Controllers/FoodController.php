<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Food;
use App\Models\FoodCategory;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index()
    {
        $foods = Food::orderBy('name')->get();
        $categories = FoodCategory::orderBy('name')->get();
        return view('backend.food', compact('foods', 'categories'));
    }

    public function destroy($id)
    {
        $food = Food::findOrFail($id);

        // Check if the food item has an image and delete it
        if ($food->img && file_exists(public_path('assets/images/FoodItems/' . $food->img))) {
            unlink(public_path('assets/images/FoodItems/' . $food->img));
        }

        // Delete the food item from the database
        $food->delete();

        return redirect()->route('backend.food')->with('success', 'Food item deleted successfully');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required|exists:food_categories,id',
            'price' => 'required|numeric',
            'foods_image' => 'required|file|mimes:jpg,jpeg,bmp,png|max:10000'
        ]);

        $data = $request->only(['name', 'category_id', 'price']);
        $data['created_by'] = Auth::id();

        if ($request->hasFile('foods_image')) {
            $file = $request->file('foods_image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('assets/images/FoodItems');
            $file->move($destinationPath, $fileName);
            $data['img'] = $fileName;
        } else {
            // dd($data);
            // Handle cases where image is not provided, although it's required
            return redirect()->route('backend.food.create')->with('error', 'Image is required.');
        }

        if (Food::create($data)) {
            return redirect()->route('backend.food')->with('success', 'Food item created successfully');
        } else {
            return redirect()->route('backend.food')->with('error', 'Food item creation failed');
        }
    }

    public function edit($id)
    {
        $food = Food::findOrFail($id);
        $categories = FoodCategory::orderBy('name')->get(); // Fetch all categories for the select dropdown
        return view('backend.food_edit', compact('food', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required|exists:food_categories,id',
            'price' => 'required|numeric',
            'image' => 'nullable|file|mimes:jpg,jpeg,bmp,png|max:10000'
        ]);

        $food = Food::findOrFail($id);

        $data = $request->only(['name', 'category_id', 'price']);

        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($food->img && file_exists(public_path('assets/images/FoodItems/' . $food->img))) {
                unlink(public_path('assets/images/FoodItems/' . $food->img));
            }

            // Handle the new image upload
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('assets/images/FoodItems');
            $file->move($destinationPath, $fileName);
            $data['img'] = $fileName;
        }

        $food->update($data);
        return redirect()->route('backend.food')->with('success', 'Food item updated successfully');
    }
}
