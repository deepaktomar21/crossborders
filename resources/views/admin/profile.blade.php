@extends('admin.partials.layout')

@section('title', 'User View')

@section('content')
        <div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title">Profile</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="la la-home font-20"></i></a>
                    </li>
                    <li class="breadcrumb-item">Profile</li>
                </ol>
            </div>
            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-lg-3 col-md-4">
                        <div class="ibox">
                            <div class="ibox-body text-center">
                                
                                {{-- <h5 class="font-strong m-b-10 m-t-10">{{$data->name}}</h5> --}}
                                
                            </div>
                        </div>
                       
                    </div>
                    <div class="col-lg-9 col-md-8">
                        <div class="ibox">
                            <div class="ibox-body">
                                <ul class="nav nav-tabs tabs-line">
                                   
                                    <li class="nav-item">
                                        <a class="nav-link" href="#tab-1" data-toggle="tab"><i class="ti-settings"></i> Settings</a>
                                    </li>
                                  
                                </ul>
                                <div class="tab-content">
                                    
                                    <div class="tab-pane fade show active" id="tab-1">
                                   <form action="{{ route('admin.adminupdate') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-sm-6 form-group">
            <label> Name</label>
            <input class="form-control" type="text" name="first_name" value="" placeholder="First Name" required>
        </div>
        <div class="col-sm-6 form-group">
            <label>Phone</label>
            <input class="form-control" type="text" name="phone" placeholder="phone" value="" required>
        </div>
    </div>
    <div class="form-group">
        <label>Email</label>
        <input class="form-control" type="email" name="email" placeholder="Email address" value="" required>
    </div>
    <div class="form-group">
        <label>Password</label>
        <input class="form-control" type="password" name="password"value=""  placeholder="Password" required>
    </div>
  

    <div class="form-group">
        <button class="btn btn-default" type="submit">Submit</button>
    </div>
</form>
                                    </div>
                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <style>
                    .profile-social a {
                        font-size: 16px;
                        margin: 0 10px;
                        color: #999;
                    }

                    .profile-social a:hover {
                        color: #485b6f;
                    }

                    .profile-stat-count {
                        font-size: 22px
                    }
                </style>
   
            </div>
            <!-- END PAGE CONTENT-->
            <footer class="page-footer">
                <div class="font-13">2025 © <b>Cross Border</b> - All rights reserved.</div>
                {{-- <a class="px-4" href="http://themeforest.net/item/adminca-responsive-bootstrap-4-3-angular-4-admin-dashboard-template/20912589" target="_blank">BUY PREMIUM</a> --}}
                <div class="to-top"><i class="fa fa-angle-double-up"></i></div>
            </footer>
        </div>
    </div>
    <!-- BEGIN THEME CONFIG PANEL-->

@endsection