@extends('admin.partials.layout')

@section('title', 'View Order Details')

@section('content')
<div class="content-wrapper">
    <div class="page-heading">
        <h1 class="page-title">Buy Order Details</h1>
    </div>
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Order Details</div>
            <div>
                <a href="javascript:history.back();" class="btn btn-primary">Back</a>
            </div>
            
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
        </div>
        <div class="ibox-body">
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <strong><label for="country">Country</label></strong>
                    <input type="text" name="country_id" id="country_id" class="form-control" value="{{ $order->country->name }}" disabled>
                </div>
            
                <div class="col-md-6 mb-3">
                    <strong><label for="service">Service</label></strong>
                    <input type="text" name="service" id="service" class="form-control" value="{{ $order->service->name }}" disabled>
                </div>
            </div>
            
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <strong><label for="buyer_name">Buyer Name</label></strong>
                    <input type="text" name="buyer_name" id="buyer_name" class="form-control" value="{{ $order->buyer_name }}" disabled>
                </div>
            
                <div class="col-md-6 mb-3">
                    <strong><label for="buyer_phone">Buyer Phone</label></strong>
                    <input type="text" name="buyer_phone" id="buyer_phone" class="form-control" value="{{ $order->buyer_phone }}" disabled>
                </div>
            </div>
            
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <strong><label for="buyer_email">Buyer Email</label></strong>
                    <input type="text" name="buyer_email" id="buyer_email" class="form-control" value="{{ $order->buyer_email }}" disabled>
                </div>
            
                <div class="col-md-6 mb-3">
                    <strong><label for="house_address">House Address</label></strong>
                    <input type="text" name="house_address" id="house_address" class="form-control" value="{{ $order->house_address }}" disabled>
                </div>
            </div>
            
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <strong><label for="apartment_suite">Apartment/Suite</label></strong>
                    <input type="text" name="apartment_suite" id="apartment_suite" class="form-control" value="{{ $order->apartment_suite }}" disabled>
                </div>
            
                <div class="col-md-6 mb-3">
                    <strong><label for="city">City</label></strong>
                    <input type="text" name="city" id="city" class="form-control" value="{{ $order->city }}" disabled>
                </div>
            </div>
            
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <strong><label for="state">State</label></strong>
                    <input type="text" name="state" id="state" class="form-control" value="{{ $order->state }}" disabled>
                </div>
            
                <div class="col-md-6 mb-3">
                    <strong><label for="postcode">Postcode</label></strong>
                    <input type="text" name="postcode" id="postcode" class="form-control" value="{{ $order->postcode }}" disabled>
                </div>
            </div>
            
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <strong><label for="item_category">Item Category</label></strong>
                    <input type="text" name="item_category_id" id="item_category_id" class="form-control" value="{{ $order->item_category_id }}" disabled>
                </div>
            
                <div class="col-md-6 mb-3">
                    <strong><label for="product_name">Product Name</label></strong>
                    <input type="text" name="product_name" id="product_name" class="form-control" value="{{ $order->product_name }}" disabled>
                </div>
            </div>
            
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <strong><label for="product_url">Product URL</label></strong>
                    <input type="text" name="product_url" id="product_url" class="form-control" value="{{ $order->product_url }}" disabled>
                </div>
            
                <div class="col-md-6 mb-3">
                    <strong><label for="admin_suggestion">Admin Suggestion</label></strong>
                    <input type="text" name="admin_suggestion" id="admin_suggestion" class="form-control" value="{{ $order->admin_suggestion }}" disabled>
                </div>
            </div>
            
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <strong><label for="preferred_brand">Preferred Brand</label></strong>
                    <input type="text" name="preferred_brand" id="preferred_brand" class="form-control" value="{{ $order->preferred_brand }}" disabled>
                </div>
            
                <div class="col-md-6 mb-3">
                    <strong><label for="specific_details">Specific Details</label></strong>
                    <input type="text" name="specific_details" id="specific_details" class="form-control" value="{{ $order->specific_details }}" disabled>
                </div>
            </div>
            
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <strong><label for="price_range">Price Range</label></strong>
                    <input type="text" name="price_range" id="price_range" class="form-control" value="{{ $order->price_range }}" disabled>
                </div>
            
                <div class="col-md-6 mb-3">
                    <strong><label for="size">Size</label></strong>
                    <input type="text" name="size" id="size" class="form-control" value="{{ $order->size }}" disabled>
                </div>
            </div>
            
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <strong><label for="weight">Weight</label></strong>
                    <input type="text" name="weight" id="weight" class="form-control" value="{{ $order->weight }}" disabled>
                </div>
            
                <div class="col-md-6 mb-3">
                    <strong><label for="delivery_mode">Delivery Mode</label></strong>
                    <input type="text" name="delivery_mode" id="delivery_mode" class="form-control" value="{{ $order->delivery_mode }}" disabled>
                </div>
            </div>
            
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <strong><label for="product_image">Product Image</label></strong><br>
                    @if($order->product_image)
                        <img src="{{ asset('storage/' . $order->product_image) }}" alt="Product Image" class="img-thumbnail" width="150">
                    @else
                        <p>No image uploaded</p>
                    @endif
                </div>
            </div>
            
        </div>
        
    </div>
</div>
@endsection
