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
                    <h2>Add Employee</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i>Team</a></li>
                        <li class="breadcrumb-item active">Employee</li>
                        <li class="breadcrumb-item active">Create</li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="container-fluid">
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <form action="#" method="POST">
                            <div class="body">
                                <div class="row">
                                    <div class="form-group form-float col-md-6">
                                        <select class="form-control show-tick mr-3">
                                            <option disabled>-- Select Company--</option>
                                            <option value="">Company1</option>
                                         

                                        </select>
                                    </div>
                                    <div class="form-group form-float col-md-6">
                                        <select class="form-control show-tick mr-3">
                                            <option disabled>-- Select Team--</option>
                                            <option value="">Team1</option>
                                
                                        </select>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" value="Employee1" name="name"
                                            placeholder="company name">
                                    </div>

                                    <div class="col-md-6">
                                        <input type="gmail" value="employee@mail.com" class="form-control" name="gmail"
                                            placeholder="gmail">

                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="password" placeholder="Password">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="file" class="form-control" name="pitcher"
                                            placeholder="Profile pitcher">

                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="form-group col-md-12 txt4">
                                        <textarea rows="4" name="adress" placeholder="Enter adress"
                                            class="form-control txt4"></textarea>
                                    </div>
                                </div>
                                <a href="{{ route('team.employee') }}" class="btn btn-raised btn-success waves-effect"
                                    type="submit">Create</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection