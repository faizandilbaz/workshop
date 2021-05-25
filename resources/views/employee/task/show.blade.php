@extends('layout.employee')
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
                    <h2>Task Detail</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('team.dashboard')}}"><i class="zmdi zmdi-home"></i> Team</a></li>
                        <li class="breadcrumb-item">{{$task->title}}</li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">  
                    <button class="btn btn-danger  float-right" data-toggle="modal" id="{{$task->id}}" data-target="#message_modal" type="button"> Send Message </button>              
                    <button class="btn btn-info  float-right" type="button"> {{$task->status}}</button>
                    @if($task->status == "Running")
                    <button data-toggle="modal" id="{{$task->id}}" data-target="#complete_modal" class="btn btn-success  float-right complete-btn" type="button">Complete Task</button>
                    @endif
                    @if ((Carbon\Carbon::now())>(Carbon\Carbon::parse($task->deadline)))
                                          <button class="btn btn-lg btn-danger  float-right" disabled><i class="danger"></i> Deadline Reached</button>
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
                                <h5 class="mt-3 mb-1">{{$task->title}}</h5>
                                @if($task->deadline)
                                <ul class="list-unstyled mt-3 d-flex">
                                    <li class="mr-3"><strong>DeadLine Date:-</strong> {{$task->deadline->format('M d,Y H:i A')}}</li>
                                </ul>
                                @endif
                            </div>
                            <div class="progress-container progress-success">
                                <span class="progress-badge">Total Points</span>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                        <span class="progress-value">100</span>
                                    </div>
                                </div>
                            </div>
                            <div class="progress-container progress-danger">
                                <span class="progress-badge">Total Points Gained</span>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="{{$task->getpoints}}" aria-valuemin="0" aria-valuemax="{{$task->getpoints}}" style="width: {{$task->getpoints}}%;">
                                        <span class="progress-value">{{$task->getpoints}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              
                <div class="col-lg-8 col-md-12">
                    <div class="card">
                        <div class="body">
                            <h5>Description</h5>
                            <span>{!! $task->description !!}</span>
                        </div>
                    </div>
                    @if($task->note)
                    <div class="card">
                        <div class="body">
                            <h5>Your Submitted Report</h5>
                            <span>{!! $task->note !!}</span>
                        </div>
                    </div> 
                    @endif
                    @foreach($task->employeenotes as $note)
                    <div class="card">
                        <div class="body">
                            <h5>
                                {{$note->title}}  
                                <button data-toggle="modal" id="{{$note->id}}" data-target="#deletemessage_modal" 
                                    class="btn btn-danger float-right btn-sm deletemessage-btn"><i class="zmdi zmdi-delete"></i></button>
                                @if($note->team_id)
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
                </div>
            </div>
        </div>
    </div>
</section>
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
        <form action="{{route('employee.task.update',$task->id)}}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Complete Task</h5>
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
        <form action="{{route('employee.employeenote.store')}}" method="POST" enctype="multipart/form-data">
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
                        <input type="hidden" class="form-control" name="project_id" value="{{$task->project->id}}">                   
                        <input type="hidden" class="form-control" name="task_id" value="{{$task->id}}">                   
                        <input type="hidden" class="form-control" name="employee_id" value="{{Auth::user()->id}}">                   
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
        $('.deletemessage-btn').click(function(){
            let id = $(this).attr('id');
            $('#id').val(id);
            $('#deletemessageForm').attr('action','{{route('employee.employeenote.destroy','')}}' +'/'+id);
        });
    });
</script>
<script>
    $(document).ready(function(){
        $('.update-btn').click(function(){
            let id = $(this).attr('id');
            $('#id').val(id);
            $('#updateForm').attr('action','{{route('employee.employeenote.update','')}}' +'/'+id);
        });
    });
</script>
<script src="{{asset('admin/assets/plugins/summernote/dist/summernote.js')}}"></script>  
<script src="{{asset('admin/assets/js/pages/forms/advanced-form-elements.js')}}"></script> 
<script src="{{asset('admin/assets/plugins/select2/select2.min.js')}}"></script> <!-- Select2 Js -->

<script src="{{asset('admin/assets/bundles/c3.bundle.js')}}"></script>
<script src="{{asset('admin/assets/plugins/summernote/dist/summernote.js')}}"></script>
  
@endsection


