@extends('admins.layouts.app')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 mb-3">
            <a href="{{ route('products.create') }}" class="create_product btn btn-primary">Create Product</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="validate">
                @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                    @php
                        Session::forget('success');
                    @endphp
                </div>
                @endif
            </div>
            <div class="card">
                <div class="card-header">
                    <h5>List Product</h5>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>
                                    <img src="{{ url('uploads/'.$product->image) }}" alt="" srcset="" width="80" height="50">
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>
                                    <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('products.edit',$product->id) }}" class="btn btn-warning">Edit</a>
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
