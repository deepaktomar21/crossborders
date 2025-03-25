@extends('admin.partials.layout')

@section('title', 'Home')

@section('content')

<div class="content-wrapper">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <!-- START PAGE CONTENT-->
    <div class="page-content fade-in-up">
        <div class="row">
            <!-- Total Orders Received -->
            <div class="col-lg-3 col-md-6">
                <div class="ibox bg-success color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">{{ $totalOrders }}</h2>
                        <div class="m-b-5">Total Orders</div>
                        <i class="ti-shopping-cart widget-stat-icon"></i>
                    </div>
                </div>
            </div>
        
            <!-- Pending Orders -->
            <div class="col-lg-3 col-md-6">
                <div class="ibox bg-warning color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">{{ $pendingOrders }}</h2>
                        <div class="m-b-5">Pending Orders</div>
                        <i class="fa fa-clock-o widget-stat-icon"></i>
                    </div>
                </div>
            </div>
        
            <!-- Completed Orders -->
            <div class="col-lg-3 col-md-6">
                <div class="ibox bg-info color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">{{ $DeliveredOrders }}</h2>
                        <div class="m-b-5">Delivered Orders</div>
                        <i class="fa fa-check-circle widget-stat-icon"></i>
                    </div>
                </div>
            </div>
        
            <!-- In-Transit Orders -->
            <div class="col-lg-3 col-md-6">
                <div class="ibox bg-danger color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">{{ $inTransitOrders }}</h2>
                        <div class="m-b-5">In-Transit Orders</div>
                        <i class="fa fa-truck widget-stat-icon"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-body">
                        <div class="mb-4 flexbox">
                            <div>
                                <h3 class="m-0">User Registration Statistics</h3>
                            </div>
                            <div>
                                <form id="filterForm">
                                    <select name="filter" id="filterSelect" class="form-control">
                                        <option value="daily" {{ $filter == 'daily' ? 'selected' : '' }}>Daily</option>
                                        <option value="weekly" {{ $filter == 'weekly' ? 'selected' : '' }}>Weekly</option>
                                        <option value="monthly" {{ $filter == 'monthly' ? 'selected' : '' }}>Monthly</option>
                                        <option value="quarterly" {{ $filter == 'quarterly' ? 'selected' : '' }}>Quarterly</option>
                                        <option value="halfyearly" {{ $filter == 'halfyearly' ? 'selected' : '' }}>Half-Yearly</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                        <div>
                            <canvas id="chats_user" style="height:260px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.getElementById('filterSelect').addEventListener('change', function() {
                document.getElementById('filterForm').submit();
            });
        
            var ctx = document.getElementById('chats_user').getContext('2d');
            var userChart = new Chart(ctx, {
                type: 'bar', 
                data: {
                    labels: @json($labels),
                    datasets: [{
                        label: 'User Registrations',
                        data: @json($counts),
                        backgroundColor: 'rgba(54, 162, 235, 0.6)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
        

       
  
    <!-- END PAGE CONTENT-->
    <footer class="page-footer">
        <div class="font-13">2018 © <b>Cross Border</b> - All rights reserved.</div>
      
        <div class="to-top"><i class="fa fa-angle-double-up"></i></div>
    </footer>
</div>
</div>
@endsection