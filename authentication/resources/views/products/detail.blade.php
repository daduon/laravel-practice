<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/bootstrap.min.css') }}">

</head>
<body style="background-color:#9e9d9d7e;">
    <div class="container" style="margin-top: 150px;">
        <div class="row">
            <div class="col-12">
                <div class="card p-3">
                    <div class="row">
                        <div class="col-6">
                            <div class="img">
                                <img src="{{ url('uploads/'.$product->image) }}" alt="" width="300" height="300" srcset="">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="cat mb-4">
                                <p><b>Category</b></p>
                                <span>{{ $product->category->name }}</span>
                            </div>
                            <div class="title mb-4">
                                <h2>{{ $product->name }}</h2>
                            </div>
                            <div class="price">
                                <h3 class="text-warning">${{ $product->price }}</h3>
                            </div>
                            <div class="dsc">
                                <p><b>Description</b></p>
                                <span>{{ $product->description }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6"></div>
                        <div class="col-6 d-flex text-right">
                            <a href="{{ url('/') }}" class="btn btn-dark"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                            @php
                                $quantity = 1;
                            @endphp
                            <form action="{{ route('customer.add.to.cart') }}" method="POST" id="add-to-cart" style="width: 100%;">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="pro_id" value="{{ $product->id }}">
                                <input type="hidden" name="cat_id" value="{{ $product->cat_id }}">
                                <input type="hidden" name="name" value="{{ $product->name }}">
                                <input type="hidden" name="price" value="{{ $product->price }}">
                                <input type="hidden" name="quantity" value="{{ $quantity }}">
                                <input type="hidden" name="description" value="{{ $product->description }}">
                                <input type="hidden" name="image" value="{{ $product->image }}">
                                <div class="action d-flex">
                                    <div class="cart" style="width: 100%;">
                                        <button type="submit" class="btn btn-info">Add To Cart</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>