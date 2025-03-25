@extends('admin.partials.layout')

@section('title', 'Buy Orders List')

@section('content')
    <div class="content-wrapper">
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">Order Statics</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.reports.index') }}" class="btn btn-primary">Back</a>
                </li>
               
            </ol>
        </div>
        <div class="page-content fade-in-up">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Order Statics</div>
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
                        <table class="table table-bordered">
                            <tr>
                                <th>Region</th>
                                <th>Order Count</th>
                            </tr>
                            <tr>
                                <td>Ghana</td>
                                <td>{{ $ghanaOrders }}</td>
                            </tr>
                            <tr>
                                <td>UK</td>
                                <td>{{ $ukOrders }}</td>
                            </tr>
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
