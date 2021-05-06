@extends('layout.team')
@section('style')
<link rel="stylesheet" href="{{asset('admin/assets/plugins/summernote/dist/summernote.css')}}"/>
@endsection
@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Project Detail</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('team.dashboard')}}"><i class="zmdi zmdi-home"></i> Team</a></li>
                        <li class="breadcrumb-item">{{$project->title}}</li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-success  float-right" type="button"> {{$project->dpoints}} Points</button>
                    <button class="btn btn-danger  float-right" type="button"> {{$project->status}}</button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12">
                    <div class="card mcard_4">
                        <div class="body">
                            <div class="user">
                                <h5 class="mt-3 mb-1">{{$project->title}}</h5>
                                @if($project->deadline)
                                <ul class="list-unstyled mt-3 d-flex">
                                    <li class="mr-3"><strong>DeadLine Date:-</strong> {{$project->deadline->format('M d,Y H:i A')}}</li>
                                </ul>
                                @endif
                            </div>
                            <div class="progress-container progress-success">
                                <span class="progress-badge">Total Points</span>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                        <span class="progress-value">100</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="card">
                        <div class="header">
                            <h2><strong>Ticket</strong> Info</h2>
                        </div>
                        <div class="body">
                            <small class="text-muted">Title: </small>
                            <p>Lucid Admin</p>
                            <hr>
                            <small class="text-muted">Product: </small>
                            <p>Lucid Side Menu Open OnClick</p>
                            <hr>
                            <small class="text-muted">Date: </small>
                            <p>02 Jan 2019</p>
                            <hr>
                            <ul class="list-unstyled">
                                <li>
                                    <div>In Progress</div>
                                    <div class="progress m-b-20">
                                        <div class="progress-bar l-amber" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 78%"> <span class="sr-only">32% Complete</span> </div>
                                    </div>
                                </li>
                            </ul>
                            <hr>
                            <small class="text-muted">Team: </small>
                            <ul class="list-unstyled team-info margin-0">                                               
                                <li><img src="assets/images/xs/avatar7.jpg" alt="Avatar"></li>
                                <li><img src="assets/images/xs/avatar8.jpg" alt="Avatar"></li>
                                <li><img src="assets/images/xs/avatar9.jpg" alt="Avatar"></li>
                                <li><img src="assets/images/xs/avatar2.jpg" alt="Avatar"></li>
                                <li><img src="assets/images/xs/avatar3.jpg" alt="Avatar"></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2><strong>Ticket</strong> Statestics</h2>
                        </div>
                        <div class="body">
                            <div id="chart-donut" class="c3_chart"></div>
                        </div>
                    </div> --}}
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="card">
                        <div class="body">
                            <h5>Description</h5>
                            <span>{!! $project->description !!}</span>
                        </div>
                    </div>
                    <div class="card">
                        <div class="body">
                            <h5>Assign Task To Employees</h5>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group form-float col-md-6">
                                            <select name="employee_id"  class="form-control show-tick  mr-3"  required>
                                                <option selected disabled value="">-- Select Employee--</option>
                                                @foreach (Auth::user()->employee as $employee)
                                                <option value="{{$employee->id}}">{{$employee->name}}</option> 
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-float">
                                                <input type="text" class="form-control" placeholder=" Enter Project Title"
                                                    name="title" >  
                                                <input type="hidden" class="form-control" value="{{Auth::user()->id}}" placeholder=" Enter Employee Name"
                                                    name="company_id" required>
                                            </div>
                                        </div>
                                    
                                    </div> 
                                    <br>
                                    <div class="row">
                                        <div class="form-group col-md-12 txt4">
                                            <textarea rows="4" name="description"  placeholder="Enter description"
                                        class="form-control summernote" ></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          
                            <div class="text-right">
                                <button class="btn btn-raised btn-success waves-effect" type="submit">Create</button>
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
<script src="{{asset('admin/assets/plugins/summernote/dist/summernote.js')}}"></script>  
<script src="{{asset('admin/assets/bundles/libscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js --> 
<script src="{{asset('admin/assets/bundles/vendorscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js --> 

<script src="{{asset('admin/assets/bundles/c3.bundle.js')}}"></script>
<script src="{{asset('admin/assets/plugins/summernote/dist/summernote.js')}}"></script>

<script src="{{asset('admin/assets/bundles/mainscripts.bundle.js')}}"></script>
<script src="{{asset('admin/assets/js/pages/ticket-page.js')}}"></script>    
@endsection