@extends('layout.company')
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

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <h2><strong>All</strong>Work Shope</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i>Company</a></li>
                        <li class="breadcrumb-item active">WorkShope</li>
                        <li class="breadcrumb-item active">All</li>
                    </ul>
                </div>
                <div class="body">

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Heading</th>
                                    <th>Start</th>
                                    <th>END</th>
                                    <th>Link</th>
                                    <th>Question</th>
                                    <th>Action</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Build Modren Skill</td>
                                    <td>1:00 PM</td>
                                    <td>3:30PM</td>
                                    <td>https://www.youtube.com</td>

                                    <td>
                                        <div id="wizard_vertical">
                                            <h2>First Question</h2>
                                            <section>
                                                <p>How many Provinceses of pakistan? </p>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <div class="radio inlineblock m-r-20">
                                                                <input type="radio" class="with-gap" >
                                                                <label>One</label>
                                                            </div>
                                                            <div class="radio inlineblock">
                                                                <input type="radio" class="with-gap" 
                                                                    checked="">
                                                                <label>Two</label>
                                                            </div>
                                                            <div class="radio inlineblock m-r-20">
                                                                <input type="radio" class="with-gap" >
                                                                <label>One</label>
                                                            </div>
                                                            <div class="radio inlineblock">
                                                                <input type="radio" class="with-gap" 
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
                                    </td>
                                    <td>
                                        <a href="{{ route('company.shop.physical.edit',) }}" type="submit" class="btn
                                           btn-warning edit">Edit</a>
                                    </td>
                                    <td>
                                        <form action="#" method="POST">

                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
{{-- <script src="{{asset('admin/assets/plugins/jquery-validation/jquery.validate.js')}}"></script> --}}
<!-- Jquery Validation Plugin Css -->
<script src="{{asset('admin/assets/plugins/jquery-steps/jquery.steps.js')}}"></script> <!-- JQuery Steps Plugin Js -->
<script src="{{asset('admin/assets/js/pages/forms/form-wizard.js')}}"></script>
<script src="{{asset('admin/assets/plugins/momentjs/moment.js')}}"></script> <!-- Moment Plugin Js -->
@endsection