@extends('layout.company')
@section('style')
@endsection
@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Profile</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('company.dashboard')}}"><i class="zmdi zmdi-home"></i>Company</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                        <li class="breadcrumb-item active">Update</li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="container-fluid">
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <form action="{{route('company.update',Auth::user()->id)}}" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="body">
                                
                                        <div class="mb-2"  style="text-align: center">
                                            <a href="#">
                                                <img src="{{asset(Auth::user()->image)}}" alt="" height="100px" width="100px"
                                                    class=" rounded-circle wth-35 hgt-35">
                                            </a>
                                           
                                        </div>
                                        
                                <div class="row">
                                    <div class="col-md-6">
                                       <input type="text" class="form-control" value="{{Auth::user()->name}}" name="name" placeholder="company name">
                                    </div>
                                    
                                    <div class="col-md-6">
                                       <input type="gmail" value="{{Auth::user()->email}}" class="form-control" name="email" placeholder="gmail">
                   
                                    </div>
                                </div>
                                <br>
                                   <div class="row">
                                       <div class="col-md-6">
                                           <div style="font-size: 10px">To Update Password*</div>
                                           
                                       <input type="password" class="form-control" name="password" placeholder="Enter New Password to Update ">
                                       </div>
                                       <div class="col-md-6">
                                        <div style="font-size: 10px">To Confirm Password*</div>
                                          
                                        <input type="password" class="form-control" name="newpassword" placeholder="Confirm Password ">
                   
                                       </div>
                                   </div>
                                   <br>
                                   <div class="row">
                                    <div class="col-md-12">
                                     <div style="font-size: 10px"> To update image*</div>
                                       
                                        <input type="file" class="form-control" name="image" placeholder="Profile pitcher">
                
                                    </div>
                                </div>
                                <br>
                                   <div class="row">
                                    <div class="form-group col-md-12 txt4">
                                        <input value="{{Auth::user()->address}}" name="address" placeholder="Enter address"
                                            class="form-control txt4">
                                    </div> 
                                    
                                    <div class="form-group col-md-12 txt4">
                                        <input value="{{Auth::user()->detail}}" name="detail" placeholder="Other Details"
                                            class="form-control txt4">
                                    </div>
                                </div>
                                <button class="btn btn-raised btn-success waves-effect" type="submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection