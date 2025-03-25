@extends('admin.partials.layout')

@section('title', 'View Order Details')

@section('content')
<div class="content-wrapper">
    <div class="page-heading">
        <h1 class="page-title">Express Delivery Order Details</h1>
        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    </div>
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Order Details</div>
            <div>
                <a href="{{ route('admin.expressorders.shippingindex') }}" class="btn btn-primary">Back</a>
            </div>
           
        </div>
        <form action="{{ route('admin.expressorders.shippingupdate', $order->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="ibox-body">
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <strong><label for="tracking_id">Tracking ID</label></strong>
                        <input type="text" id="tracking_id" name="tracking_id" class="form-control" value="{{ $order->tracking_id }}"  disabled>
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong><label for="order_status">Order Status</label></strong>
                        <input type="text" id="order_status" name="order_status" class="form-control" value="{{ $order->order_status }}"  disabled>
                    </div>
                </div>
        
                <div class="form-group">
                    
                        <strong><label for="delivery_status">Delivery Status</label></strong>
                        <input type="text" id="delivery_status" name="delivery_status" class="form-control" value="{{ $order->delivery_status }}" disabled>
                   
                   
                </div>
        
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <strong><label for="delivery_product_type">Delivery Product Type</label></strong>
                        <input type="text" id="delivery_product_type" name="delivery_product_type" class="form-control" value="{{ $order->delivery_product_type }}" disabled>
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong><label for="express_category">Express Category</label></strong>
                        <input type="text" id="express_category" name="express_category" class="form-control" value="{{ $order->express_category }}" disabled>
                    </div>
                </div>
        
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <strong><label for="sender_name">Sender Name</label></strong>
                        <input type="text" id="sender_name" name="sender_name" class="form-control" value="{{ $order->sender_name }}" disabled>
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong><label for="sender_phone">Sender Phone</label></strong>
                        <input type="text" id="sender_phone" name="sender_phone" class="form-control" value="{{ $order->sender_phone }}" disabled>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <strong><label for="sender_address">Sender Address</label></strong>
                        <input type="text" id="sender_address" name="sender_address" class="form-control" value="{{ $order->sender_address }}" disabled>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <strong><label for="recipient_name">Recipient Name</label></strong>
                        <input type="text" id="recipient_name" name="recipient_name" class="form-control" value="{{ $order->recipient_name }}" disabled>
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong><label for="recipient_phone">Recipient Phone</label></strong>
                        <input type="text" id="recipient_phone" name="recipient_phone" class="form-control" value="{{ $order->recipient_phone }}" disabled>
                    </div>
                </div>
        
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <strong><label for="recipient_address">Recipient Address</label></strong>
                        <input type="text" id="recipient_address" name="recipient_address" class="form-control" value="{{ $order->recipient_address }}" disabled>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <strong><label for="shipping_charge">Shipping Charge</label></strong>
                        <input type="text" id="shipping_charge" name="shipping_charge" class="form-control" value="{{ $order->shipping_charge }}"  required>
                    </div>
                </div>
        
                <div class="form-row">
                    <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-primary">Update Order</button>
                    </div>
                </div>
            </div>
        </form>
        
    </div>
</div>
@endsection
