@extends('layout.company')
@section('style')
<link rel="stylesheet" href="{{asset('admin/assets/plugins/summernote/dist/summernote.css')}}"/>
@endsection
@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>{{$project->title}} Project</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('company.dashboard')}}"><i class="zmdi zmdi-home"></i>Company</a></li>
                        <li class="breadcrumb-item active"> {{$project->title}} Project</li>
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
                        <form action="{{route('company.project.update',$project->id)}}" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf        
                            <div class="body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="form-group form-float col-md-4">
                                                <select name="team_id"  class="form-control show-tick  mr-3"  required>
                                                    <option value="{{$project->team->id}}">{{$project->team->name}}</option>
                                                    @foreach (Auth::user()->teams as $team)
                                                    <option value="{{$team->id}}">{{$team->name}}</option> 
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                    <input type="text" class="form-control" value="{{$project->title}}" placeholder=" Enter Project Title"
                                                        name="title" >  
                                                    <input type="hidden" class="form-control" value="{{Auth::user()->id}}" placeholder=" Enter Employee Name"
                                                        name="company_id" required>
                                                </div>
                                            </div>
                                            <div class=" form-group col-md-4">
                                                <input type="number" class="form-control" value="{{$project->points}}"  name="points" placeholder="Enter Points" required>
                                            </div>
                                        
                                        </div> 
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="zmdi zmdi-time"></i></span>
                                                    </div>
                                                    <input type="text"  value="{{$project->deadline->format('d/m/Y H:i A')}}"
                                                        class="form-control"  readonly>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group col-md-6">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="zmdi zmdi-time"></i></span>
                                                    </div>
                                                    <input type="datetime-local" onkeydown="return false" name="deadline"
                                                        class="form-control datetime" value="{{$project->deadline}}" placeholder="Ex: 30/07/2016 23:59" required>
                                                </div>
                                            </div>
                                           
                                        </div>   
                                        <br>
                                        <div class="row">
                                            <div class="form-group col-md-12 txt4">
                                                <textarea rows="4" name="description"  placeholder="Enter description"
                                            class="form-control summernote" >{{$project->description}}</textarea>
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
<script src="{{asset('admin/assets/plugins/summernote/dist/summernote.js')}}"></script>   
@endsection