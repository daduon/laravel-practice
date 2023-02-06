<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form method="post" action=" {{ url('user-store') }} ">
                        <div class="card shadow mb-4">
                            <div class="car-header bg-success pt-2">
                                <div class="card-title font-weight-bold text-white text-center"> Laravel 6 User Registration </div>
                            </div>
        
                            <div class="card-body">
        
                                    @if(Session::has('success'))
                                        <div class="alert alert-success">
                                            {{ Session::get('success') }}
                                            @php
                                                Session::forget('success');
                                            @endphp
                                        </div>
                                    @endif
        
                                <div class="form-group">
                                    <label for="name"> Last Name </label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" value="{{ old('name') }}"/>
                                    {!! $errors->first('name', '<small class="text-danger">:message </small>') !!}
                                </div>
        
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
        
                                <div class="form-group">
                                    <label for="confirm_password"> Confirm Password </label>
                                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password" value="{{ old('confirm_password') }}">
                                    {!! $errors->first('confirm_password', '<small class="text-danger">:message</small>') !!}
                                </div>
                            </div>
        
                            <div class="card-footer d-inline-block">
                                <button type="submit" class="btn btn-success"> Register </button>
                            <p class="float-right mt-2"> Already have an account?  <a href="{{ url('user-login')}}" class="text-success"> Login </a> </p>
                            </div>
                            @csrf
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
