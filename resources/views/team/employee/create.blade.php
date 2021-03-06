@extends('layout.team')
@section('style')
@endsection
@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Add Employee</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('team.dashboard')}}"><i class="zmdi zmdi-home"></i>Team</a></li>
                        <li class="breadcrumb-item active">Employee</li>
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
                        <form  action="{{route('team.employee.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group col-md-12">
                                            <img id="preview_img" src="{{asset('images/users/user.png')}}" height="240" width="auto" style="padding-bottom: 10px;" alt="">
                                            <input type="file" name="image" id="profile_image" onchange="loadPreview(this);" class="form-input-styled" >
                                            </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group form-float">
                                                    <input type="text" class="form-control" placeholder=" Enter Employee Name"
                                                        name="name" required>
                                                    <input type="hidden" class="form-control" value="{{Auth::user()->company->id}}"
                                                        name="company_id" >
                                                    <input type="hidden" class="form-control" value="{{Auth::user()->id}}"
                                                        name="team_id" >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="email" class="form-control" name="email"
                                                    placeholder="Enter Email Address" required>
        
                                            </div>
                                        </div>   
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="form-group col-md-12 txt4">
                                                <textarea rows="4" name="detail" placeholder="Enter Detail"
                                                    class="form-control txt4"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              
                                <div class="text-right">
                                    <button class="btn btn-raised btn-success waves-effect" type="submit">Create</button>
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
@section('script')
<script>
    function loadPreview(input, id) {
      id = id || '#preview_img';
      if (input.files && input.files[0]) {
          var reader = new FileReader();
   
          reader.onload = function (e) {
              $(id)
                      .attr('src', e.target.result)
                      .width(345)
                      .height(240);
          };
   
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>

@endsection