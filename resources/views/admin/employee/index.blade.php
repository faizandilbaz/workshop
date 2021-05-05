@extends('layout.admin')
@section('content')
<section class="content">

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <h2><strong>All</strong>Employee</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="zmdi zmdi-home"></i>Admin</a></li>
                        <li class="breadcrumb-item active">Employee</li>
                        <li class="breadcrumb-item active">All</li>
                    </ul>
                </div>
                <div class="body">

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Employee Image</th>
                                    <th>Company Name</th>
                                    <th>Team Name</th>
                                    <th>Employee Name</th>
                                    <th>Employee Email</th>
                                    <th>Employee Detail</th>
                                    <th>Action</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach (App\Models\User::all() as $key => $user)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>
                                        <a href="#">
                                            <img src="{{asset($user->image)}}" alt="" height="80px" width="80px"
                                                class=" rounded-circle wth-35 hgt-35">
                                        </a>
                                    </td>
                                    <td>{{$user->company->name}}</td>
                                    <td>{{$user->team->name}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->detail}}</td>
                                    <td>
                                        <a href="{{ route('admin.employee.edit',$user->id) }}" type="submit" class="btn btn-warning edit">Edit</a>
                                    </td>
                                    <td>
                                        <button data-toggle="modal" id="{{$user->id}}" data-target="#delete_modal"
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
<div id="delete_modal" class="modal fade">
    <div class="modal-dialog">
        <form id="deleteForm" method="POST" enctype="multipart/form-data">
            @csrf
            @method('DELETE') 
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Are You Sure to Delete this Employee?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Yes</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function(){
        $('.delete-btn').click(function(){
            let id = $(this).attr('id');
            $('#id').val(id);
            $('#deleteForm').attr('action','{{route('admin.employee.destroy','')}}' +'/'+id);
        });
    });
</script>
@endsection
