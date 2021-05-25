@extends('layout.employee')
@section('content')
<section class="content">

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <h2><strong>New</strong> Tasks</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('employee.dashboard')}}"><i class="zmdi zmdi-home"></i>Team</a></li>
                        <li class="breadcrumb-item active">New Tasks</li>
                        <li class="breadcrumb-item active">All</li>
                    </ul>
                </div>
                <div class="body">

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Team Name</th>
                                    <th>Task Title</th>
                                    <th>Task Points</th>
                                    <th>Status</th>
                                    <th>Detail</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Auth::user()->tasks->where('status','Pending') as $key => $task)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$task->team->name}}</td>
                                    <td>{{$task->title}}</td>
                                    <td>{{$task->points}}</td>
                                    <td>
                                        <button class="btn btn-danger">{{$task->status}}</button>
                                    </td>
                                    <td>
                                        <a href="{{route('employee.task.show',$task->id)}}" type="submit" class="btn btn-primary edit">Detail</a>
                                    </td>
                                    <td>
                                        <a @if ((Carbon\Carbon::now())>(Carbon\Carbon::parse($task->deadline)))
                                            disabled       
                                        @else
                                        href="{{ route('employee.task.accepted',$task->id) }}" type="submit" 
                                        @endif 
                                        
                                        class="btn btn-success edit ">Accept</a>
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