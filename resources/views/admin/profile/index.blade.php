@extends('layout.admin')
@section('style')
<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- Favicon-->
<link rel="stylesheet" href="{{ asset('admin/assets/plugins/bootstrap/css/bootstrap.min.css') }}">
<!-- Morris Chart Css-->
<link rel="stylesheet" href="{{ asset('admin/assets/plugins/morrisjs/morris.css') }}" />
<!-- Colorpicker Css -->
<link rel="stylesheet" href="{{ asset('admin/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css') }}" />
<!-- Multi Select Css -->
<link rel="stylesheet" href="{{ asset('admin/assets/plugins/multi-select/css/multi-select.css') }}">
<!-- Bootstrap Spinner Css -->
<link rel="stylesheet" href="{{ asset('admin/assets/plugins/jquery-spinner/css/bootstrap-spinner.css') }}">
<!-- Bootstrap Tagsinput Css -->
<link rel="stylesheet" href="{{ asset('admin/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
<!-- Bootstrap Select Css -->
<link rel="stylesheet" href="{{ asset('admin/assets/plugins/bootstrap-select/css/bootstrap-select.css') }}" />
<!-- noUISlider Css -->
<link rel="stylesheet" href="{{ asset('admin/assets/plugins/nouislider/nouislider.min.css') }}" />
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('admin/assets/plugins/select2/select2.css') }}" />
<!-- Custom Css -->
<link rel="stylesheet" href="{{ asset('admin/assets/css/style.min.css') }}">
@endsection
@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Profile</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="zmdi zmdi-home"></i>Admin</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                        <li class="breadcrumb-item active">Update</li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="card mcard_3">
            <form action="{{route('admin.admin.update',Auth::user()->id)}}" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="body">
                    <div class="mb-2"  style="text-align: center">
                        <a href="#">
                            <img src="{{asset(Auth::user()->image)}}" alt="" height="100px" width="100px"
                                class=" rounded-circle wth-35 hgt-35">
                        </a>
                       
                    </div>
                    <h4 class="m-t-10">{{ Auth::user()->name }}</h4>
        
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" class="form-control" value="{{Auth::user()->name}}" name="name" placeholder="Admin name">
                        </div>
                        
                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}">

                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <div class="col-md-6">
                            <input type="password" class="form-control" name="newpassword" placeholder="Confirm Password">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            
                              
                               <input type="file" class="form-control" name="image" placeholder="Profile pitcher">
                        </div>
                    </div>
                    <div class="text-right">
                        <button class="btn btn-raised btn-success waves-effect" type="submit">Update Profile</button>
                    </div>                
                </div>
            </form>
        </div>
    </div>

</section>
@endsection