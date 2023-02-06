@extends('admins.partial.main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12  mb-3">
            <div class="btn-create">
                <a href="{{ route('admin.product') }}" class="btn btn-dark">Back</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Create Product</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <span>Name</span>
                            <input type="text" name="name" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group  mb-3">
                            <span>Price</span>
                            <input type="text" name="price" class="form-control" placeholder="Price">
                        </div>
                        <div class="form-group  mb-3">
                            <span>Description</span>
                            <input type="text" name="description" class="form-control" placeholder="Description">
                        </div>
                        <div class="form-group  mb-3">
                            <span>Category</span>
                            <select class="form-select" name="cat_id" required>
                                <option value="" selected>Select Category</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Image</label>
                            <input name="image" class="form-control" type="file" id="formFile">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-info">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection