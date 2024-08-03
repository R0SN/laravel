@extends('layouts.backend_master')
@section('title', 'Food Category')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Categories Management</h1>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header">
                List of available categories
            </div>
            <div class="card-body">
                @include('backend.includes.flash_message')
                <table class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Categories</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <div class="form-group">
                        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#addCategoryModal">Add Category</a>
                    </div>
                    <tbody>
                        @foreach($categories as $key => $category)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <!-- Trigger the specific modal for this category -->
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#editCategoryModal-{{ $category->id }}">
                                    Edit
                                </a>
                                <form style="display: inline-block" method="POST" action="{{ route('backend.category.destroy', $category->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete" class="btn btn-danger">
                                </form>
                            </td>
                        </tr>

                        <!-- Edit Category Modal for this specific category -->
                        <div class="modal fade" id="editCategoryModal-{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="editCategoryModalLabel-{{ $category->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editCategoryModalLabel-{{ $category->id }}">Edit Category</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('backend.category.update', $category->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="editCategoryName-{{ $category->id }}">Category Name</label>
                                                <input type="text" class="form-control" id="editCategoryName-{{ $category->id }}" name="name" value="{{ $category->name }}" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Add Category Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <form action="{{ route('foodCategories.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="categoryName">Category Name</label>
                        <input type="text" class="form-control" id="categoryName" name="name" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Category</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
