@extends('layout.employee')
@section('style')
@endsection
@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Profile</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('employee.dashboard')}}"><i class="zmdi zmdi-home"></i>Employee</a></li>
                        <li class="breadcrumb-item active">Workshop</li>
                        <li class="breadcrumb-item active">workshope name</li>
                    </ul>
                </div>

            </div>
        </div>
        @foreach($questions as $question)
        <div class="card">
            <div class="body">
                <div class="row">
                    <div class="col-md-12">
                        <p>{{$question->statement}}</p>
                    </div>
                    @foreach($question->options as $key => $option)
                    <div class="col-md-6">
                        <div class="light_dark">
                            <div class="radio">
                                <input type="radio" name="{{$question->statement}}" id="{{$option->option.$key}}" value="{{$option->option}}">
                                <label for="{{$option->option.$key}}">{{$option->option}}</label>
                            </div> 
                        </div>                   
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
        <a href="#" class="btn btn-raised btn-success waves-effect mt-5 float-right" type="submit">Update</a>
    </div>

</section>
@endsection