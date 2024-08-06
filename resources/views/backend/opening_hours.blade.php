@extends('layouts.backend_master')
@section('title', 'Opening Hours')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Opening Hours Management</h1>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header">
                List of Opening Hours
            </div>
            <div class="card-body">
                @include('backend.includes.flash_message')
                <div class="form-group">
                    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#addOpeningHourModal">Add Opening Hour</a>
                </div>

                <table class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Day of Week</th>
                            <th>Opening Time</th>
                            <th>Closing Time</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($openingHours as $key => $openingHour)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $openingHour->day_of_week }}</td>
                            <td>{{ \Carbon\Carbon::parse($openingHour->opening_time)->format('H:i') }}</td>
                            <td>{{ \Carbon\Carbon::parse($openingHour->closing_time)->format('H:i') }}</td>
                            <td>
                                <a href="{{ route('backend.opening_hours.edit', $openingHour->id) }}" class="btn btn-primary">
                                    Edit
                                </a>
                                <form style="display: inline-block" method="POST" action="{{ route('backend.opening-hours.destroy', $openingHour->id) }}">
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
<div class="modal fade" id="addOpeningHourModal" tabindex="-1" role="dialog" aria-labelledby="addOpeningHourLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('backend.opening-hours.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="day_of_week">Day of Week</label>
                        <input type="text" class="form-control" id="day_of_week" name="day_of_week" required>
                    </div>
                    <div class="form-group">
                        <label for="opening_time">Opening Time</label>
                        <input type="time" class="form-control" id="opening_time" name="opening_time" required>
                    </div>
                    <div class="form-group">
                        <label for="closing_time">Closing Time</label>
                        <input type="time" class="form-control" id="closing_time" name="closing_time" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Opening Hour</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection