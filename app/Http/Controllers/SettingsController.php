<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Setting::first(); // Get the first record, assuming there's only one settings record
        return view('backend.setting', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'website_name' => 'required|string',
            'slogan' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'favicon' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'header_logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'about_website' => 'nullable|string',
            'about_beer' => 'nullable|string',
            'about_bread' => 'nullable|string',
            'food_description' => 'nullable|string',
            'google_map_link' => 'nullable|string',
            'twitter_link' => 'nullable|string',
            'github_link' => 'nullable|string',
            'linkedin_link' => 'nullable|string',
            'gmail_link' => 'nullable|string',
            'status' => 'nullable|boolean',
        ]);

        $settings = Setting::first();
        $data = $request->all();

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('assets/frontend/images');
            $file->move($destinationPath, $fileName);
            $data['logo'] = $fileName;
        }

        if ($request->hasFile('favicon')) {
            $file = $request->file('favicon');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('assets/frontend/images');
            $file->move($destinationPath, $fileName);
            $data['favicon'] = $fileName;
        }

        if ($request->hasFile('header_logo')) {
            $file = $request->file('header_logo');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('assets/frontend/images');
            $file->move($destinationPath, $fileName);
            $data['header_logo'] = $fileName;
        }

        $settings->update($data);

        return redirect()->route('backend.settings')->with('success', 'Settings updated successfully');
    }
}
