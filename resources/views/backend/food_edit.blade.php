@extends('layouts.backend_master')
@section('title', 'Edit Food Item')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Edit Food Item</h1>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header">
                Edit Food Item
            </div>
            <div class="card-body">
                @include('backend.includes.flash_message')
                <form action="{{ route('backend.food.update', $food->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="foodName">Food Name</label>
                        <input type="text" class="form-control" id="foodName" name="name" value="{{ old('name', $food->name) }}" required>
                        @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="foodCategory">Category</label>
                        <select class="form-control" id="foodCategory" name="category_id" required>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $food->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                        @if ($errors->has('category_id'))
                        <span class="text-danger">{{ $errors->first('category_id') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="foodPrice">Price</label>
                        <input type="number" step="0.01" class="form-control" id="foodPrice" name="price" value="{{ old('price', $food->price) }}" required>
                        @if ($errors->has('price'))
                        <span class="text-danger">{{ $errors->first('price') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="foodImage">Image</label>
                        <input type="file" class="form-control" id="foodImage" name="image">
                        @if ($food->img)
                        <img src="{{ asset('assets/images/FoodItems/' . $food->img) }}" width="50" height="50">
                        @endif
                        @if ($errors->has('foods_image'))
                        <span class="text-danger">{{ $errors->first('foods_image') }}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Update Food Item</button>
                    <a href="{{ route('backend.food') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection