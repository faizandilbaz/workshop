@extends('layout.employee')
@section('content')
<section class="content">

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Running </strong> Tasks</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('employee.dashboard')}}"><i class="zmdi zmdi-home"></i>Team</a></li>
                        <li class="breadcrumb-item active">Running Tasks</li>
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
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Auth::user()->tasks->where('status','Running') as $key => $task)
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