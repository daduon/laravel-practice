<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('web/form/fonts/line-awesome/css/line-awesome.min.css') }}">

    <!-- Main Style Css -->
    <link rel="stylesheet" href="{{ asset('web/css/bootstrap.min.css') }}" />
</head>

<body>
    <div class="container my-3">
        <div class="row">
            <div class="col-12 my-3">
                <a class="btn btn-info" href="{{ url('/') }}">Back to Shop</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>User Information</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">Username: {{ $user->name }}</li>
                            <li class="list-group-item">Email: {{ $user->email }}</li>
                          </ul>
                    </div>
                </div>
                <div class="card mt-5">
                    <div class="card-header">
                        <h4>List order</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <th>#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Description</th>
                            </thead>
                            <tbody>
                                @foreach ($user->orders as $key => $order )
                                    <td>{{ $key }}</td>
                                    <td>
                                        <img src="{{ url('uploads/'.$order->image) }}" alt="" width="50px" height="50px" srcset="">
                                    </td>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->price }}</td>
                                    <td>{{ $order->quantity }}</td>
                                    <td>{{ $order->description }}</td>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
