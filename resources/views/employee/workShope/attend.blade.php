@extends('layout.employee')
@section('style')
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="{{asset('admin/assets/plugins/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/assets/plugins/jquery-steps/jquery.steps.css')}}">

<!-- Favicon-->
<link rel="stylesheet" href="{{asset('admin/assets/plugins/bootstrap/css/bootstrap.min.css')}}">
<!-- Bootstrap Material Datetime Picker Css -->
<link
    href="{{asset('admin/assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}"
    rel="stylesheet" />
<!-- Bootstrap Select Css -->
<link href="{{asset('admin/assets/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
<!-- Custom Css -->
<link rel="stylesheet" href="{{asset('admin/assets/css/style.min.css')}}">
<!-- Custom Css -->
<link rel="stylesheet" href="{{asset('admin/assets/css/style.min.css')}}">
@endsection
@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>{{$workshop->heading}}</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('employee.dashboard')}}"><i class="zmdi zmdi-home"></i> Employee</a></li>
                        <li class="breadcrumb-item active">Workshops</li>
                        <li class="breadcrumb-item active">{{$workshop->heading}}</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                </div>
            </div>
        </div> 
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="card mcard_3">
                        <div class="body">
                            <h4 class="m-t-10">{{$workshop->heading}}</h4>                            
                            <div class="row">
                                <div class="col-12 mb-4">
                                    @if($workshop->start->format('d m,y H:i') >= Carbon\Carbon::now()->format('d m,y H:i')  )
                                    <a href="" class="btn btn-success">Watch Link Video</a>
                                    @elseif(($workshop->end->format('d m,y H:i') >= Carbon\Carbon::now()->format('d m,y H:i')) < $workshop->paper_end_time->format('d m,y H:i'))
                                    <a href="{{route('employee.workshop.test',$workshop->id)}}" class="btn btn-success">Give Test</a>
                                    @endif
                                </div>
                                <div class="col-4">                                    
                                    <small>Starting Time</small>
                                    <h5>{{$workshop->start->format( 'l M d,Y H:i' )}}</h5>
                                </div>
                                <div class="col-4">                                    
                                    <small>Ending Time & Question Start Time</small>
                                    <h5>{{$workshop->end->format( 'l M d,Y H:i' )}}</h5>
                                </div>
                                <div class="col-4">                                    
                                    <small>Question End Time</small>
                                    <h5>{{$workshop->paper_end_time->format( 'l M d,Y H:i' )}}</h5>
                                </div>                            
                            </div>
                        </div>
                    </div>               
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body pt-0">
                            <div class="embed-responsive embed-responsive-21by9">
                                <iframe class="ytplayer" width="100%" height="400" src="{{$workshop->link}}?autoplay=1&controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<!-- Jquery Validation Plugin Css -->
<script src="{{asset('admin/assets/plugins/jquery-steps/jquery.steps.js')}}"></script> <!-- JQuery Steps Plugin Js -->
<script src="{{asset('admin/assets/js/pages/forms/form-wizard.js')}}"></script>
<script src="{{asset('admin/assets/plugins/momentjs/moment.js')}}"></script> <!-- Moment Plugin Js -->
<!-- Bootstrap Material Datetime Picker Plugin Js -->
<script
    src="{{asset('admin/assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}">
</script>
<script src="{{asset('admin/assets/js/pages/forms/basic-form-elements.js')}}"></script>

@endsection