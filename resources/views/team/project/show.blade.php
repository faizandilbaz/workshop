@extends('layout.team')
@section('style')
<link rel="stylesheet" href="{{asset('admin/assets/plugins/summernote/dist/summernote.css')}}"/>
<link rel="stylesheet" href="{{asset('admin/assets/plugins/select2/select2.css')}}" />
@endsection
@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Project Detail</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('team.dashboard')}}"><i class="zmdi zmdi-home"></i> Team</a></li>
                        <li class="breadcrumb-item">{{$project->title}}</li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">  
                    <button class="btn btn-danger  float-right" data-toggle="modal" id="{{$project->id}}" data-target="#message_modal"   type="button"> Send Message </button>              
                    <button class="btn btn-info  float-right" type="button"> {{$project->status}}</button>
                    @if($project->status == "Accepted")
                    <button data-toggle="modal" id="{{$project->id}}" data-target="#complete_modal" class="btn btn-success  float-right complete-btn" type="button">Complete Task</button>
                    @endif
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12">
                    <div class="card mcard_4">
                        <div class="body">
                            <div class="user">
                                <h5 class="mt-3 mb-1">{{$project->title}}</h5>
                                @if($project->deadline)
                                <ul class="list-unstyled mt-3 d-flex">
                                    <li class="mr-3" id="deadline" deadline="{{$project->deadline}}"><strong>DeadLine Date:-</strong>{{$project->deadline->format('M d,Y H:i A')}}</li>
                                </ul>
                                @endif
                            </div>
                            <div class="progress-container progress-success">
                                <span class="progress-badge">Total Points</span>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="" aria-valuemin="" aria-valuemax="{{$project->points}}" style="width:%;">
                                        <span class="progress-value">{{$project->points}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="progress-container progress-danger">
                                <span class="progress-badge">Remaining Points</span>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="{{$project->dpoints}}" aria-valuemin="0" aria-valuemax="{{$project->points}}" style="width: {{$project->dpoints}}%;">
                                        <span class="progress-value">{{$project->dpoints}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($project->status == "Accepted" || $project->status == "Completed")
                    <div class="card">
                        <div class="header">
                            <h2><strong>Task</strong> Assigned</h2>
                        </div>
                        <div class="body">
                            @foreach($project->tasks as $task)
                            <small class="text-muted">Employee Name: </small>
                            <p>{{$task->employee->name}}
                                <button data-toggle="modal" id="{{$task->id}}" data-target="#delete_modal" 
                                    class="btn btn-danger float-right btn-sm delete-btn"><i class="zmdi zmdi-delete"></i></button>
                                <button class="btn btn-success float-right btn-sm">{{$task->points}}</button>
                                <button class="btn btn-primary float-right btn-sm">{{$task->status}}</button>
                                <a href="{{route('team.task.show',$task->id)}}">
                                    <button class="btn btn-blue float-right btn-sm"><i class="zmdi zmdi-eye"></i></button>
                                </a>
                            </p>
                            <hr>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
              
                <div class="col-lg-8 col-md-12">
                    <div class="card">
                        <div class="body">
                            <h5>Description</h5>
                            <span>{!! $project->description !!}</span>
                        </div>
                    </div>
                    @if($project->note)
                    <div class="card">
                        <div class="body">
                            <h5>Your Submitted Report</h5>
                            <span>{!! $project->note !!}</span>
                        </div>
                    </div> 
                    @endif
                    @foreach($project->notes as $note)
                    <div class="card">
                        <div class="body">
                            <h5>
                                {{$note->title}}  
                                <button data-toggle="modal" id="{{$note->id}}" data-target="#deletemessage_modal" 
                                    class="btn btn-danger float-right btn-sm deletemessage-btn"><i class="zmdi zmdi-delete"></i></button>
                                @if($note->company_id)
                                @if($note->reply == Null)
                               <button data-toggle="modal" id="{{$note->id}}" data-target="#update_modal" class="btn btn-success update-btn float-right btn-sm">Reply</button>  
                                 @endif
                                 @endif
                            </h5>
                            <div class="status online message-data">
                                <span class="time">{{$note->created_at->format('H:i A')}}</span>
                                <span class="date">{{$note->created_at->format('M d,Y ')}}</span>
                            </div>
                            <div class="message other-message "> 
                                {!! $note->message !!}
                            </div>
                            @if($note->reply)
                            <div class="status online message-data text-right">
                                <span class="time">{{$note->updated_at->format('H:i A')}}</span>
                                <span class="date">{{$note->updated_at->format('M d,Y ')}}</span>                            
                            </div>
                            <div class="message other-message text-right">
                                {!! $note->reply !!}
                            </div>
                            @endif
                        </div>
                    </div>  
                    @endforeach
                    @if($project->status == "Accepted" && $project->dpoints > 0)
                    <div class="card">
                        <div class="body">
                            <h5>Assign Task To Employees</h5>
                            <form  action="{{route('team.task.store')}}" method="POST" enctype="multipart/form-data" id="assignform">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="form-group form-float col-md-6">
                                                <select name="employee_id"  class="form-control show-tick  mr-3 employe_id"  required>
                                                    <option selected disabled value="">-- Select Employee--</option>
                                                    @foreach (Auth::user()->employee as $user)
                                                    <option value="{{$user->id}}">{{$user->name}}</option> 
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-float">
                                                    <input type="text" class="form-control title" placeholder=" Enter Project Title"
                                                        name="title" >  
                                                    <input type="hidden" class="form-control" value="{{Auth::user()->id}}" placeholder=" Enter Employee Name"
                                                        name="team_id" required>
                                                        <input type="hidden" class="form-control" value="{{$project->id}}" placeholder=" Enter Employee Name"
                                                        name="project_id" required>
                                                </div>
                                            </div>
                                        
                                        </div> 
                                        <div class="row">
                                            
                                            <div class="form-group col-md-6">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="zmdi zmdi-time"></i></span>
                                                    </div>
                                                    <input type="datetime-local" onkeydown="return false" name="deadline"
                                                        class="form-control datetime date"  placeholder="Ex: 30/07/2016 23:59">
                                                </div>
                                            </div>
                                            <div class=" form-group col-md-6">
                                                <input type="number" class="form-control points"  name="points" placeholder="Enter Points" required>
                                            </div>
                                        </div>   
                                        <br>
                                        <div class="row">
                                            <div class="form-group col-md-12 txt4">
                                                <textarea rows="4" name="description"  placeholder="Enter description"
                                            class="form-control summernote" ></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="text-right">
                                    <a class="btn btn-raised btn-success waves-effect form">create<a>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endif
                    {{--  @if($project->status == "Accepted" || $project->status == "Completed" )
                    @foreach($project->tasks->where('status','Completed') as $task)
                    <div class="card">
                        <div class="body">
                            <h5>Assign Task To Employees</h5>
                            <form  action="{{route('team.task.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="form-group form-float col-md-6">
                                                <select name="employee_id"  class="form-control show-tick  mr-3"  required>
                                                    <option selected disabled value="">-- Select Employee--</option>
                                                    @foreach (Auth::user()->employee as $user)
                                                    <option value="{{$user->id}}">{{$user->name}}</option> 
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-float">
                                                    <input type="text" class="form-control" placeholder=" Enter Project Title"
                                                        name="title" >  
                                                    <input type="hidden" class="form-control" value="{{Auth::user()->id}}" placeholder=" Enter Employee Name"
                                                        name="team_id" required>
                                                        <input type="hidden" class="form-control" value="{{$project->id}}" placeholder=" Enter Employee Name"
                                                        name="project_id" required>
                                                </div>
                                            </div>
                                        
                                        </div> 
                                        <div class="row">
                                            
                                            <div class="form-group col-md-6">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="zmdi zmdi-time"></i></span>
                                                    </div>
                                                    <input type="datetime-local" onkeydown="return false" name="deadline"
                                                        class="form-control datetime"  placeholder="Ex: 30/07/2016 23:59">
                                                </div>
                                            </div>
                                            <div class=" form-group col-md-6">
                                                <input type="number" class="form-control"  name="points" placeholder="Enter Points" required>
                                            </div>
                                        </div>   
                                        <br>
                                        <div class="row">
                                            <div class="form-group col-md-12 txt4">
                                                <textarea rows="4" name="description"  placeholder="Enter description"
                                            class="form-control summernote" ></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="text-right">
                                    <button class="btn btn-raised btn-success waves-effect" type="submit">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endforeach
                    @endif  --}}
                </div>
            </div>
        </div>
    </div>
</section>
<div id="delete_modal" class="modal fade">
    <div class="modal-dialog">
        <form id="deleteForm" method="POST" enctype="multipart/form-data">
            @csrf
            @method('DELETE') 
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Are You Sure to Delete this Employee Task?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Yes</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div id="deletemessage_modal" class="modal fade">
    <div class="modal-dialog">
        <form id="deletemessageForm" method="POST" enctype="multipart/form-data">
            @csrf
            @method('DELETE') 
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Are You Sure to Delete this Message?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Yes</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div id="complete_modal" class="modal fade">
    <div class="modal-dialog">
        <form action="{{route('team.project.update',$project->id)}}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Complete Project</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Note</label>
                        <textarea rows="4" name="note"  placeholder="Enter Note"
                        class="form-control summernote" ></textarea>
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
<div id="message_modal" class="modal fade">
    <div class="modal-dialog">
        <form action="{{route('team.note.store')}}" method="POST" enctype="multipart/form-data">
            @method('POST')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Send Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Title ">                   
                    </div>
                    <div class="form-group">
                        <label for="name">Message</label>
                        <textarea rows="4" name="message"  placeholder="Enter Note"
                        class="form-control summernote" ></textarea> 
                        <input type="hidden" class="form-control" name="project_id" value="{{$project->id}}">                   
                        <input type="hidden" class="form-control" name="team_id" value="{{Auth::user()->id}}">                   
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Send</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div id="update_modal" class="modal fade">
    <div class="modal-dialog">
        <form id="updateForm" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') 
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Reply</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Reply</label>
                        <textarea rows="4" name="reply"  placeholder="Enter Reply"
                        class="form-control summernote" ></textarea> 
                       </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Reply</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function(){
        $('.delete-btn').click(function(){
            let id = $(this).attr('id');
            $('#id').val(id);
            $('#deleteForm').attr('action','{{route('team.task.destroy','')}}' +'/'+id);
        });
    });
</script>
<script>
    $(document).ready(function(){
        $('.deletemessage-btn').click(function(){
            let id = $(this).attr('id');
            $('#id').val(id);
            $('#deletemessageForm').attr('action','{{route('team.note.destroy','')}}' +'/'+id);
        });
    });
</script>
<script>
    $(document).ready(function(){
        $('.update-btn').click(function(){
            let id = $(this).attr('id');
            $('#id').val(id);
            $('#updateForm').attr('action','{{route('team.note.update','')}}' +'/'+id);
        });
    });
</script>

<script>
    $(document).ready(function(){
        $('.form').click(function(){
         let deadline = $('#deadline').attr('deadline');
         let employ = $('.employe').val();
         let title = $('.title').val();
         let date = $('.date').val();
         let point = $('.point').val();

         if (date == '' || title == '' || employ == '' || point == '' ) {
            Swal.fire({
                            icon: 'error',
                            title: 'Empty Input Field',
                            text: 'Kindly fill-out all input field',
                        });
         }
         else{
             $('#assignform').submit();
         }
        //  else if(new date(deadline)<new date(date)){
        //      alert(1);
        //  }
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{asset('admin/assets/plugins/summernote/dist/summernote.js')}}"></script>  
<script src="{{asset('admin/assets/js/pages/forms/advanced-form-elements.js')}}"></script> 
<script src="{{asset('admin/assets/plugins/select2/select2.min.js')}}"></script> <!-- Select2 Js -->

<script src="{{asset('admin/assets/bundles/c3.bundle.js')}}"></script>
<script src="{{asset('admin/assets/plugins/summernote/dist/summernote.js')}}"></script>
  
@endsection


