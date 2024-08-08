@extends('layouts.backend_master')
@section('title', 'Food Items')
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
                            <th>Category</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <div class="form-group">
                        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#addFoodModal">Add Food Item</a>
                    </div>
                    <tbody>
                        @foreach($foods as $key => $food)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $food->name }}</td>
                            <td><img src="{{ asset('assets/images/FoodItems/' . $food->img) }}" width="50" height="50"></td>
                            <td>{{ $food->category->name ?? 'No category' }}</td>
                            <td>{{ $food->price }}</td>
                            <td>
                                <a href="{{ route('backend.food.edit', $food->id) }}" class="btn btn-primary">
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
<div class="modal fade" id="addFoodModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Food Item</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <form action="{{ route('backend.food.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="foodName">Food Name</label>
                        <input type="text" class="form-control" id="foodName" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="foodCategory">Category</label>
                        <select class="form-control" id="foodCategory" name="category_id" required>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="foodPrice">Price</label>
                        <input type="number" step="0.01" class="form-control" id="foodPrice" name="price" required>
                    </div>
                    <div class="form-group">
                        <label for="foodImage">Image</label>
                        <input type="file" class="form-control" id="foodImage" name="foods_image" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Food Item</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection