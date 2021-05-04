@extends('layout.company')
@section('style')
<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- Favicon-->
<link rel="stylesheet" href="{{ asset('admin/assets/plugins/bootstrap/css/bootstrap.min.css') }}">
<!-- JQuery 
 Css -->
<link rel="stylesheet" href="{{asset ('admin/assets/plugins/jquery-/s.bootstrap4.min.css') }}">
<!-- Custom Css -->
<link rel="stylesheet" href="{{ asset('admin/assets/css/style.min.css') }}">
@endsection
@section('content')
<section class="content">

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <h2><strong>All</strong>Teams</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i>Company</a></li>
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
                                @foreach (Auth::user()->teams as $key => $team)
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
                                        <a href="{{ route('company.team.edit',$team->id) }}" type="submit" class="btn btn-warning edit">Edit</a>
                                    </td>
                                    <td>
                                        <button data-toggle="modal" id="{{$team->id}}" data-target="#delete_modal"
                                                class="btn btn-danger delete-btn"> Delete</button>
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
@if(Auth::user()->teams->count() > '0')
<div id="delete_modal" class="modal fade">
    <div class="modal-dialog">
        <form action="{{route('company.team.destroy',$team->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('DELETE') 
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Are You Sure to Delete this Team?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-header">
                    <p style="color:red;font-weight:bold;font-size: xx-large;">Alert: </p>
                </div>
                <div class="modal-header">
                    <p class="modal-title mt-0" id="myModalLabels">If you delete this Team, All Employes assosiated with this will be Deleted Automatically.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Yes</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endif
@endsection
