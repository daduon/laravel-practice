@extends('admins.partial.main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mb-3">
            <div class="btn-create">
                <a href="{{ route('admin.product.create') }}" class="btn btn-primary">Add Products</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>List Products</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Category Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td><img src="{{ url('uploads/'.$product->image) }}" alt="" srcset="" width="80" height="50"></td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>
                                    
                                    <form action="{{ route('admin.product.destroy',$product->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('admin.product.show',$product->id) }}" class="btn btn-info">Show</a>
                                        <a href="{{ route('admin.product.edit',$product->id) }}" class="btn btn-warning">Edit</a>
                                        <button class="btn btn-danger" type="submit">Delete</button>
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
</div>
@endsection