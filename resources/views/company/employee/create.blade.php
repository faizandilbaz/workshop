@extends('layout.company')
@section('style')
<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- Favicon-->
<link rel="stylesheet" href="{{ asset('admin/assets/plugins/bootstrap/css/bootstrap.min.css') }}">
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
                    <h2>Add Employee</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i>Company</a></li>
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
                        <form  action="{{route('company.employee.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group col-md-12">
                                            <img id="preview_img" src="{{asset('images/users/user.png')}}" height="240" width="auto" style="padding-bottom: 10px;" alt="">
                                            <input type="file" name="image" id="profile_image" onchange="loadPreview(this);" class="form-input-styled" required>
                                            </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="form-group form-float col-md-6">
                                                <select name="team_id" class="form-control show-tick  mr-3"  >
                                                    <option>-- Select Team--</option>
                                                    @foreach (App\Models\Team::all() as $team)
                                                    <option value="{{$team->id}}">{{$team->name}}</option> 
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-float">
                                                    <input type="text" class="form-control" placeholder=" Enter Employee Name"
                                                        name="name" required>  
                                                    <input type="hidden" class="form-control" value="1" placeholder=" Enter Employee Name"
                                                        name="company_id" required>
                                                </div>
                                            </div>
                                        
                                        </div> 
                                        <div class="row">
                                          
                                            <div class="form-group col-md-6">
                                                <input type="email" class="form-control" name="email"
                                                    placeholder="Enter Email Address">
        
                                            </div>
                                            <div class=" form-group col-md-6">
                                                <input type="password" class="form-control" name="password" placeholder="Password">
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