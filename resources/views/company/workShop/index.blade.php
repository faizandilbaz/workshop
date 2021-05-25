@extends('layout.company')
@section('style')

@endsection
@section('content')
<section class="content">

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <h2><strong>All</strong>Work Shop</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('company.dashboard')}}"><i class="zmdi zmdi-home"></i>Company</a></li>
                        <li class="breadcrumb-item active">WorkShop</li>
                        <li class="breadcrumb-item active">All</li>
                    </ul>
                </div>
                <div class="body">

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Heading</th>
                                    <th>Start</th>
                                    <th>END</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Auth::user()->workshops as $key => $workshop)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$workshop->heading}}</td>
                                    <td>{{$workshop->start->format('M d,Y H:i')}}</td>
                                    <td>{{$workshop->end->format('M d,Y H:i')}}</td>
                                    <td>{!! $workshop->description  !!}</td>
                                    <td>
                                        <a href="{{ route('company.workshop.edit',$workshop->id) }}" type="submit" class="btn btn-warning edit">Edit</a>
                                    </td>
                                    <td>
                                        <button id="{{$workshop->id}}" data-toggle="modal" data-target="#delete_modal"
                                            class="btn btn-danger delete-btn">
                                            Delete
                                        </button>
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
    

    <div id="delete_modal" class="modal fade">
        <div class="modal-dialog">
            <form id="delete_q" method="POST" enctype="multipart/form-data">
                @method('DELETE')
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0" id="myModalLabel">Delete Workshop</h5>
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

</section>
@endsection
@section('script')
{{-- <script src="{{asset('admin/assets/plugins/jquery-validation/jquery.validate.js')}}"></script> --}}
<!-- Jquery Validation Plugin Css -->
<script src="{{asset('admin/assets/plugins/jquery-steps/jquery.steps.js')}}"></script> <!-- JQuery Steps Plugin Js -->
<script src="{{asset('admin/assets/js/pages/forms/form-wizard.js')}}"></script>
<script src="{{asset('admin/assets/plugins/momentjs/moment.js')}}"></script> 
<!-- Moment Plugin Js -->
<script>
     $(document).ready(function(){
     $('.delete-btn').click(function(){
            let id = $(this).attr('id');
            $('#delete_q').attr('action','{{route('company.workshop.destroy','')}}' +'/'+id);
        });
    });
</script>
@endsection
