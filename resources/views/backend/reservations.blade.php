@extends('layouts.backend_master')
@section('title', 'Reservations')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Reservation Management</h1>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header">
                List of Reservations
            </div>
            <div class="card-body">
                @include('backend.includes.flash_message')
                <table class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>State</th>
                            <th>Reservation Date</th>
                            <th>Phone</th>
                            <th>Guest Number</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reservations as $key => $reservation)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $reservation->fname }}</td>
                            <td>{{ $reservation->lname }}</td>
                            <td>{{ $reservation->state }}</td>
                            <td>{{ $reservation->reservation_date_and_time }}</td>
                            <td>{{ $reservation->phone }}</td>
                            <td>{{ $reservation->guest_number }}</td>
                            <td>{{ $reservation->email }}</td>
                            <td>{{ $reservation->subject }}</td>
                            <td>
                                <form style="display: inline-block" method="POST" action="{{ route('backend.destroyReservation', $reservation->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete" class="btn btn-danger">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection