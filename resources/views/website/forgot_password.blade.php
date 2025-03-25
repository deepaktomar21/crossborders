@extends('website.layouts.app')

@section('title', 'Forgot Password')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="form-box shadow-lg p-4 rounded bg-white">
        <div class="form-tab text-center">
            <h4 class="mb-3">Forgot Password</h4>
            
            {{-- Flash Messages --}}
            @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('otp_sent') && session('otp'))
                <div class="alert alert-info">
                    <strong>OTP Sent!</strong> <br>
                    Your OTP is: <span style="color: black; font-weight: bold;">{{ session('otp') }}</span>

                </div>
            @endif

            <div class="login_form mt-3">
                @if (session('otp_sent'))
                    {{-- Update Password Form --}}
                    <form action="{{ url('/forgotpasswordsendOtp') }}" method="POST">
                        @csrf
                        <input type="hidden" name="email_or_phone" value="{{ session('email_or_phone') }}">
            
                        <div class="mb-3">
                            <label for="otp" class="form-label">Enter OTP</label>
                            <input type="text" name="otp" id="otp" class="form-control" required>
                        </div>
            
                        <div class="mb-3">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
            
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm New Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                        </div>
            
                        <button type="submit" class="btn btn-primary w-100">Update Password</button>
                    </form>
                @else
                    {{-- Send OTP Form --}}
                    <form action="{{ url('/forgotpasswordsendOtp') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email_or_phone" class="form-label">Email or Phone</label>
                            <input type="text" name="email_or_phone" id="email_or_phone" class="form-control" required value="{{ old('email_or_phone') }}">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Send OTP</button>
                    </form>
                @endif
            </div>
            
        </div>
    </div>
</div>

<style>
    .form-box {
        max-width: 400px;
        width: 100%;
        border-radius: 10px;
    }
    .btn {
        border-radius: 5px;
    }
</style>
@endsection