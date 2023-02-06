@extends('websites.partial.main')
@section('content')
<div class="container" style="margin-top: 150px;">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <table id="cart" class="table table-hover table-condensed">
                    <thead>
                        <tr>
                            <th style="width:50%">Product</th>
                            <th style="width:10%">Price</th>
                            <th style="width:8%">Quantity</th>
                            <th style="width:22%" class="text-center">Subtotal</th>
                            <th style="width:10%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php 
                            $action = "https://onlinepayment-uat.pipay.com/starttransaction";
                            $total = 0;
                            $mid = 105375;
                            $lang = "en";
                            $orderid = "";
                            $orderDesc = "product";
                            $currency = "USD";
                            $sid = 16649;
                            $did = 22475;
                            $payMethod = "wallet";
                            $trType = 2;
                            $cancelTimer = 300;
                            $cancelURL = "http://127.0.0.1:8000/cart/cancel";
                            $digest = "";
                        @endphp
                        @if(session('cart'))
                            @foreach(session('cart') as $id => $details)
                                @php 
                                    $total += $details['price'] * $details['quantity'];
                                    $orderid = $id;
                                    $digest = md5($mid.$orderid.$total);
                                @endphp
                                <tr data-id="{{ $id }}">
                                    <td data-th="Product">
                                        <div class="row">
                                            <div class="col-sm-3 hidden-xs"><img src="{{ url('uploads/'.$details['image']) }}" width="100" height="50" class="img-responsive"/></div>
                                            <div class="col-sm-9">
                                                <h4 class="nomargin">{{ $details['name'] }}</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-th="Price">${{ $details['price'] }}</td>
                                    <td data-th="Quantity">
                                        <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" />
                                    </td>
                                    <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>
                                    <td class="actions" data-th="">
                                        <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i>Remove</button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5" class="text-right"><h3><strong>Total ${{ $total }}</strong></h3></td>
                        </tr>

                        <tr>
                            <td colspan="4" class="text-right">
                                <a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
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
@endsection

@section('scripts')
<script type="text/javascript">
  
    $(".update-cart").change(function (e) {
        e.preventDefault();
        var ele = $(this);
        $.ajax({
            url: '{{ route('update.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });
  
    $(".remove-from-cart").click(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        if(confirm("Are you sure want to remove?")) {
            $.ajax({
                url: '{{ route('remove.from.cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
  
</script>
@endsection
