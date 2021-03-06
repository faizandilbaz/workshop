@extends('layout.admin')
@section('style')
<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- Favicon-->
<link  rel="stylesheet" href="{{ asset('admin/assets/plugins/bootstrap/css/bootstrap.min.css') }}">
<!-- Morris Chart Css-->
<link rel="stylesheet" href="{{ asset('admin/assets/plugins/morrisjs/morris.css') }}" />
<!-- Colorpicker Css -->
<link rel="stylesheet" href="{{ asset('admin/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css') }}" />
<!-- Multi Select Css -->
<link rel="stylesheet" href="{{ asset('admin/assets/plugins/multi-select/css/multi-select.css') }}">
<!-- Bootstrap Spinner Css -->
<link rel="stylesheet" href="{{ asset('admin/assets/plugins/jquery-spinner/css/bootstrap-spinner.css') }}">
<!-- Bootstrap Tagsinput Css -->
<link rel="stylesheet" href="{{ asset('admin/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
<!-- Bootstrap Select Css -->
<link rel="stylesheet" href="{{ asset('admin/assets/plugins/bootstrap-select/css/bootstrap-select.css') }}" />
<!-- noUISlider Css -->
<link rel="stylesheet" href="{{ asset('admin/assets/plugins/nouislider/nouislider.min.css') }}" />
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('admin/assets/plugins/select2/select2.css') }}" />
<!-- Custom Css -->
<link rel="stylesheet" href="{{ asset('admin/assets/css/style.min.css') }}">
@endsection
@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2><strong>Edit</strong> Employee</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="zmdi zmdi-home"></i>Admin</a></li>
                        <li class="breadcrumb-item active">Employee</li>
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
                        <form action="{{route('admin.employee.update',$user->id)}}" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group col-md-12">
                                            <img id="preview_img" src="{{asset($user->image)}}" height="240" width="auto" style="padding-bottom: 10px;" alt="">
                                            <input type="file" name="image" id="profile_image" onchange="loadPreview(this);" class="form-input-styled" >
                                            </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="form-group form-float col-md-6">
                                                <select name="company_id" id="company" class="form-control show-tick  mr-3"  >
                                                    <option value="{{$user->company->id}}">{{$user->company->name}}</option>
                                                    <option>-- Select Company--</option>
                                                    @foreach (App\Models\Company::all() as $company)
                                                    <option value="{{$company->id}}">{{$company->name}}</option> 
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group form-float col-md-6">
                                                <select name="team_id" id="team" class="form-control show-tick  mr-3"  >
                                                    <option value="{{$user->team->id}}">{{$user->team->name}}</option>
                                                    <option>-- Select Team--</option>
                                                    @foreach (App\Models\Team::all() as $team)
                                                    <option value="{{$team->id}}">{{$team->name}}</option> 
                                                    @endforeach
                                                </select>
                                            </div>
                                        
                                        </div> 
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group form-float">
                                                    <input type="text" class="form-control" value="{{ $user->name }}"
                                                        name="name" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="email" class="form-control" value="{{ $user->email }}" name="email"
                                                    placeholder="Enter Email Address">
        
                                            </div>
                                        </div>   
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="password" class="form-control" name="password" placeholder="Leave It Blank To Unchange">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="password" class="form-control" name="newpassword" placeholder="Confirm Password">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="form-group col-md-12 txt4">
                                                <textarea rows="4" name="detail" placeholder="Enter Detail"
                                                    class="form-control txt4">{{$user->detail}}</textarea>
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
