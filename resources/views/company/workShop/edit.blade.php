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
                            <div class="body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Workshop Start Time</label>
                                        <div class="input-group masked-input mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="zmdi zmdi-calendar-note"></i></span>
                                            </div>
                                            <input type="text" name="start" value="{{$workshop->start->format('d/m/Y H:i A')}}" class="form-control datetime" placeholder="Ex: 30/07/2016 23:59">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Workshop End Time</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="zmdi zmdi-time"></i></span>
                                            </div>
                                            <input type="datetime-local"  name="end"  class="form-control datetime"
                                            placeholder="{{$workshop->end->format('d/m/Y H:i A')}}">
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
                                        <label>Questionnaire End Time</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="zmdi zmdi-time"></i></span>
                                            </div>
                                            <input type="text" name="paper_end_time" class="form-control datetime"
                                                value="{{$workshop->paper_end_time->format('d/m/Y H:i A')}}">
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
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="body">
                    <h4>Questions</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Team Name</th>
                                    <th>Employee Name</th>
                                    <th>Employee Email</th>
                                    <th>Employee Detail</th>
                                    <th>Action</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($workshop->questions as $key => $question)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$question->statement}}</td>
                                    <td>{{$question->}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->detail}}</td>
                                    <td>
                                        <a href="{{ route('company.employee.edit',$user->id) }}" type="submit" class="btn btn-warning edit">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('company.employee.destroy',$user->id) }}" method="POST">
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