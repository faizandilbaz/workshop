@extends('layout.admin')
@section('style')

@endsection
@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Add Comany</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i>Admin</a></li>
                        <li class="breadcrumb-item active">Company</li>
                        <li class="breadcrumb-item active">Create</li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="container-fluid">
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <form  action="{{route('admin.company.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="body">
                                <div class="row">
                                    <div class="col-md-6">
                                       <input type="text" class="form-control" name="name" placeholder="Company Name" required>
                                    </div>
                                    
                                    <div class="col-md-6">
                                       <input type="gmail" class="form-control" name="email" placeholder="Email" required>
                   
                                    </div>
                                </div>
                                <br>
                                   <div class="row">
                                       <div class="col-md-6">
                                       <input type="password" class="form-control" name="password" placeholder="Password" required>
                                       </div>
                                       <div class="col-md-6">
                                           <input type="file" class="form-control" name="image" placeholder="Profile pitcher">
                   
                                       </div>
                                   </div>
                                   <br>
                                   <div class="row">
                                    <div class="form-group col-md-12 txt4">
                                        <input name="address" placeholder="Enter address"
                                            class="form-control txt4">
                                    </div> 
                                    
                                    <div class="form-group col-md-12 txt4">
                                        <input  name="detail" placeholder="Other Details"
                                            class="form-control txt4">
                                    </div>
                                </div>
                                <button class="btn btn-raised btn-success waves-effect" type="submit">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
</section>
@endsection
