@extends('layouts.backend_master')

@section('title', 'Edit Opening Hour')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Edit Opening Hour</h1>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header">
                Edit Opening Hour
            </div>
            <div class="card-body">
                @include('backend.includes.flash_message')

                <!-- Back Button -->

                <form action="{{ route('backend.opening-hours.update', $openingHour->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="day_of_week">Day of Week</label>
                        <input type="text" class="form-control" id="day_of_week" name="day_of_week" value="{{ old('day_of_week', $openingHour->day_of_week) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="opening_time">Opening Time</label>
                        <input type="time" class="form-control" id="opening_time" name="opening_time" value="{{ old('opening_time', \Carbon\Carbon::parse($openingHour->opening_time)->format('H:i')) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="closing_time">Closing Time</label>
                        <input type="time" class="form-control" id="closing_time" name="closing_time" value="{{ old('closing_time', \Carbon\Carbon::parse($openingHour->closing_time)->format('H:i')) }}" required>
                    </div>
                    <a href="{{ route('backend.opening-hours') }}" class="btn btn-secondary">Back to List</a>

                    <button type="submit" class="btn btn-primary">Update Opening Hour</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
