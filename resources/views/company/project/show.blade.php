@extends('layout.company')
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
                    <button class="btn btn-primary  float-right" data-toggle="modal" id="{{$project->id}}" data-target="#message_modal"   type="button"> Send Message </button>
                    <button class="btn btn-info  float-right" type="button"> {{$project->status}}</button>
                    @if($project->getpoints == 0)
                    <button data-toggle="modal" id="{{$project->id}}" data-target="#approved_modal" class="btn btn-success  float-right approve-btn" type="button">Give Points</button>
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
                                    <li class="mr-3"><strong>DeadLine Date:-</strong> {{$project->deadline->format('M d,Y H:i A')}}</li>
                                </ul>
                                @endif
                            </div>
                            <div class="progress-container progress-success">
                                <span class="progress-badge">Total Points</span>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="{{$project->points}}" style="width: {{$project->points}}%;">
                                        <span class="progress-value">{{$project->points}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="progress-container progress-danger">
                                <span class="progress-badge">Total Points Give</span>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="{{$project->getpoints}}" aria-valuemin="0" aria-valuemax="{{$project->getpoints}}" style="width: {{$project->getpoints}}%;">
                                        <span class="progress-value">{{$project->getpoints}}</span>
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
                            <span>{!! $project->description !!}</span>
                        </div>
                    </div>
                    <div class="card">
                        <div class="body">
                            <h5>Team Leader Report</h5>
                            <span>{!! $project->note !!}</span>
                        </div>
                    </div>   
                    @foreach($project->notes as $note)
                    <div class="card">
                        <div class="body">
                            <h5>
                                {{$note->title}} 
                                <button data-toggle="modal" id="{{$note->id}}" data-target="#delete_modal" 
                                    class="btn btn-danger float-right btn-sm delete-btn"><i class="zmdi zmdi-delete"></i></button>
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
<div id="approved_modal" class="modal fade">
    <div class="modal-dialog">
        <form action="{{route('company.project.points',$project->id)}}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Give Points</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">??</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Give Points Out of {{$project->points}}</label>
                        <input type="text" class="form-control" name="getpoints" placeholder="Give Points To Team">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Give Points</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div id="message_modal" class="modal fade">
    <div class="modal-dialog">
        <form action="{{route('company.note.store')}}" method="POST" enctype="multipart/form-data">
            @method('POST')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Send Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">??</button>
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
                        <input type="hidden" class="form-control" name="company_id" value="{{Auth::user()->id}}">                   
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
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">??</button>
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
        $('.update-btn').click(function(){
            let id = $(this).attr('id');
            $('#id').val(id);
            $('#updateForm').attr('action','{{route('company.note.update','')}}' +'/'+id);
        });
    });
</script>
<script>
    $(document).ready(function(){
        $('.delete-btn').click(function(){
            let id = $(this).attr('id');
            $('#id').val(id);
            $('#deleteForm').attr('action','{{route('company.note.destroy','')}}' +'/'+id);
        });
    });
</script>
<script>
    $(document).ready(function(){
        $('.approve-btn').click(function(){
            let id = $(this).attr('id');
            $('#id').val(id);
            $('#deleteForm').attr('action','{{route('team.task.destroy','')}}' +'/'+id);
        });
    });
</script>
<script src="{{asset('admin/assets/plugins/summernote/dist/summernote.js')}}"></script>  
<script src="{{asset('admin/assets/js/pages/forms/advanced-form-elements.js')}}"></script> 
<script src="{{asset('admin/assets/plugins/select2/select2.min.js')}}"></script> <!-- Select2 Js -->

<script src="{{asset('admin/assets/bundles/c3.bundle.js')}}"></script>
<script src="{{asset('admin/assets/plugins/summernote/dist/summernote.js')}}"></script>
  
@endsection


