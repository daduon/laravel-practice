@extends('admins.partial.main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mb-3">
            <div class="btn-create">
                <a href="{{ route('admin.product') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Product Detail</h4>
                </div>
                <div class="card-body">
                    <p>Product Id: {{ $product->id }}</p>
                    <br>
                    <p>Product Name: {{ $product->name }}</p>
                    <br>
                    <p>Product Price: {{ $product->price }}</p>
                    <br>
                    <p>Product Description:{{ $product->description }}</p>
                    <br>
                    <p>Category Name: {{ $product->category->name }}</p>
                    <br>
                    <img src="{{ url('uploads'.$product->image) }}" alt="" width="100" height="100" srcset="">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection