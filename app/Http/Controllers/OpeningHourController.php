<?php
namespace App\Http\Controllers;

use App\Models\OpeningHour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class OpeningHourController extends Controller
{
    public function index()
    {
        $openingHours = OpeningHour::all();
        return view('backend.opening_hours', compact('openingHours'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'day_of_week' => 'required|string',
            'opening_time' => 'required|date_format:H:i',
            'closing_time' => 'required|date_format:H:i',
        ]);
    
        $data = $request->all();
        $data['created_by'] = Auth::id();
    
        // Ensure opening_time and closing_time are in Carbon format if needed
        $data['opening_time'] = Carbon::createFromFormat('H:i', $data['opening_time'])->format('H:i');
        $data['closing_time'] = Carbon::createFromFormat('H:i', $data['closing_time'])->format('H:i');
    
        OpeningHour::create($data);
    
        return redirect()->route('backend.opening-hours')->with('success', 'Opening hour added successfully');
    }
    public function edit(OpeningHour $openingHour)
    {
        return view('backend.opening_hours_edit', compact('openingHour'));
    }    

    public function update(Request $request, OpeningHour $openingHour)
    {
        $request->validate([
            'day_of_week' => 'required|string',
            'opening_time' => 'required|date_format:H:i',
            'closing_time' => 'required|date_format:H:i',
        ]);

        $data = $request->all();
        $data['updated_by'] = Auth::id(); // Set updated_by here

        if ($openingHour->update($data)) {
            return redirect()->route('backend.opening-hours')->with('success', 'Opening hour updated successfully');
        } else {
            return redirect()->route('backend.opening-hours')->with('error', 'Opening hour update failed');
        }
    }

    public function destroy(OpeningHour $openingHour)
    {
        $openingHour->delete();

        return redirect()->route('backend.opening-hours')->with('success', 'Opening hour deleted successfully');
    }
}
