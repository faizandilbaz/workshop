@extends('layout.team')
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
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i>Team</a></li>
                        <li class="breadcrumb-item active">profile</li>
                        <li class="breadcrumb-item active">Update</li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="card mcard_3">
            <div class="body">
                <a href="profile.html"><img src="{{asset ('admin/assets/images/profile_av.jpg') }}"
                        class="rounded-circle shadow " alt="profile-image"></a>
                <h4 class="m-t-10">Team1</h4>
             <div class="row">
                 <div class="col-md-6">
                    <input type="text" class="form-control" value="Team1" name="name" placeholder="Team name">
                 </div>
                 
                 <div class="col-md-6">
                    <input type="gmail" value="team@mail.com" class="form-control" name="gmail" placeholder="gmail">

                 </div>
             </div>
             <br>
                <div class="row">
                    <div class="col-md-6">
                    <input type="text" class="form-control" name="password" placeholder="Password">
                    </div>
                    <div class="col-md-6">
                        <input type="file" class="form-control" name="pitcher" placeholder="Profile pitcher">

                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="form-group col-md-12 txt4">
                        
                        <textarea rows="4" name="adress" placeholder="Enter adress"
                            class="form-control txt4"></textarea>
                    </div>
                </div>
                <br>
                <a href="#" class="btn btn-raised btn-success waves-effect mt-5 float-right" type="submit">Update</a>
            </div>
        </div>
    </div>

</section>
@endsection