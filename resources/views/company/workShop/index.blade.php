@extends('layout.company')
@section('style')

@endsection
@section('content')
<section class="content">

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <h2><strong>All</strong>Work Shope</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i>Company</a></li>
                        <li class="breadcrumb-item active">WorkShope</li>
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
                                    <th>Link</th>
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
                                    <td>{{$workshop->description}}</td>
                                    <td>{{$workshop->link}}</td>
                                    <td>
                                        <a href="{{ route('company.workshop.edit',$workshop->id) }}" type="submit" class="btn btn-warning edit">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{route('company.workshop.destroy',$workshop->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button data-toggle="modal" data-target="#delete_modal"
                                                class="btn btn-danger delete-btn"> Delete</button>
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
{{-- <script src="{{asset('admin/assets/plugins/jquery-validation/jquery.validate.js')}}"></script> --}}
<!-- Jquery Validation Plugin Css -->
<script src="{{asset('admin/assets/plugins/jquery-steps/jquery.steps.js')}}"></script> <!-- JQuery Steps Plugin Js -->
<script src="{{asset('admin/assets/js/pages/forms/form-wizard.js')}}"></script>
<script src="{{asset('admin/assets/plugins/momentjs/moment.js')}}"></script> <!-- Moment Plugin Js -->
@endsection