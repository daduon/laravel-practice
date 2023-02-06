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
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/style.css') }}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{ asset('web/css/responsive.css') }}">

</head>
<body style="background-color:#9e9d9d7e;">
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <table id="cart" class="table table-hover table-condensed">
                        <thead>
                            <tr>
                                <th style="width:38%">Product</th>
                                <th style="width:10%">Price</th>
                                <th style="width:20%">Quantity</th>
                                <th style="width:22%" class="text-center">Subtotal</th>
                                <th style="width:10%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php 
                                $action = "https://onlinepayment-uat.pipay.com/starttransaction";
                                $total = 0;
                                $mid = 105536;
                                $lang = "en";
                                $orderid = "";
                                $orderDesc = "product";
                                $currency = "USD";
                                $sid = 16971;
                                $did = 22779;
                                $payMethod = "hello";
                                $trType = 20;
                                $cancelTimer = 300;
                                $cancelURL = "http://127.0.0.1:8000/cart/cancel";
                                $digest = "";
                            @endphp

                            @foreach (Auth::user()->carts as $cart)

                                @php 
                                    $total += $cart->price * $cart->quantity;
                                    $orderid = Auth::user()->id;
                                    $digest = md5($mid.$orderid.$total);
                                @endphp

                                <tr>
                                    <td>
                                        <div class="row">
                                            <div class="col-6">
                                                <img src="{{ url('uploads/'.$cart->image) }}" width="100" height="50" class="img-responsive"/>
                                            </div>
                                            <div class="col-6">
                                                <h4 class="nomargin">{{ $cart->name }}</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td>${{ $cart->price }}</td>
                                    <td>
                                        <form action="{{ route('customer.update.cart',$cart->id) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="d-flex">
                                                <input type="number" name="quantity" value="{{ $cart->quantity }}" class="form-control" min="1"/>
                                                <button type="submit" class="btn btn-warning">update</button>
                                            </div>
                                        </form>
                                    </td>
                                    <td class="text-center">${{ $cart->price * $cart->quantity }}</td>
                                    <td >
                                        <form action="{{ route('customer.remove.cart',$cart->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" type="submit">Remove</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5" class="text-right"><h3><strong>Total ${{ $total }}</strong></h3></td>
                            </tr>

                            <tr>
                                <td colspan="4" class="text-right">
                                    <a href="{{ url('/') }}" class="btn btn-dark"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                                </td>
                                <td colspan="6" class="text-right">
                                    <form action="{{ $action }}" method="POST">  
                                        <input type="hidden" name="mid" value="{{ $mid }}"/>
                                        <input type="hidden" name="lang" value="{{ $lang }}"/>
                                        <input type="hidden" name="orderid" value="{{ $orderid }}"/>
                                        <input type="hidden" name="orderDesc" value="{{ $orderDesc }}"/>
                                        <input type="hidden" name="orderAmount" value="{{ $total }}"/>
                                        <input type="hidden" name="currency" value="{{ $currency }}"/>
                                        <input type="hidden" name="sid" value="{{ $sid }}"/>
                                        <input type="hidden" name="did" value="{{ $did }}"/>
                                        <input type="hidden" name="orderDate" value="{{ $date }}"/>
                                        <input type="hidden" name="payMethod" value="{{ $payMethod }}"/>
                                        <input type="hidden" name="trType" value="{{ $trType }}"/>
                                        <input type="hidden" name="cancelTimer" value="{{ $cancelTimer }}" />
                                        <input type="hidden" name="confirmURL" value="{{ route('callback') }}"/>
                                        <input type="hidden" name="cancelURL" value="{{ $cancelURL }}"/>
                                        <input type="hidden" name="payerEmail" value="da.duon1997@gmail.com">
                                        <input type="hidden" name="digest" value="{{ $digest }}"/>
                                        
                                        <div class="buttons">
                                            <div class="pull-right">
                                                <button type="submit" class="btn btn-success">Checkout</button>
                                            </div>
                                        </div>
                                    </form>   
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
