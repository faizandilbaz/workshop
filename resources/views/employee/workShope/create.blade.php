@extends('layout.employee')
@section('style')
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="{{asset('admin/assets/plugins/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/assets/plugins/jquery-steps/jquery.steps.css')}}">

<!-- Favicon-->
<link rel="stylesheet" href="{{asset('admin/assets/plugins/bootstrap/css/bootstrap.min.css')}}">
<!-- Bootstrap Material Datetime Picker Css -->
<link
    href="{{asset('admin/assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}"
    rel="stylesheet" />
<!-- Bootstrap Select Css -->
<link href="{{asset('admin/assets/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
<!-- Custom Css -->
<link rel="stylesheet" href="{{asset('admin/assets/css/style.min.css')}}">
<!-- Custom Css -->
<link rel="stylesheet" href="{{asset('admin/assets/css/style.min.css')}}">
@endsection
@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i>Employee</a></li>
                        <li class="breadcrumb-item active">WorkShope</li>
                        <li class="breadcrumb-item active">Questions</li>
                    </ul>
                </div>

            </div>
        </div>
        <div class="card">
            <div class="card-body">
           <a href="#" class="btn btn-raised btn-info waves-effect float-right" type="submit">Send</a>

                <h5 class="card-title text-center"> About WorkShope</h5>
               <div>
                <h5 style="color: green">Heading</h5>
                <p>Build Modren Skill</p>
                <h5 style="color: green">Timing</h5>
                <p>1:00PM <span style="color: green" mr-1>to</span>3:30PM</p>
                <h5 style="color: green">Date</h5>
                <p>3/4/24 <span style="color: green" mr-1>to</span>3/4/26</p>
               </div>
                
               </div>
        </div>

        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div id="wizard_vertical">
                        <h2>First Question</h2>
                        <section>
                            <p>How many Provinceses of pakistan? </p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="radio inlineblock m-r-20">
                                            <input type="radio" class="with-gap" value="3">
                                            <label>One</label>
                                        </div>
                                        <div class="radio inlineblock">
                                            <input type="radio" class="with-gap" value="4"
                                                checked="">
                                            <label>Two</label>
                                        </div>
                                        <div class="radio inlineblock m-r-20">
                                            <input type="radio" class="with-gap" value="5">
                                            <label>One</label>
                                        </div>
                                        <div class="radio inlineblock">
                                            <input type="radio" class="with-gap" value="6"
                                                checked="">
                                            <label>Two</label>
                                        </div>
                                    </div>
                                </div>
        
                            </div>
                            <a href="#" class="btn btn-raised btn-success waves-effect"
                                type="submit">save</a>
        
                        </section>
                        <h2>Second Question</h2>
                        <section>
                            <p> Sargodha is famous for? </p>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="radio inlineblock m-r-20">
                                        <input type="radio" class="with-gap" value="5">
                                        <label>True</label>
                                    </div>
                                    <div class="radio inlineblock">
                                        <input type="radio" class="with-gap" value="6" checked="">
                                        <label>False</label>
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="btn btn-raised btn-success waves-effect"
                                type="submit">save</a>
        
                        </section>
                        <h2>Third Question</h2>
                        <section>
                            <p> How many Provinceses of pakistan? </p>
                            <a href="#" class="btn btn-raised btn-success waves-effect"
                                type="submit">save</a>
        
                        </section>
                        <h2>Forth Question</h2>
                        <section>
                            <p> Sargodha is famous for? </p>
                            <a href="#" class="btn btn-raised btn-success waves-effect"
                                type="submit">save</a>
        
                        </section>
                        <h2>Fifth Question</h2>
                        <section>
                            <p> How many Provinceses of pakistan? </p>
                            <a href="#" class="btn btn-raised btn-success waves-effect"
                                type="submit">save</a>
        
                        </section>
                    </div>  
                    
                   </div>
            </div>
            <!-- Basic Validation -->
           
        </div>
    </div>
   
</section>
@endsection
@section('script')
<!-- Jquery Validation Plugin Css -->
<script src="{{asset('admin/assets/plugins/jquery-steps/jquery.steps.js')}}"></script> <!-- JQuery Steps Plugin Js -->
<script src="{{asset('admin/assets/js/pages/forms/form-wizard.js')}}"></script>
<script src="{{asset('admin/assets/plugins/momentjs/moment.js')}}"></script> <!-- Moment Plugin Js -->
<!-- Bootstrap Material Datetime Picker Plugin Js -->
<script
    src="{{asset('admin/assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}">
</script>
<script src="{{asset('admin/assets/js/pages/forms/basic-form-elements.js')}}"></script>

@endsection