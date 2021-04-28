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
                        <li class="breadcrumb-item"><a href="{{route('employee.dashboard')}}"><i class="zmdi zmdi-home"></i>Workshops</a></li>
                        <li class="breadcrumb-item active">Running Workshops</li>
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
                                    <th>Starting On</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($workshops as $key=>$workshop)
                                @if($workshop->start->toDateString() == Carbon\Carbon::today()->toDateString()  || $workshop->paper_end_time->toDateString()  == Carbon\Carbon::today()->toDateString())
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$workshop->heading}}</td>
                                    <td>{{$workshop->description}}</td>
                                    <td>{{$workshop->start->format('l M d,Y H:i A')}}</td>
                                    <td>
                                        @php
                                        @endphp
                                        @if(Carbon\Carbon::now()->lt(Carbon\Carbon::parse($workshop->start)))
                                        Coming Soon
                                        @elseif(Carbon\Carbon::now()->gte(Carbon\Carbon::parse($workshop->start)) && Carbon\Carbon::now()->lt(Carbon\Carbon::parse($workshop->end)))
                                        <a href="{{route('employee.workshop.attend',$workshop->id)}}"><span class="badge badge-success">Attend</span></a>
                                        @elseif(Carbon\Carbon::now()->gte(Carbon\Carbon::parse($workshop->end)) && Carbon\Carbon::now()->lt(Carbon\Carbon::parse($workshop->paper_end_time)))
                                        @if(Auth::user()->workshopemployee->where('work_shop_id',$workshop->id)->where('status','1')->first())
                                        <a href="{{route('employee.workshop.test',$workshop->id)}}"><button class="btn btn-success">Give Test</button></a>
                                        @elseif(Auth::user()->workshopemployee->where('work_shop_id',$workshop->id)->where('status','0')->first())
                                        Marks = {{ round((( $results / $workshop->questions->count() ) * 100), 2)   }}%
                                        @else
                                        <a href="{{route('employee.workshop.attended',$workshop->id)}}"><button class="btn btn-success">Mark Attendance</button></a>
                                        @endif
                                        @elseif(Carbon\Carbon::now()->gte(Carbon\Carbon::parse($workshop->paper_end_time)))
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