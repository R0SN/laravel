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
        // Send data from controller to view
        return view('backend.foodCategory', compact('categories'));
    }

    // Method to delete a category
    public function destroy($id)
    {
        $categories = FoodCategory::findOrFail($id);
        $categories->delete();
        return redirect()->route('backend.foodCategory')->with('success', 'Category deleted successfully');
    }

    // Method to show the edit form
    public function edit($id)
    {
        $categories = FoodCategory::findOrFail($id);
        return view('backend.foodCategory', compact('categories'));
    }
    

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $data = $request->all();
        $data['created_by'] = Auth::id(); // Ensure `created_by` is set to authenticated user ID

        // if ($request->hasFile('image')) {
        //     $file = $request->file('image');
        //     $fileName = time() . '_' . $file->getClientOriginalName();
        //     $file->move(public_path('assets/images/coffee'), $fileName);
        //     $data['image'] = $fileName;
        // }

        if (FoodCategory::create($data)) {
            $request->session()->flash('success', 'Category created successfully');
        } else {
            $request->session()->flash('error', 'Category creation failed');
        }

        return redirect()->route('backend.foodCategory');
    }
    

    // Method to update a category
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $categories = FoodCategory::findOrFail($id);
        if ($categories->update($request->all())) {
            return redirect()->route('backend.foodCategory')->with('success', 'Category updated successfully');
        } else {
            return redirect()->route('backend.foodCategory')->with('error', 'Category update failed');
        }
    }
}


