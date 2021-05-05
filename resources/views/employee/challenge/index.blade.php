@extends('layout.employee')
@section('style')
@endsection
@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Running Workshops</h2>
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
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$workshop->heading}}</td>
                                    <td>{{$workshop->description}}</td>
                                    <td>{{$workshop->start->format('l M d,Y H:i A')}}</td>
                                    <td>
                                        @php
                                        @endphp
                                        @if(Auth::user()->challenges->where('work_shop_id',$workshop->id)->first())
                                        <a href="{{route('employee.challenge.show',$workshop->id)}}"><button class="btn btn-success">Detail</button></a>
                                        @else
                                        @if(Carbon\Carbon::now()->lt(Carbon\Carbon::parse($workshop->start)))
                                        Coming Soon
                                        @elseif(Carbon\Carbon::now()->gte(Carbon\Carbon::parse($workshop->start)) && Carbon\Carbon::now()->lt(Carbon\Carbon::parse($workshop->end)))
                                        <a href="{{route('employee.workshop.attend',$workshop->id)}}"><span class="badge badge-success">Attend</span></a>
                                        @elseif(Carbon\Carbon::now()->gte(Carbon\Carbon::parse($workshop->end)) && Carbon\Carbon::now()->lt(Carbon\Carbon::parse($workshop->paper_end_time)))
                                        @if(Auth::user()->workshopemployee->where('work_shop_id',$workshop->id)->where('status','0')->first())
                                        <a href="{{route('employee.challenge.show',$workshop->id)}}"><button class="btn btn-success">Challenge</button></a>
                                        @else
                                        <a href="{{route('employee.workshop.attended',$workshop->id)}}"><button class="btn btn-danger">Mark Attendance</button></a>
                                        @endif
                                        @elseif(Carbon\Carbon::now()->gte(Carbon\Carbon::parse($workshop->paper_end_time)))
                                        <span class="badge badge-success">Time Ended</span>
                                        @endif
                                        @endif
                                    </td>
                                </tr>
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