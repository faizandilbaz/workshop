@extends('layout.company')
@section('style')
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
                    <a href="#" class="btn btn-raised btn-success waves-effect float-right" type="submit">Save</a>
                    <div class="card">
                        <div class="header">
                            <h2><strong>Work</strong>Shope</h2>
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Workshope Start Time</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="zmdi zmdi-time"></i></span>
                                        </div>
                                        <input type="text" class="form-control datetimepicker"
                                            placeholder="Please choose starting  time...">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label>Workshope End Time</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="zmdi zmdi-time"></i></span>
                                        </div>
                                        <input type="text" class="form-control datetimepicker"
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
                                        <input type="url" class="form-control"
                                            placeholder=" Enter link: http://, https://, ftp://" name="url" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12 txt4">
                                    <label>Description</label>
                                    <textarea rows="4" name="description" placeholder="Enter description"
                                        class="form-control txt4"></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Questionnaire End Time</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="zmdi zmdi-time"></i></span>
                                        </div>
                                        <input type="text" class="form-control datetimepicker"
                                            placeholder="Please choose End time...">
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-info waves-effect m-r-20 float-right add_question">Add
                                Questions </button>
                        </div>
                    </div>
                </div>
            </div>
            <h5 class="card-title text-center">Questions</h5>
            <div>
                <h1 style="text-align: center"> Created Question Here</h1>
                <div class="question_append">

                </div>

            </div>
        </div>

    </div>
    {{-- <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title" id="largeModalLabel">Add Questions</h4>
                </div>
                <div class="modal-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="radio inlineblock m-r-20">
                                <input type="radio" id="options1" class="with-gap" value="1">
                                <label for="options1">(True/False)</label>
                            </div>
                            <div class="radio inlineblock">
                                <input type="radio" id="options2" class="with-gap" value="2">
                                <label for="options1">Multiple Choice Question</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal"
                        class="btn btn-success btn-round waves-effect">Add</button>
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
<script src="{{asset('admin/assets/js/pages/forms/basic-form-elements.js')}}"></script>
<script>
    $(document).ready(function(){
        $('.add_question').on('click',function(){
           $('.question_append').append(
            '<div class="row">'+
                '<div class="form-group col-md-12">'+
                    '<label>Question Statement</label>'+
                    '<textarea rows="4" name="description" style="resize:none" placeholder="Enter Question Statement" class="form-control txt4"></textarea>'+
                '</div>'+
            '</div>'+
            '<div class="row">'+
                '<div class="col-md-5">'+
                    '<div class="form-group form-float">'+
                        '<input type="text" class="form-control" placeholder="Enter Option one" name="name" required>'+
                    '</div>'+
                '</div>'+
                '<div class="col-md-5">'+
                    '<div class="form-group form-float">'+
                        '<input type="text" class="form-control" placeholder=" Enter Option two" name="name" required>'+
                    '</div>'+
                '</div>'+
                '<div class="col-md-2">'+
                    '<button type="button" class="btn btn-primary add_options" >+ </button>'+
                '</div>'+
            '</div>'+
            '<div class="row options_append">'+
            '</div>'
           );
        });

        $('.question_append').on('click','.add_options',function(){
            $('.options_append').append(
                '<div class="col-md-5">'+
                    '<div class="form-group form-float">'+
                        '<input type="text" class="form-control" placeholder="Enter Option one" name="name" required>'+
                    '</div>'+
                '</div>'+
                '<div class="col-md-5">'+
                    '<div class="form-group form-float">'+
                        '<input type="text" class="form-control" placeholder=" Enter Option two" name="name" required>'+
                    '</div>'+
                '</div>'
            )
        });
    });
</script>
@endsection