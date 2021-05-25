@extends('layout.company')
@section('style')
<link rel="stylesheet" href="{{asset('admin/assets/plugins/summernote/dist/summernote.css')}}" />
<link rel="stylesheet" href="{{asset('admin/assets/plugins/select2/select2.css')}}" />

@endsection
@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2><strong>Edit</strong> Team</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('company.dashboard')}}"><i
                                    class="zmdi zmdi-home"></i>Company</a></li>
                        <li class="breadcrumb-item active">WorkShop</li>
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
                        <form action="{{route('company.workshop.update',$workshop->id)}}" method="POST" enctype="multipart/form-data" id="form">
                            @method('put')
                            @csrf
                            {{-- {{dd($workshop)}} --}}
                            <div class="body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Workshope Start Time</label>
                                        <div class="input-group masked-input mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                        class="zmdi zmdi-calendar-note"></i></span>
                                            </div>
                                            <input type="datetime-local" name="start" id="start"
                                                class="form-control datetime"
                                                value="{{Carbon\Carbon::parse($workshop->start)->format('Y-m-d\TH:i')}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Workshope End Time</label>
                                        <div class="input-group masked-input mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                        class="zmdi zmdi-calendar-note"></i></span>
                                            </div>
                                            <input type="datetime-local" name="end" id="end"
                                                value="{{Carbon\Carbon::parse($workshop->end)->format('Y-m-d\TH:i')}}"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <input type="text" class="form-control" value="{{$workshop->heading}}"
                                                id="heading" name="heading" required>
                                            <input type="hidden" class="form-control" value="{{$workshop->company_id}}"
                                                name="company_id" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <input type="url" class="form-control" value="{{$workshop->link}}"
                                                name="link" id="link" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12 txt4">
                                        <label>Description</label>
                                        <textarea rows="4" name="description" placeholder="Enter description"
                                            class="form-control summernote"
                                            id="desc">{{$workshop->description}}</textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Questionnaire Start Time</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="zmdi zmdi-time"></i></span>
                                            </div>
                                            <input type="text" class="form-control"
                                                value="{{$workshop->end->format('d/m/Y H:i A')}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Questionnaire End Time</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="zmdi zmdi-time"></i></span>
                                            </div>
                                            <input type="datetime-local" name="paper_end_time"
                                                value={{Carbon\Carbon::parse($workshop->paper_end_time)->format('Y-m-d\TH:i')}}
                                                id="q_end" class="form-control datetime">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <a class="btn btn-raised btn-success waves-effect" id="submit">Update</a>
                                <a type="button" id="{{$workshop->id}}" data-toggle="modal" data-target="#add_question"
                                    class="btn btn-info waves-effect m-r-20 float-right add_question text-white">Add
                                    Questions </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        @foreach ($workshop->questions as $key => $question)
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="body">
                    <div class="row">
                        <div class="col-md-10">
                            <h4>Question No.{{$key+1}} - {{$question->statement}}</h4>
                        </div>
                        <div class="col-md-2">
                            <button id="{{$question->id}}" data-toggle="modal" data-target="#delete_modal"
                                class="btn btn-danger btn-icon float-right delete-btn">
                                <i class="zmdi zmdi-delete"></i>
                            </button>
                            &nbsp;
                            <button statement="{{$question->statement}}" id="{{$question->id}}" data-toggle="modal"
                                data-target="#edit_modal" class="btn btn-info btn-icon float-right edit_question">
                                <i class="zmdi zmdi-edit"></i>
                            </button>
                        </div>

                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Option</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($question->options as $key => $option)
                                @if($question->option_id == $option->id)
                                <tr style="background-color: rgb(150, 240, 150);">
                                    <td>{{$key+1}}</td>
                                    <td>
                                        {{$option->option}}
                                    </td>
                                    <td>
                                        <button data-toggle="modal" data-target="#edit_modals" id="{{$option->id}}"
                                            option="{{$option->option}}" class="edit-btn btn btn-primary">Edit</button>
                                    </td>
                                </tr>
                                @else
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>
                                        {{$option->option}}
                                    </td>
                                    <td>
                                        <button data-toggle="modal" data-target="#edit_modals" id="{{$option->id}}"
                                            option="{{$option->option}}" class="edit-btn btn btn-primary">Edit</button>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="question_append">

                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>   

<div id="add_question" class="modal fade">
    <div class="modal-dialog modal-lg">

        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Add Question</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="{{route('company.workshop.add_question')}}" method="POST"
                    enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-md-8">
                            <label>Question Statement</label>
                            <textarea rows="2" name="question" style="resize:none"
                                placeholder="Enter Question Statement" class="form-control txt4 q" required></textarea>
                        </div>
                        <div class="col-md-4">
                            <label>Select Correct Option</label>
                            <select class="form-control   mr-3 ms" id="append_more" name="correct" required="true">
                                <option selected disabled value="">Correct Option Number</option>
                                <option value="1">Option: 1</option>
                                <option value="2">Option: 2</option>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="workshop_id" value="{{$workshop->id}}">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group form-float">
                                <input type="text" class="form-control q" placeholder="Enter Option" name="options[]"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group form-float">
                                <input type="text" class="form-control q" placeholder=" Enter Option" name="options[]"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="button" counter="2" class="check btn btn-primary add_options">+</button>
                        </div>
                    </div>
                    <div class="row options_append">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                <button type="submit" id="submit" class="btn btn-primary waves-effect waves-light">Add</button>
            </div>
        </div>
        </form>
    </div>
</div>




<div id="edit_modal" class="modal fade">
    <div class="modal-dialog">
        <form method="POST" enctype="multipart/form-data" id="q_edit">
            @method('put')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Update Question Statement</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Question Statement</label>
                        <textarea class="form-control" id="statement" name="statement" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                    <button type="submit" id="submit" class="btn btn-primary waves-effect waves-light">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div id="delete_modal" class="modal fade">
    <div class="modal-dialog">
        <form id="delete_q" method="POST" enctype="multipart/form-data">
            @method('DELETE')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Delete Question</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                    <button type="submit" id="delete" class="btn btn-primary waves-effect waves-light">Delete</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div id="edit_modals" class="modal fade">
    <div class="modal-dialog">
        <form id="updateForm" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Update Option</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Option</label>
                        <input type="text" id="option" class="form-control" name="option" value="" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('script')
<script src="{{asset('admin/assets/plugins/summernote/dist/summernote.js')}}"></script>
{{--
<script src="{{asset('admin/assets/plugins/jquery-validation/jquery.validate.js')}}"></script> --}}
<!-- Jquery Validation Plugin Css -->
<script src="{{asset('admin/assets/plugins/jquery-steps/jquery.steps.js')}}"></script> <!-- JQuery Steps Plugin Js -->
<script src="{{asset('admin/assets/js/pages/forms/form-wizard.js')}}"></script>
<script src="{{asset('admin/assets/plugins/momentjs/moment.js')}}"></script> <!-- Moment Plugin Js -->
<!-- Bootstrap Material Datetime Picker Plugin Js -->
<script
    src="{{asset('admin/assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}">
</script>
<script src="{{asset('admin/assets/js/pages/forms/basic-form-elements.js')}}"></script>
<script src="{{asset('assets/plugins/select2/select2.min.js')}}"></script>
<script>
    $(document).ready(function(){
        let q_id = 0;
        let counter;
        $('.add_question').on('click', function () {
            $('.question_append').append('<input type="hidden" name="" id="que" value="100">')
            q_id++;
            counter = 2;
        });
        $('.add_options').on('click', function () {
            var count = $(this).attr('counter');
            if (count == 4)
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Only Four options are Allowed!',
                });
            else {
                $(this).attr('counter', 4);
                $('.options_append').append(
                    '<div class="col-md-5">' +
                    '<div class="form-group form-float">' +
                    '<input type="text" class="form-control q" placeholder="Enter Option" name="options[]" required>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-5">' +
                    '<div class="form-group form-float">' +
                    '<input type="text" class="form-control q" placeholder=" Enter Option" name="options[]" required>' +
                    '</div>' +
                    '</div>' +
                    '<div>' +
                    '<button type="button" class="btn btn-danger options_remove" counter="' + counter + '">-</button>' +
                    '</div>'
                );
                        
                $('#append_more').append(
                    '<option value="3">Option: 3</option>' +
                    '<option value="4">Option: 4</option>'
                );
            }
        });
        $('.options_append').on('click', '.options_remove', function () {
            $('.check').attr("counter", function () { return $('.check').attr("counter") - 2 });
            $('.options_append').children().remove();
            $('#append_more').find("option:last").remove();
            $('#append_more').find("option:last").remove();
        });
        $('.remove_question').on('click', function () {
            $('.remove_' + q_id).remove();
            q_id--
        });
        
        $('.edit_question').on('click', function () {
                let id = $(this).attr('id');
                let statement = $(this).attr('statement')
                $('#statement').val(statement);
                $('#q_edit').attr('action','{{route('company.question.update','')}}' +'/'+id);
        });

        $('.edit-btn').click(function(){
            let option = $(this).attr('option');
            let id = $(this).attr('id');
            $('#option').val(option);
            $('#id').val(id);
            $('#updateForm').attr('action','{{route('company.option.update','')}}' +'/'+id);
        }); 
        
        $('.delete-btn').click(function(){
            let id = $(this).attr('id');
            $('#delete_q').attr('action','{{route('company.question.destroy','')}}' +'/'+id);
        });  
        $('#submit').on('click', function (e) {
            let start = $('#start').val();
            let end = $('#end').val();
            let q_end = $('#q_end').val();
            let heading = $('#heading').val();
            let link = $('#link').val();
            let desc = $('#desc').val();
            $.ajax({
                url: "{{route('company.workshop.check')}}",
                type: 'POST',
                data: {
                    start: start,
                    end: end,
                    paper_end_time: q_end,
                    heading: heading,
                    link: link,
                    desc: desc,
                },
                success: function (response) {
                    console.log(response);
                    if (response == 1) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Start Time Error',
                            text: 'Kindly Put Start-Time Rightly',
                        });
                    }
                    else if (response == 2) {
                        Swal.fire({
                            icon: 'error',
                            title: 'End Time Error',
                            text: 'Kindly Put End-Time Rightly',
                        });
                    }
                    else if (response == 3) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Start Questionnaire End Time Error',
                            text: 'Kindly Put Questionnaire-End-Time Rightly',
                        });
                    }
                    else if (response == 4) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Empty Input Field',
                            text: 'Kindly fill-out all input field',
                        });
                    }
                    else if (response == 0) {    
                        $('#form').submit(); 
                    }
                }
            })
        })
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@endsection