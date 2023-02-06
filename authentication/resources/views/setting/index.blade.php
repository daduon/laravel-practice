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
                        <h4>User Update</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Username" required />
                            </div>
                            <div class="form-group">
                                <label for="old_password">Old Password</label>
                                <input type="password" class="form-control" name="old_password" id="old_password" placeholder="Old Password" required />
                            </div>
                            <div class="form-group">
                                <label for="new_password">New Password</label>
                                <input type="password" class="form-control" name="new_password" id="new_password" placeholder="New Password" required />
                            </div>
                            <div class="form-group">
                                <label for="confirmation_password">Confirm Password</label>
                                <input type="password" class="form-control" name="confirmation_password" id="confirmation_password" placeholder="Confirm password" required />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
