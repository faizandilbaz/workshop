@extends('layout.team')
@section('content')
<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Dashboard</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i>Team</a></li>
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
    {{-- <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card widget_2 ">
                    <div class="body bg-info">
                        <h6 class="text-light">TOTAL ORDERS</h6>
                        <h2 class="text-light">20</h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card widget_2 ">
                    <div class="body bg-success">
                        <h6 class="text-light">ORDER ACCEPTED</h6>
                        <h2 class="text-light">12</h2>
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card widget_2 ">
                    <div class="body bg-danger">
                        <h6 class="text-light" >ORDER CANCELED</h6>
                        <h2 class="text-light" >39</h2>
                    
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card widget_2 ">
                    <div class="body bg-warning">
                        <h6 class="text-light">ORDER PENDING</h6>
                        <h2 class="text-light">8</h2>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card widget_2 ">
                    <div class="body bg-warning">
                        <h6 class="text-light">ORDER DISPATCHED</h6>
                        <h2 class="text-light">20 </h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card widget_2 ">
                    <div class="body bg-info">
                        <h6 class="text-light">ORDER DELIVERED</h6>
                        <h2 class="text-light" >12 </h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card widget_2">
                    <div class="body bg-success">
                        <h6 class="text-light">TOTAL CUSTOMER</h6>
                        <h2 class="text-light" >39</h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card widget_2 ">
                    <div class="body bg-danger">
                        <h6 class="text-light">BLOCK CUSTOMER</h6>
                        <h2 class="text-light">8</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card widget_2 ">
                    <div class="body bg-info">
                        <h6 class="text-light">TOTAL VENDORS</h6>
                        <h2 class="text-light">20</h2>
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card widget_2 ">
                    <div class="body bg-danger">
                        <h6 class="text-light">BLOCK VENDERS</h6>
                        <h2 class="text-light">12 </h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card widget_2 ">
                    <div class="body bg-warning">
                        <h6 class="text-light" >BALANCE</h6>
                        <h2 class="text-light">39</h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card widget_2 ">
                    <div class="body bg-success">
                        <h6 class="text-light">TOTAL PRODUCTS</h6>
                        <h2 class="text-light">8</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</section>
 @endsection