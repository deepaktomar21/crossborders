<!-- START SIDEBAR-->
<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            <div>
                <img src="{{ asset('admin/assets/img/admin-avatar.png') }}" width="45px" />
            </div>
            <div class="admin-info">
                <div class="font-strong">Admin</div><small>Administrator</small>
            </div>
        </div>
        <ul class="side-menu metismenu">
            <li>
                <a class="active" href="{{ route('admin.dashboard') }}"><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>
            <li class="heading">User Management </li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                    <span class="nav-label">User List</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{ route('admin.userlist') }}">User List</a>
                    </li>
                </ul>
            </li>
            <li class="heading">Orders Management</li>
<li>
    <a href="javascript:;"><i class="sidebar-item-icon fa fa-edit"></i>
        <span class="nav-label">Orders</span><i class="fa fa-angle-left arrow"></i></a>
    <ul class="nav-2-level collapse">
        <li>
            <a href="javascript:;"><span>Buy Goods Orders</span> <i class="fa fa-angle-left arrow"></i></a>
            <ul class="nav-3-level collapse">
                <li><a href="{{ route('admin.orders.buyGoodsUK') }}">Buy Goods from UK</a></li>
                <li><a href="{{ route('admin.orders.buyGoodsGhana') }}">Buy Goods from Ghana</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript:;"><span>Express Delivery Orders</span> <i class="fa fa-angle-left arrow"></i></a>
            <ul class="nav-3-level collapse">
                <li><a href="{{ route('admin.expressDeliveryUK') }}">Express Delivery to UK</a></li>
                <li><a href="{{ route('admin.expressDeliveryGhana') }}">Express Delivery to Ghana</a></li>
            </ul>
        </li>
    </ul>
</li>

          

            <li class="heading">Shipping<br>Cost Management</li>

            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-edit"></i>
                    <span class="nav-label">Shipping Cost <br> Management </span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{ route('admin.buyorders.shippingindex') }}">Buy Goods Orders List</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.expressorders.shippingindex') }}">Express Delivery <br>Orders List</a>
                    </li>

                </ul>
            </li>

            <li class="heading"> Reports & Analytics</li>
            <li>
                <a href="{{ route('admin.reports.index') }}">
                    <i data-feather="bar-chart"></i> Reports & Analytics
                </a>
            </li>


           <li class="heading">Category </li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-envelope"></i>
                    <span class="nav-label">Category</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    
                    <li>
                        <a href="{{ route('categories.index') }}">Category</a>
                    </li>
                    
                </ul>
            </li>
           
        </ul>
    </div>
</nav>
<!-- END SIDEBAR-->
