@extends('layout.company')
@section('style')
@endsection
@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2><strong>Edit</strong> Team</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i>Company</a></li>
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
                        <form action="{{route('company.workshop.update',$workshop->id)}}" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf        
                            {{-- {{dd($workshop)}}                     --}}
                            <div class="body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Workshope Start Time</label>
                                        <div class="input-group masked-input mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="zmdi zmdi-calendar-note"></i></span>
                                            </div>
                                            <input type="datetime-local" name="start" 
                                             class="form-control datetime" value="{{Carbon\Carbon::parse($workshop->start)->format('Y-m-d\TH:i')}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Workshope End Time</label>
                                        <div class="input-group masked-input mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="zmdi zmdi-calendar-note"></i></span>
                                            </div>
                                            <input type="datetime-local" name="end" value="{{Carbon\Carbon::parse($workshop->end)->format('Y-m-d\TH:i')}}" class="form-control" >
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <input type="text" class="form-control" value="{{$workshop->heading}}"
                                                name="heading" required>
                                            <input type="hidden" class="form-control" value="{{$workshop->company_id}}"
                                                name="company_id" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <input type="url" class="form-control"
                                                value="{{$workshop->link}}" name="link"
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12 txt4">
                                        <label>Description</label>
                                        <textarea rows="4" name="description" placeholder="Enter description"
                                            class="form-control txt4">{{$workshop->description}}</textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Questionnaire Start Time</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="zmdi zmdi-time"></i></span>
                                            </div>
                                            <input type="text"  class="form-control"
                                                value="{{$workshop->end->format('d/m/Y H:i A')}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Questionnaire End Time</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="zmdi zmdi-time"></i></span>
                                            </div>
                                            <input type="datetime-local"  name="paper_end_time" value={{Carbon\Carbon::parse($workshop->paper_end_time)->format('Y-m-d\TH:i')}} class="form-control datetime">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <button  class="btn btn-raised btn-success waves-effect" type="submit">Update</button>
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
                            <h4>{{$question->statement}}</h4>
                        </div>
                        <div class="col-md-2">
                            <button statement="{{$question->statement}}" id="{{$question->id}}" data-toggle="modal" data-target="#edit_modal"class="btn btn-info btn-icon float-right">
                                <i class="zmdi zmdi-edit"></i>
                            </button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Team Name</th>
                                    <th>Action</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($question->options as $key => $option)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$option->option}}</td>
                                    <td>
                                        <button data-toggle="modal" data-target="#edit_modals" 
                                        id="{{$option->id}}" option="{{$option->option}}"  class="edit-btn btn btn-primary">Edit</button>
                                    </td>
                                    <td>
                                        <form action="{{ route('company.option.destroy',$option->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger delete-btn"> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
<div id="edit_modal" class="modal fade">
    <div class="modal-dialog">
        <form action="{{route('company.question.update',$question->id)}}" method="POST" enctype="multipart/form-data">
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
                        <textarea class="form-control"  id="statement" name="statement" required>{{$question->statement}}</textarea>
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
                        <input type="text" class="form-control" name="option" value="{{$option->option}}">
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
<script>
    $(document).ready(function(){
        $('.edit-btn').click(function(){
            let option = this.option;
            let id = $(this).attr('id');
            $('#option').val(option);
            $('#id').val(id);
            $('#updateForm').attr('action','{{route('company.option.update','')}}' +'/'+id);
        });
    });
</script>
@endsection