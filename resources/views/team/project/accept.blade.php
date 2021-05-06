@extends('layout.team')
@section('content')
<section class="content">

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Decline</strong> Projects</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('team.dashboard')}}"><i class="zmdi zmdi-home"></i>Team</a></li>
                        <li class="breadcrumb-item active">Accepted Projects</li>
                    </ul>
                </div>
                <div class="body">

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Team Name</th>
                                    <th>Project Title</th>
                                    <th>Project Points</th>
                                    <th>Status</th>
                                    <th>Detail</th>
                                    <th>Action</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Auth::user()->projects->where('status','Accepted') as $key => $project)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$project->team->name}}</td>
                                    <td>{{$project->title}}</td>
                                    <td>{{$project->points}}</td>
                                    <td>
                                        <button class="btn btn-danger">{{$project->status}}</button>
                                    </td>
                                    <td>
                                        <a href="{{ route('team.project.show',$project->id) }}" type="submit" class="btn btn-primary edit">Detail</a>
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