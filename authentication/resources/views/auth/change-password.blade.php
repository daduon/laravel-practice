{{-- <!doctype html>
<html lang="en">
  <head>
    <title>Programming Fields | Login Form | Password Reset | </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>

    <div class="container py-5">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 m-auto">
                <form action="{{ route('reset-password') }}" method="post" autocomplete="off">
                    @csrf
                    @method('PUT')
                    <div class="card shadow">

                        @if (Session::has("success"))
                            <div class="alert alert-success alert-dismissible fade show">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                {{ Session::get('success') }}
                            </div>
                        @elseif (Session::has("failed"))
                            <div class="alert alert-danger alert-dismissible fade show">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                {{ Session::get('failed') }}
                            </div>
                        @endif

                        <div class="card-header">
                            <h5 class="card-title"> Change Password </h5>
                        </div>

                        <div class="card-body px-4">

                            <input type="hidden" name="email" value="{{ $email }} "/>

                            <div class="form-group py-2">
                                <label> Password </label>
                                <input type="password" name="password" class="form-control {{$errors->first('password') ? 'is-invalid' : ''}}" value="{{ old('password') }}" placeholder="New Password">
                                    {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            <div class="form-group py-2">
                                <label> Confirm Password </label>
                                <input type="password" name="confirm_password" class="form-control {{$errors->first('confirm_password') ? 'is-invalid' : ''}}" value="{{ old('confirm_password') }}" placeholder="Confirm Password">
                                {!! $errors->first('confirm_password', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary"> Change Password </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html> --}}



<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Font-->
	<link rel="stylesheet" type="text/css" href="{{ asset('web/form/css/opensans-font.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('web/form/fonts/line-awesome/css/line-awesome.min.css') }}">

	<!-- Main Style Css -->
    <link rel="stylesheet" href="{{ asset('web/form/css/style.css') }}"/>

</head>
<body class="form-v7">
	<div class="page-content">
		<div class="form-v7-content">
			<div class="form-left">
				<img src="{{ url('web/form/images/form-v7.jpg') }}" alt="form">
				<p class="text-1">Change Your Password</p>
				<p class="text-2">Privaci policy & Term of service</p>
			</div>
			<form class="form-detail" action="{{ route('reset-password') }}" method="POST" autocomplete="off">
                @csrf
                @method('PUT')
                <div class="message">
                    @if (Session::has("success"))
                    <div class="alert alert-success alert-dismissible fade show" style="background: #30e899;padding: 10px 30px;margin-bottom: 50px;">
                        {{ Session::get('success') }}
                        </div>
                    @elseif (Session::has("failed"))
                        <div class="alert alert-danger alert-dismissible fade show" style="background: #e01f3f;padding: 10px 30px;margin-bottom: 50px;">
                            {{ Session::get('failed') }}
                        </div>
                    @endif
                </div>
                <input type="hidden" name="email" value="{{ $email }} "/>
				<div class="form-row">
					<label for="password">PASSWORD</label>
					<input type="password" name="password" id="password" value="{{ old('password') }}" class="input-text {{$errors->first('password') ? 'is-invalid' : ''}}" placeholder="New Password" required>

                    {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}

				</div>
				<div class="form-row">
					<label for="confirm_password">CONFIRM PASSWORD</label>
					<input type="password" name="confirm_password" id="confirm_password" value="{{ old('confirm_password') }}" class="input-text  {{$errors->first('confirm_password') ? 'is-invalid' : ''}}" placeholder="Confirm Password" required>
				</div>
				<div class="form-row-last">
					<button type="submit" class="register" style="padding: 15px">Change Password</button>
				</div>
			</form>
		</div>
	</div>
</body>
</html>