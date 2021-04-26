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
                    <h2>Today Workshops</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i>Workshops</a></li>
                        <li class="breadcrumb-item active">Today Workshops</li>
                        
                    </ul>
                </div>
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-hover theme-color c_table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Starting On</th>>
                                    <th>Action</th>>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($workshops as $key=>$workshop)
                                @if($workshop->start->format('d m,y') == Carbon\Carbon::today()->format('d m,y') || $workshop->end->format('d m,y') == Carbon\Carbon::today()->format('d m,y'))
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$workshop->heading}}</td>
                                    <td>{{$workshop->description}}</td>
                                    <td>{{$workshop->start->format('l M d,Y h:m')}}</td>
                                    <td>
                                        @if($workshop->start->format('d m,y h:m') >= Carbon\Carbon::now()->format('d m,y h:m'))
                                        <a href="{{route('employee.workshop.attend',$workshop->id)}}"><span class="badge badge-success">Attend</span></a>
                                        @elseif($workshop->end->format('d m,y h:m') >= Carbon\Carbon::now()->format('d m,y h:m'))
                                        <span class="badge badge-success">Give Test</span>
                                        @elseif($workshop->paper_end_time->format('d m,y h:m') >= Carbon\Carbon::now()->format('d m,y h:m'))
                                        <span class="badge badge-success">Time Ended</span>
                                        @endif
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>              
                </div>
            </div>
        </div>
    </div>
</section>
@endsection