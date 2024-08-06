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
            'google_map_link' => 'nullable|url',
            'twitter_link' => 'nullable|string',
            'github_link' => 'nullable|string',
            'linkedin_link' => 'nullable|string',
            'gmail_link' => 'nullable|string',
            'status' => 'nullable|boolean',
        ]);

        $settings = Setting::first();

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('settings', 'public');
            $settings->logo = $logoPath;
        }

        if ($request->hasFile('favicon')) {
            $faviconPath = $request->file('favicon')->store('settings', 'public');
            $settings->favicon = $faviconPath;
        }

        if ($request->hasFile('header_logo')) {
            $headerLogoPath = $request->file('header_logo')->store('settings', 'public');
            $settings->header_logo = $headerLogoPath;
        }

        $settings->fill($request->except(['logo', 'favicon', 'header_logo']));
        $settings->updated_by = Auth::id();
        $settings->save();

        return redirect()->route('backend.settings.index')->with('success', 'Settings updated successfully');
    }
}
