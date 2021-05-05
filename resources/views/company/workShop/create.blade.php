@extends('layout.company')
@section('style')
<link rel="stylesheet" href="{{asset('admin/assets/plugins/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('admin/assets/plugins/summernote/dist/summernote.css')}}"/>

@endsection
@section('content')
<form action="{{route('company.workshop.store')}}" method="post">

    <section class="content">
        <div class="body_scroll">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h2>Company</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('company.dashboard')}}"><i class="zmdi zmdi-home"></i> Company</a>
                            </li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Work Shop</a></li>
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
                                <h2><strong>Work</strong>Shop</h2>
                            </div>
                            <div class="body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Workshop Start Time</label>
                                        <div class="input-group masked-input mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                        class="zmdi zmdi-calendar-note"></i></span>
                                            </div>
                                            <input type="datetime-local" name="start" class="form-control datetime"
                                                onkeydown="return false" value="{{old('start')}}" placeholder="Ex: 30/07/2016 23:59" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Workshop End Time</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="zmdi zmdi-time"></i></span>
                                            </div>
                                            <input type="datetime-local" onkeydown="return false" name="end"
                                                class="form-control datetime" value="{{old('end')}}" placeholder="Ex: 30/07/2016 23:59"
                                                required>
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <input type="text" class="form-control" value="{{old('heading')}}" placeholder=" Enter Heading"
                                                name="heading" required>
                                            <input type="hidden" class="form-control" value="{{Auth::user()->id}}"
                                                name="company_id" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <input type="url" class="form-control"
                                                placeholder=" Enter link: http://, https://, ftp://" value="{{old('link')}}" name="link">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label>Description</label>
                                        <textarea rows="4" name="description"  placeholder="Enter description"
                                            class="form-control summernote" required>{{old('description')}}</textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Questionnaire End Time</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="zmdi zmdi-time"></i></span>
                                            </div>
                                            <input type="datetime-local" value="{{old('paper_end_time')}}" onkeydown="return false" name="paper_end_time"
                                                class="form-control datetime" placeholder="Please choose End time..."
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <a type="button"
                                    class="btn btn-info waves-effect m-r-20 float-right add_question text-white">Add
                                    Questions </a>
                                    
                                    <a type="button"
                                    class="btn btn-danger waves-effect m-r-20 float-right remove_question text-white">Remove
                                    Question </a>
                            </div>
                        </div>
                    </div>
                </div>
                <h5 class="card-title text-center">Questions</h5>
                <div>
                    <h1 style="text-align: center"> Created Question Here</h1>
                    <div class="question_append">

                    </div>
                    <button class="btn btn-success" type="submit">submit</button>
                </div>
            </div>

        </div>



    </section>
</form>

@endsection
@section('script')
<script src="{{asset('admin/assets/plugins/summernote/dist/summernote.js')}}"></script>
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
<script src="{{asset('assets/js/pages/forms/advanced-form-elements.js')}}"></script>
        <script src="{{asset('assets/plugins/select2/select2.min.js')}}"></script> 
<script>
    let q_id = 0;
    let counter;

    $(document).ready(function(){
        

        $('.add_question').on('click',function(){
           q_id++;
           counter=2;
           $('.page-loader-wrapper').show();
           $('.question_append').append(
            '<div class="remove_'+q_id+'">'+
            '<div class="row">'+
                '<div class="form-group col-md-8">'+
                    '<label>Question Statement</label>'+
                    '<textarea rows="4" name="questions['+q_id+']" style="resize:none" placeholder="Enter Question Statement" class="form-control txt4" required></textarea>'+
                '</div>'+
                '<div class="col-md-2">'+
                    '<lable>Select Correct Option</lable>'+
                    ' <select class="form-control show-tick " name="correct['+q_id+']" data-placeholder="Corect Option Number" required>'+
                        '<option selected disabled>Correct Option Number</option>'+
                        '<option value="1">Option: 1</option>'+
                        '<option value="2">Option: 2</option>'+
                        '<option value="3">Option: 3</option>'+
                        '<option value="4">Option: 4</option>'+
                    '</select>'+
                '</div>'+
            '</div>'+
            '<div class="row">'+
                '<div class="col-md-5">'+
                    '<div class="form-group form-float">'+
                        '<input type="text" class="form-control" placeholder="Enter Option" name="options['+q_id+'][]" required>'+
                    '</div>'+
                '</div>'+
                '<div class="col-md-5">'+
                    '<div class="form-group form-float">'+
                        '<input type="text" class="form-control" placeholder=" Enter Option" name="options['+q_id+'][]" required>'+
                    '</div>'+
                '</div>'+
                '<div class="col-md-2">'+
                    '<button type="button" class="check_'+q_id+' btn btn-primary add_options" q_id="'+q_id+'" counter="'+counter+'">+ </button>'+
                '</div>'+
            '</div>'+
            '<div class="row options_append-q_'+q_id+'">'+
            '</div>'+
            '</div>'
           );
        $('.page-loader-wrapper').hide();
        });
        $('.question_append').on('click','.add_options',function(){
            var id = $(this).attr('q_id');
            var count =$('.check_'+id).attr('counter');
            if(count == 4)
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Only Four options are Allowed!',
                });
            else{
                $(this).attr('counter',4);
            $('.options_append-q_'+id).append(
                '<div class="col-md-5">'+
                    '<div class="form-group form-float">'+
                        '<input type="text" class="form-control" placeholder="Enter Option" name="options['+q_id+'][]" required>'+
                    '</div>'+
                '</div>'+
                '<div class="col-md-5">'+
                    '<div class="form-group form-float">'+
                        '<input type="text" class="form-control" placeholder=" Enter Option" name="options['+q_id+'][]" required>'+
                    '</div>'+
                '</div>'+
                '<div>'+
                    '<button type="button" class="btn btn-danger options_remove" counter="'+counter+'" q_id="'+id+'">-</button>'+
                '</div>'  
            )
            }
        });
        $('.question_append').on('click','.options_remove',function(){
            var id = $(this).attr('q_id');
            $('.check_'+id).attr("counter", function() { return $('.check_'+id).attr("counter") - 2 });

            $('.options_append-q_'+id).children().remove();
        });
        
            $('.remove_question').on('click',function(){
                $('.remove_'+q_id).remove();
                q_id--
                
        });
        
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


@endsection