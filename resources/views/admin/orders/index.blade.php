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
                                        <td>{{ $order->service->name }}</td>

                                        <td><span class="badge badge-info">{{ $order->order_status }}</span></td>
                                        <td><span class="badge badge-warning">{{ $order->delivery_status }}</span> <br>
                                            <button class="btn btn-primary btn-sm" data-toggle="modal"
                                                data-target="#updateOrderModal-{{ $order->id }}">
                                                <i data-feather="edit">Update </i>
                                            </button>
                                        </td>



                                        <td>{{ $order->created_at->format('d M Y') }}</td>
                                        <td>

                                            <!-- View Order Button with Eye Icon -->
                                            <a href="{{ route('admin.buyerorders.show', $order->id) }}" class="btn btn-info btn-sm">
                                                <i data-feather="eye">View</i>
                                            </a>
                                            

                                            <!-- Delete Button with Trash Icon -->
                                            <button class="btn btn-danger btn-sm delete-order"
                                                data-id="{{ $order->id }}">
                                                <i data-feather="trash-2">DELETE</i>
                                            </button>
                                        </td>

                                    </tr>
                                    <div class="modal fade" id="updateOrderModal-{{ $order->id }}" tabindex="-1"
                                        aria-labelledby="updateOrderModalLabel-{{ $order->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="updateOrderModalLabel-{{ $order->id }}">
                                                        Update Order Status</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('admin.orders.updateStatus') }}" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <input type="hidden" name="id" value="{{ $order->id }}">

                                                        <!-- Order Status Dropdown -->
                                                        <label for="order_status_{{ $order->id }}"><strong>Order
                                                                Status</strong> (Optional)</label>
                                                        <select class="form-control" name="order_status"
                                                            id="order_status_{{ $order->id }}">
                                                            <option value="">-- Select Order Status --</option>
                                                            @foreach (['Pending', 'Accepted', 'Rejected'] as $status)
                                                                <option value="{{ $status }}"
                                                                    {{ $order->order_status == $status ? 'selected' : '' }}>
                                                                    {{ $status }}
                                                                </option>
                                                            @endforeach
                                                        </select>

                                                        <!-- Delivery Status Dropdown -->
                                                        <label for="delivery_status_{{ $order->id }}"
                                                            class="mt-2"><strong>Delivery Status</strong>
                                                            (Optional)</label>
                                                        <select class="form-control" name="delivery_status"
                                                            id="delivery_status_{{ $order->id }}">
                                                            <option value="">-- Select Delivery Status --</option>
                                                            @foreach (['Processed', 'In Transit', 'Delivered'] as $status)
                                                                <option value="{{ $status }}"
                                                                    {{ $order->delivery_status == $status ? 'selected' : '' }}>
                                                                    {{ $status }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

                <script>
                    $(document).on('click', '.delete-order', function() {
                        let orderId = $(this).data('id');

                        if (!confirm('Are you sure you want to delete this order?')) {
                            return;
                        }

                        $.ajax({
                            url: "{{ route('admin.orders.delete') }}",
                            type: "POST",
                            data: {
                                _token: "{{ csrf_token() }}",
                                id: orderId
                            },
                            success: function(response) {
                                alert(response.message);
                                location.reload(); // Refresh the page after deletion
                            },
                            error: function(xhr) {
                                alert(xhr.responseJSON.message);
                            }
                        });
                    });
                </script>


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
