<?php

namespace App\Http\Controllers;

use App\Models\FoodCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FoodCategoryController extends Controller
{
    // Method to list categories
    public function index()
    {
        $categories = FoodCategory::orderBy('name')->get();
        return view('backend.foodCategory', compact('categories'));
    }

    // Method to delete a category
    public function destroy($id)
    {
        $categories = FoodCategory::findOrFail($id);
        $categories->delete();
        return redirect()->route('backend.foodCategory')->with('success', 'Category deleted successfully');
    }

    // Method to store a new category
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $data = $request->all();
        $data['created_by'] = Auth::id();

        if (FoodCategory::create($data)) {
            return redirect()->route('backend.foodCategory')->with('success', 'Category created successfully');
        } else {
            return redirect()->route('backend.foodCategory')->with('error', 'Category creation failed');
        }
    }

    // Method to update a category
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $categories = FoodCategory::findOrFail($id);
        if ($categories->update($request->all())) {
            return redirect()->route('backend.foodCategory')->with('success', 'Category updated successfully');
        } else {
            return redirect()->route('backend.foodCategory')->with('error', 'Category update failed');
        }
    }
}
