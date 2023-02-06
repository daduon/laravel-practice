@extends('websites.partial.main')
@section('content')
    <div class="product">
        <div class="container d-flex justify-content-center">
            <div class="row">
                hello
                {{-- @foreach ($products as $product)

                    <div class="col-md-4 mt-2">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-img-actions">
                                    <img src="{{ url('uploads/' . $product->image) }}" class="card-img img-fluid" width="200"
                                        height="350" alt="">
                                </div>
                            </div>
                            <div class="card-body bg-light text-center">
                                <div class="mb-2">
                                    <h6 class="font-weight-semibold mb-2">
                                        <a href="#" class="text-default mb-2" data-abc="true">
                                            {{ $product->name }}
                                        </a>
                                    </h6>
                                    <a href="#" class="text-muted" data-abc="true">{{ $product->category->name }}</a>
                                </div>
                                <h3 class="mb-0 font-weight-semibold">${{ $product->price }}</h3>
                                <div> <i class="fa fa-star star"></i> <i class="fa fa-star star"></i> <i
                                        class="fa fa-star star"></i> <i class="fa fa-star star"></i> </div>
                                <div class="text-muted mb-3">34 reviews</div>
                                <a href="{{ route('add.to.cart',$product->id) }}" class="btn bg-cart" role="button"><i class="fa fa-cart-plus mr-2"></i>Add to cart</a>
                            </div>
                        </div>
                    </div>

                @endforeach --}}
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="{{ asset('assets/css/product.css') }}">
@endsection
