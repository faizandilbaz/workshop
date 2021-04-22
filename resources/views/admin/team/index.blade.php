@extends('layout.admin')
@section('content')
<section class="content">

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <h2><strong>All</strong>Teams</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i>Admin</a></li>
                        <li class="breadcrumb-item active">Team</li>
                        <li class="breadcrumb-item active">All</li>
                    </ul>
                </div>
                <div class="body">

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Team Image</th>
                                    <th>Team Name</th>
                                    <th>Team Email Address</th>
                                    <th>Team Detail</th>
                                    <th>Action</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach (App\Models\Team::all() as $key => $team)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>
                                        <a href="#">
                                            <img src="{{asset($team->image)}}" alt="" height="80px" width="80px"
                                                class=" rounded-circle wth-35 hgt-35">
                                        </a>
                                    </td>
                                    <td>{{$team->name}}</td>
                                    <td>{{$team->email}}</td>
                                    <td>{{$team->detail}}</td>
                                    <td>
                                        <a href="{{ route('admin.team.edit',$team->id) }}" type="submit" class="btn btn-warning edit">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{route('admin.team.destroy',$team->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button data-toggle="modal" data-target="#delete_modal" `
                                                class="btn btn-danger delete-btn"> Delete</button>
                                        </form>
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