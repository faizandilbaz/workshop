@extends('layout.company')
@section('style')
@endsection
@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2><strong>Edit</strong> Team</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('company.dashboard')}}"><i class="zmdi zmdi-home"></i>Company</a></li>
                        <li class="breadcrumb-item active">Team</li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="container-fluid">
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <form action="{{route('company.team.update',$team->id)}}" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group col-md-12">
                                            <img id="preview_img" src="{{asset($team->image)}}" height="240" width="auto" style="padding-bottom: 10px;" alt="">
                                            <input type="file" name="image" id="profile_image" onchange="loadPreview(this);" class="form-input-styled">
                                            </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group form-float">
                                                    <input type="text" class="form-control" value="{{$team->name}}"
                                                        name="name" required>
                                                </div>
                                            </div>
                                            <div class=" form-group col-md-6">
                                                <input type="email" class="form-control" name="email"
                                                value="{{$team->email}}">
        
                                            </div>
                                        </div> 
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="password" class="form-control" name="password" placeholder="Leave It Blank">
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <input type="password" class="form-control" name="newpassword" placeholder="Confirm Password">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="form-group col-md-12 txt4">
                                                <textarea rows="4" name="detail" placeholder="Enter Detail"
                                                    class="form-control txt4">{{$team->detail}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              
                                <div class="text-right">
                                    <button class="btn btn-raised btn-success waves-effect" type="submit">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
</section>
@endsection
