@extends('admins.partial.main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="btn-create">
                <a href="{{ route('admin.category') }}" class="btn btn-dark">Back</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Update Categoriey</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.category.update',$category->id) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <span>Category Name</span>
                            <input type="text" name="name" value="{{ $category->name }}" class="form-control" placeholder="Category Name">
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