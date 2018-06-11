@extends('layouts.master')

@section('content')


<div class="container">
<div class="row">
<div class="col-md-12">
<div class="breadcrumb-wrapper">
<h2 class="product-title">My Account</h2>
<ol class="breadcrumb">
<li><a href="#"><i class="ti-home"></i> Home</a></li>
<li class="current">My Account</li>
</ol>
</div>
</div>
</div>
</div>
</div>

<div id="content" class="my-account">
<div class="container">
<div class="row">
<div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-6 cd-user-modal">


<div class="my-account-form">
<ul class="cd-switcher">
<li><a class="selected" href="#0">LOGIN</a></li>
<li><a href="#0">REGITER FOR CANDIDATE</a></li>
</ul>

<div id="cd-login" class="is-selected">
<div class="page-login-form">
<form role="form" class="login-form"  method="POST" action="{{ route('login') }}">
     @csrf
	<div class="form-group">
		<div class="input-icon">
		<i class="ti-user"></i>
		<input type="email" id="sender-email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

		@if ($errors->has('email'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
		</div>
	</div>
	<div class="form-group">
		<div class="input-icon">
			<i class="ti-lock"></i>
			<input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
		</div>

		@if ($errors->has('password'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
	</div>
	<button class="btn btn-common log-btn" type="submit">Login</button>
	<div class="checkbox-item">
		<div class="checkbox">
			<label for="rememberme" class="rememberme">
			<input name="rememberme" id="rememberme" value="forever" type="checkbox" {{ old('remember') ? 'checked' : '' }}> Remember Me</label>
		</div>
		<p class="cd-form-bottom-message">
			<a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
		</p>
	</div>
</form>
</div>
</div>

<div id="cd-signup">
<div class="page-login-form register">
<form role="form" class="login-form" method="POST" action="{{ route('register') }}">
    @csrf

	<div class="form-group">
	<div class="input-icon">
	<i class="ti-user"></i>
	<input type="text" id="sender-email" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder="User Name">
	 @if ($errors->has('name'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
	</div>
	</div>
	<div class="form-group">
	<div class="input-icon">
	<i class="ti-email"></i>
	<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Email...">

	@if ($errors->has('email'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif

	</div>

	<input type="hidden" name="user_type_id" value="3"/>
	</div>

	<div class="form-group">
	<div class="input-icon">
	<i class="ti-mobile"></i>
	<input id="email" type="number" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required placeholder="Phone...">

	@if ($errors->has('phone'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('phone') }}</strong>
        </span>
    @endif

	</div>
	</div>
	<div class="form-group">
	<div class="input-icon">
	<i class="ti-lock"></i>
	<input id="password" placeholder="Password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

    @if ($errors->has('password'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
    @endif
	</div>
	</div>
	<div class="form-group">
	<div class="input-icon">
	<i class="ti-lock"></i>
	<input id="password-confirm" placeholder="Repeat Password" type="password" class="form-control" name="password_confirmation" required>
	</div>
	</div>
	<button class="btn btn-common log-btn" type="submit">Register</button>
</form>
</div>
</div>
<div class="page-login-form" id="cd-reset-password"> 
<p class="cd-form-message">Lost your password? Please enter your email address. You will receive a link to create a new password.</p>
<form class="cd-form">
<div class="form-group">
<div class="input-icon">
<i class="ti-email"></i>
<input type="text" id="sender-email" class="form-control" name="email" placeholder="Email">
</div>
</div>
<p class="fieldset">
<button class="btn btn-common log-btn" type="submit">Reset password</button>
</p>
</form>
<p class="cd-form-bottom-message"><a href="#0">Back to log-in</a></p>
</div> 
</div>
</div>
</div>
</div>
</div>

@endsection
