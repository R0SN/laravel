@extends('layouts.backend_master')
@section('title', 'Food Category')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Food Management</h1>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header">
                List of available food
            </div>
            <div class="card-body">
                @include('backend.includes.flash_message')
                <table class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <div class="form-group">
                        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#addCategoryModal">Add Food Item</a>
                    </div>
                    <tbody>
                        @foreach($foods as $key => $food)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $food->name }}</td>
                            <td><img src="{{ asset('assets/images/FoodItems/' . $food->image) }}" width="50" height="50"></td>
                            <td>{{ $food->price }}</td>
                            <td>
                                <!-- Trigger the specific modal for this category -->
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#editCategoryModal-{{ $food->id }}">
                                    Edit
                                </a>
                                <form style="display: inline-block" method="POST" action="{{ route('backend.food.destroy', $food->id) }}">
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
