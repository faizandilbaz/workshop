@extends('layout.employee')
@section('style')
@endsection
@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>{{$workshop->heading}} Workshop</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('employee.dashboard')}}"><i class="zmdi zmdi-home"></i>Workshops</a></li>
                        <li class="breadcrumb-item active">{{$workshop->heading}} Workshop</li>
                    </ul>
                </div>
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-hover theme-color c_table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Employee Name</th>
                                    <th>Total Questions</th>
                                    <th>Right Answers</th>
                                    <th>Percentage</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($workshopemployees as $key => $workshopemployee)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$workshopemployee->employee->name}}</td>
                                    <td>{{$workshop->questions->count()}}</td>
                                    <td>{{$workshopemployee->result}}</td>
                                    <td>{{ round((( $workshopemployee->result / $workshop->questions->count() ) * 100)),2  }} %</td>
                                    <td><button class="btn btn-success">Completed</button></td>
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