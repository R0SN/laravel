<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function showReservations()
    {
        $reservations = Reservation::orderBy('reservation_date_and_time')->get();
        return view('backend.reservations', compact('reservations'));
    }
    public function destroyReservation($id)
    {
        $reservation = Reservation::find($id);

        if (!$reservation) {
            return redirect()->route('backend.reservations')->with('error', 'Reservation  deletion unsuccessful');
        }

        $reservation->delete();

        return redirect()->route('backend.reservations')->with('success', 'Reservation  deleted successfully');
    }
}
