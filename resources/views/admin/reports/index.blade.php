@extends('admin.partials.layout')

@section('title', 'Buy Orders List')

@section('content')
    <div class="content-wrapper">
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">Reports</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}"><i class="la la-home font-20"></i></a>
                </li>
               
            </ol>
        </div>
        <div class="page-content fade-in-up">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Reports & Analytics</div>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                </div>
                <div class="ibox-body">
                    <div class="row">
        <div class="col-md-6">
            <a href="{{ route('admin.reports.orders') }}" class="btn btn-primary">Orders Statistics</a>
        </div>
        <div class="col-md-6">
            <a href="{{ route('admin.reports.shipments') }}" class="btn btn-success">Top Shipped Items</a>
        </div>
    </div>
                </div>
              


               

            </div>
        </div>
    </div>


@endsection
