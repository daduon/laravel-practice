<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6 mt-5">
                    <form method="post" action="{{ route('websites.customer_login') }}">
                        <div class="card shadow">
                            <div class="car-header bg-success pt-2">
                                <div class="card-title font-weight-bold text-white text-center"> User Login </div>
                            </div>
        
                            <div class="card-body">
                                    @if(Session::has('error'))
                                        <div class="alert alert-danger">
                                            {{ Session::get('error') }}
                                            @php
                                                Session::forget('error');
                                            @endphp
                                        </div>
                                    @endif
        
        
                                <div class="form-group">
                                    <label for="email"> E-mail </label>
                                    <input type="text" name="email" id="email" class="form-control" placeholder="Enter E-mail" value="{{ old('email') }}"/>
                                    {!! $errors->first('email', '<small class="text-danger">:message</small>') !!}
                                </div>
        
                                <div class="form-group">
                                    <label for="password"> Password </label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" value="{{ old('password') }}"/>
                                    {!! $errors->first('password', '<small class="text-danger">:message</small>') !!}
                                </div>
                            </div>
        
                            <div class="card-footer d-inline-block">
                                <button type="submit" class="btn btn-success"> Login </button>
                                <p class="float-right mt-2"> Don't have an account?  <a href="{{ route('website.register') }}" class="text-success"> Register </a> </p>
                            </div>
                            @csrf
                        </div>
                    </form>
                </div>
                <div class="col-3"></div>
            </div>
        </div>
    </body>
</html>

