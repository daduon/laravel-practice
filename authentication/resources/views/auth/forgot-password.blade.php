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
	<!-- Jquery -->
	<link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="{{ asset('web/form/css/style.css') }}"/>

</head>
<body class="form-v7">
	<div class="page-content">
		<div class="form-v7-content">
			<div class="form-left">
				<img src="{{ url('web/form/images/form-v7.jpg') }}" alt="form">
				<p class="text-1">Reset Password</p>
				<p class="text-2">Privaci policy & Term of service</p>
			</div>
			<form class="form-detail" action="{{ route('forgot-password') }}" method="post" autocomplete="off">
                @csrf
                <div class="message">
                    @if (Session::has("success"))
                    <div class="alert alert-success alert-dismissible fade show" style="background: #30e899;padding: 10px 30px;margin-bottom: 50px;">
                        {{ Session::get('success') }}
                    </div>
                    @elseif (Session::has("failed"))
                    <div class="alert alert-danger alert-dismissible fade show bg-danger" style="background: #d41a1abb;padding: 10px 30px;margin-bottom: 50px;">
                        {{ Session::get('failed') }}
                    </div>
                    @endif
                </div>
				<div class="form-row">
					<label for="email">E-MAIL</label>
					<input type="text" name="email" id="email" value="{{ old('email') }}" class="input-text {{$errors->first('email') ? 'is-invalid' : ''}}" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
                    
                    {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}

                </div>
				<div class="form-row-last">
                    <button type="submit" class="register" style="padding:15px">
                        Reset Password
                    </button>
					<p>Or<a href="{{ route("register") }}">Back to Login</a></p>
				</div>
			</form>
		</div>
	</div>
</body>
</html>