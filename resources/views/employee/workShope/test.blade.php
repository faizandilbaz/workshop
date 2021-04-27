@extends('layout.employee')
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
                        <li class="breadcrumb-item"><a href="{{route('employee.dashboard')}}"><i class="zmdi zmdi-home"></i>Employee</a></li>
                        <li class="breadcrumb-item active">Workshop</li>
                        <li class="breadcrumb-item active">{{$workshop->heading}}</li>
                    </ul>
                </div>

            </div>
        </div>
        @foreach($results as $result)
        <div class="card">
            <div class="body">
                <div class="row">
                    <div class="col-md-12">
                        <p>{{$result->question->statement}}</p>
                    </div>
                    @foreach($result->question->options as $key => $option)
                    <div class="col-md-6">
                        <div class="light_dark">
                            <div class="radio">
                                <input type="radio" name="option" id="{{$option->option}}" value="{{$option->option}}" checked="">
                                <label for="{{$option->option}}">{{$option->option}}</label>
                            </div> 
                        </div>                   
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
        <a href="#" class="btn btn-raised btn-success waves-effect mt-5 float-right" type="submit">Update</a>
    </div>

</section>
@endsection