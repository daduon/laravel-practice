

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
				<p class="text-1">Sign In</p>
				<p class="text-2">Privaci policy & Term of service</p>
			</div>
			<form class="form-detail" action="{{ route('register') }}" method="POST">
                @csrf
				<div class="form-row">
					<label for="name">USERNAME</label>
					<input type="text" name="name" id="name" value="{{ old('name') }}" class="input-text @error('name') is-invalid @enderror" required>
				
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>
				<div class="form-row">
					<label for="email">E-MAIL</label>
					<input type="text" name="email" id="email" value="{{ old('email') }}" class="input-text @error('email') is-invalid @enderror" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
				
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    
                </div>
				<div class="form-row">
					<label for="password">PASSWORD</label>
					<input type="password" name="password" id="password" class="input-text @error('password') is-invalid @enderror" required>

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

				</div>
				<div class="form-row">
					<label for="password_confirmation">CONFIRM PASSWORD</label>
					<input type="password" name="password_confirmation" id="password_confirmation" class="input-text" required>
				</div>
				<div class="form-row-last">
					<button type="submit" class="register" style="padding: 15px">Sign Up</button>
					<p>Or<a href="{{ route('login') }}">Sign in</a></p>
				</div>
			</form>
		</div>
	</div>
</body>
</html>