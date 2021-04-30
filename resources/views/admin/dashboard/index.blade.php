@extends('layout.admin')
@section('content')
<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Dashboard</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i>Admin</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ul>
                <button class="btn btn-primary btn-icon mobile_menu" type="button"><i
                        class="zmdi zmdi-sort-amount-desc"></i></button>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i
                        class="zmdi zmdi-arrow-right"></i></button>
            </div>
        </div>
    </div>
     <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card w_data_1">
                   <div class="body">
                        <div class="w_icon indigo"><i class="zmdi zmdi-hc-fw"></i></div>
                        <h4 class="mt-3">45k</h4>
                        <span class="text-muted">Total Companys</span>
                      
                   </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card w_data_1">
                   <div class="body">
                        <div class="w_icon pink"><i class="zmdi zmdi-hc-fw"></i></div>
                        <h4 class="mt-3">12k</h4>
                        <span class="text-muted">Total Teams</span>
                       
                   </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card w_data_1">
                   <div class="body">
                        <div class="w_icon orange"><i class="zmdi zmdi-hc-fw"></i></div>
                        <h4 class="mt-3">53.8k</h4>
                        <span class="text-muted">Total Employee</span>
                       
                   </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card w_data_1">
                   <div class="body">
                        <div class="w_icon green"><i class="zmdi zmdi-hc-fw"></i></div>
                        <h4 class="mt-3">17.2k</h4>
                        <span class="text-muted">Total WorkShop</span>
                        
                   </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card w_data_1">
                   <div class="body">
                        <div class="w_icon cyan"><i class="zmdi zmdi-hc-fw"></i></div>
                        <h4 class="mt-3">01</h4>
                        <span class="text-muted">Today WorkShop</span>
                       
                   </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card w_data_1">
                   <div class="body">
                        <div class="w_icon dark"><i class="zmdi zmdi-hc-fw"></i></i></div>
                        <h4 class="mt-3">5</h4>
                        <span class="text-muted">Upcoming WorkShop</span>
                       
                   </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card w_data_1">
                   <div class="body">
                        <div class="w_icon blue"><i class="zmdi zmdi-dns"></i></div>
                        <h4 class="mt-3">89</h4>
                        <span class="text-muted">Server Allocation</span>
                        
                   </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card w_data_1">
                   <div class="body">
                        <div class="w_icon blush"><i class="zmdi zmdi-headset-mic"></i></div>
                        <h4 class="mt-3">17</h4>
                        <span class="text-muted">Support Cost</span>
                       
                   </div>
                </div>
            </div>
        </div>
    </div> 
</section>
 @endsection