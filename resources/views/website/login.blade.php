@extends('website.layouts.app')

@section('title', 'Log in')

@section('content')
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="form-box shadow-lg p-4 rounded bg-white">
        <div class="form-tab">
            <!-- Navigation -->

            <ul class="nav nav-pills nav-fill mb-3" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin" role="tab"
                        aria-controls="signin" aria-selected="true">Sign In</a>
                </li>
            </ul>

            <div class="tab-content" id="tab-content-5">
                <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                    <form action="{{ route('loginUser') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="login">Email or Phone Number *</label>
                            <input type="text" class="form-control @error('login') is-invalid @enderror" id="login" name="login" value="{{ old('login') }}" required>
                            @error('login')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    
                        <div class="form-group">
                            <label for="signin-password">Password *</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="signin-password" name="password" required>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="signin-remember" name="remember">
                                <label class="custom-control-label" for="signin-remember">Remember Me</label>
                            </div>
                            <a href="{{ route('showForgotPasswordForm') }}" class="forgot-link text-primary">Forgot Your Password?</a>
                        </div>
                    
                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-primary btn-block">
                                <span>LOG IN</span>
                                <i class="icon-long-arrow-right"></i>
                            </button>
                        </div>
                    
                        <div class="text-center mt-3">
                            <span>Don't have an account?</span>
                            <a href="{{ route('register') }}" class="btn btn-primary btn-block">Register</a>
                        </div>
                    </form>
                    
                </div>
            </div>
            
        </div>
    </div>
</div>

<style>
    .form-box {
        max-width: 400px;
        width: 100%;
    }

</style>

@endsection