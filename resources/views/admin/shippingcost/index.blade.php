@extends('admin.partials.layout')

@section('title', 'Buy Orders List')

@section('content')
    <div class="content-wrapper">
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">Want to Buy Orders List</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}"><i class="la la-home font-20"></i></a>
                </li>
                <!--<li class="breadcrumb-item">User List</li>-->
            </ol>
        </div>
        <div class="page-content fade-in-up">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Want to Buy Orders List</div>
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
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="orders-table" cellspacing="0"
                            width="100%">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Tracking ID</th>
                                    <th>Customer Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Service</th>
                                    <th>Order Status</th>
                                    <th>Delivery Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($orders as $index => $order)
                                    <tr>
                                        <td>{{ $index + 1 }}</td> <!-- S.No. (Starts from 1) -->
                                        <td>{{ $order->tracking_id }}</td>
                                        <td>{{ $order->buyer_name }}</td>
                                        <td>{{ $order->buyer_email }}</td>
                                        <td>{{ $order->buyer_phone }}</td>
                                        <td>{{ $order->service }}</td>

                                        <td><span class="badge badge-info">{{ $order->order_status }}</span></td>
                                        <td><span class="badge badge-warning">{{ $order->delivery_status }}</span>
                                           
                                        </td>
                                        <td>{{ $order->created_at->format('d M Y') }}</td>
                                        <td>
                                            <!-- View Order Button with Eye Icon -->
                                            <a href="{{ route('admin.buyerorders.shippingedit', $order->id) }}" class="btn btn-info btn-sm">
                                                <i data-feather="eye">Update</i>
                                            </a>   
                                        </td>
                                    </tr>
                                   
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            

                <!-- Include DataTables -->
                <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

                <script>
                    $(document).ready(function() {
                        $('#orders-table').DataTable({
                            "paging": true,
                            "searching": true,
                            "ordering": true,
                            "info": true,
                            "lengthMenu": [10, 25, 50, 100],
                            "pageLength": 10
                        });
                    });
                </script>


            </div>
        </div>
    </div>


@endsection
