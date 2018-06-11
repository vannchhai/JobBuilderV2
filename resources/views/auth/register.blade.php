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
<div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-6 cd-user-modal page-login-form">


<div class="my-account-form">
<div class="cd-switcher">
<a href="#0" class="text-center">REGITER FOR EMPLOYER</a>
</div>
<br><br>
   
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

    <input type="hidden" name="user_type_id" value="2"/>
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

</div>
</div>
</div>
</div>
</div>

@endsection
