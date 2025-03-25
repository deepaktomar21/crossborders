@extends('website.layouts.app')

@section('title', 'Track Your Order')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h3 class="card-title">Track Your Order</h3>
                    <p class="text-muted">Enter your Order ID or Tracking ID to check the status of your order.</p>
        
                    {{-- Order Tracking Form --}}
                    <form action="{{ route('track.order') }}" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="tracking_id" value="{{ old('tracking_id') }}" placeholder="Enter Order ID / Tracking ID" required>
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Track Order <i class="icon-search"></i></button>
                            </div>
                        </div>
                    </form>

                    {{-- Show Validation Errors --}}
                    @if ($errors->any())
                        <div class="alert alert-danger mt-3">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
        
                    {{-- Show Order Details if Found --}}
                    @if(session('order'))
                        <div class="mt-4">
                            <h5 class="text-success">Order Details</h5>
                            <table class="table table-bordered mt-3">
                                <tr>
                                    <th>Tracking ID</th>
                                    <td>{{ session('order')->tracking_id }}</td>
                                </tr>
                                <tr>
                                    <th>Delivery Status</th>
                                    <td><strong class="text-primary">{{ session('order')->delivery_status }}</strong></td>
                                </tr>
                                <tr>
                                    <th>Last Updated</th>
                                    <td>{{ session('order')->updated_at->format('d M Y, h:i A') }}</td>
                                </tr>
                            </table>
                        </div>
                    @endif
        
                    {{-- Show Error Message if Order Not Found --}}
                    @if(session('error'))
                        <div class="alert alert-danger mt-3">{{ session('error') }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
