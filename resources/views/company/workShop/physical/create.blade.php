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
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Company</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Company</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Work Shope</a></li>
                        <li class="breadcrumb-item active">create</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i
                            class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i
                            class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <!-- Basic Example | Horizontal Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Work</strong>Shope</h2>
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="zmdi zmdi-time"></i></span>
                                        </div>
                                        <input type="text" class="form-control timepicker"
                                            placeholder="Please choose starting  time...">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="zmdi zmdi-time"></i></span>
                                        </div>
                                        <input type="text" class="form-control timepicker"
                                            placeholder="Please choose End time...">
                                    </div>
                                </div>
                            </div>

                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <input type="text" class="form-control" placeholder=" Enter Heading" name="name"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <input type="text" class="form-control" placeholder=" Enter Description"
                                            name="name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <input type="url" class="form-control"
                                            placeholder=" Enter link: http://, https://, ftp://" name="url" required>
                                    </div>
                                </div>
                            
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="radio inlineblock m-r-20">
                                            <input type="radio" name="gender" id="male" class="with-gap"
                                                value="option1">
                                            <label for="male">(True/False)</label>
                                        </div>
                                        <div class="radio inlineblock">
                                            <input type="radio" name="gender" id="Female" class="with-gap"
                                                value="option2" checked="">
                                            <label for="Female">Multiple Choice Question</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="wizard_vertical">
                                <h2>First Question</h2>
                                <section>
                                    <p>How many Provinceses of pakistan? </p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="radio inlineblock m-r-20">
                                                    <input type="radio" name="gender" id="male" class="with-gap"
                                                        value="option1">
                                                    <label for="Female">One</label>
                                                </div>
                                                <div class="radio inlineblock">
                                                    <input type="radio" name="gender" id="Female" class="with-gap"
                                                        value="option2" checked="">
                                                    <label for="male">Two</label>
                                                </div>
                                                <div class="radio inlineblock m-r-20">
                                                    <input type="radio" name="gender" id="male" class="with-gap"
                                                        value="option1">
                                                    <label for="male">One</label>
                                                </div>
                                                <div class="radio inlineblock">
                                                    <input type="radio" name="gender" id="Female" class="with-gap"
                                                        value="option2" checked="">
                                                    <label for="male">Two</label>
                                                </div>
                                            </div>
                                        </div>
                                       
                                    </div>
                                    <a href="#" class="btn btn-raised btn-success waves-effect" type="submit">save</a>

                                </section>
                                <h2>Second Question</h2>
                                <section>
                                    <p> Sargodha is famous for?  </p>
                                    <a href="#" class="btn btn-raised btn-success waves-effect" type="submit">save</a>

                                </section>
                                <h2>Third Question</h2>
                                <section>
                                    <p> How many Provinceses of pakistan? </p>
                                    <a href="#" class="btn btn-raised btn-success waves-effect" type="submit">save</a>

                                </section>
                                <h2>Forth Question</h2>
                                <section>
                                    <p> Sargodha is famous for? </p>
                                    <a href="#" class="btn btn-raised btn-success waves-effect" type="submit">save</a>

                                </section>
                                <h2>Fifth Question</h2>
                                <section>
                                    <p> How many Provinceses of pakistan? </p>
                                    <a href="#" class="btn btn-raised btn-success waves-effect" type="submit">save</a>

                                </section>
                            </div>
                        </div>
                            {{-- <div class="row align-right">
                                <div class="col-md-6"></div>
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-success waves-effect m-r-20"
                                        data-toggle="modal" data-target="#largeModal">Add Questions</button>

                                </div>

                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    {{-- <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title" id="largeModalLabel">Modal title</h4>
                </div>
                <div class="modal-body"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sodales orci
                    ante, sed ornare eros vestibulum ut. Ut accumsan
                    vitae eros sit amet tristique. Nullam scelerisque nunc enim, non dignissim nibh faucibus
                    ullamcorper.
                    Fusce pulvinar libero vel ligula iaculis ullamcorper. Integer dapibus, mi ac tempor varius, purus
                    nibh mattis erat, vitae porta nunc nisi non tellus. Vivamus mollis ante non massa egestas fringilla.
                    Vestibulum egestas consectetur nunc at ultricies. Morbi quis consectetur nunc. </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-round waves-effect">SAVE CHANGES</button>
                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div> --}}
</section>
@endsection
@section('script')
{{-- <script src="{{asset('admin/assets/plugins/jquery-validation/jquery.validate.js')}}"></script> --}}
<!-- Jquery Validation Plugin Css -->
<script src="{{asset('admin/assets/plugins/jquery-steps/jquery.steps.js')}}"></script> <!-- JQuery Steps Plugin Js -->
<script src="{{asset('admin/assets/js/pages/forms/form-wizard.js')}}"></script>
<script src="{{asset('admin/assets/plugins/momentjs/moment.js')}}"></script> <!-- Moment Plugin Js -->
<!-- Bootstrap Material Datetime Picker Plugin Js -->
<script
    src="{{asset('admin/assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}">
</script>

<script src="{{asset('admin/assets/bundles/mainscripts.bundle.js')}}"></script><!-- Custom Js -->
{{-- <script src="{{asset('admin/assets/js/pages/forms/basic-form-elements.js')}}"></script> --}}
</body>
@endsection
}