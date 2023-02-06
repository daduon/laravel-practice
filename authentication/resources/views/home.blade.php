 @extends('layouts.app')

 @section('content')
     <!-- fashion section start -->
        <div class="fashion_section">
            <div class="container">
                <h1 class="fashion_taital">Man & Woman Fashion</h1>
                <div class="fashion_section_2">
                    <div class="row">

                        @foreach ($products as $product)    

                        <div class="col-lg-4 col-sm-4">
                            <div class="box_main">
                                <h4 class="shirt_text">{{ $product->name }}</h4>
                                <p class="price_text">Price <span style="color: #262626;">$ {{ $product->price }}</span></p>
                                <div class="tshirt_img"><img src="{{ url('uploads/'.$product->image) }}"></div>
                                <div class="btn_main">
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
                                            <div class="cart" style="width: 50%;">
                                                <button type="submit" style="background-color: #dfcee4; padding: 10px;">Add To Cart</button>
                                            </div>
                                            <div class="more" style="width: 50%; text-align: right;">
                                                <a href="{{ route('product.detail',$product->id) }}">See More</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        @endforeach

                    </div>
                </div>
            </div>
        </div>
     <!-- fashion section end -->
 @endsection
