@extends('admin.partials.layout')

@section('title', 'Home')

@section('content')
<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">User List</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('admin.dashboard')}}"><i class="la la-home font-20"></i></a>
            </li>
            <!--<li class="breadcrumb-item">User List</li>-->
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">User List</div>
                @if (session('error'))
                <p class="text-center text-danger">{{ session('error') }}</p>
                @endif
                @if (session('success'))
                <p class="text-center text-success">{{ session('success') }}</p>
                @endif
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                        </tr>
                    </thead>
            
                    <tbody>
                        @php $i = 1; @endphp
                        @foreach ($users as $item)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->phone}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <!-- DataTables & jQuery -->
            <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
            
            <script>
                $(document).ready(function() {
                    $('#example-table').DataTable({
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