@extends('layout.team')
@section('content')
<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Dashboard</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i>Team</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ul>
                <button class="btn btn-primary btn-icon mobile_menu" type="button"><i
                        class="zmdi zmdi-sort-amount-desc"></i></button>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i
                        class="zmdi zmdi-arrow-right"></i></button>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            @foreach (Auth::user()->employee as $key => $user)
            <div class="col-xl-4 col-lg-12 col-md-12">
                <div class="card mcard_3">
                    <div class="body">
                        @if ($user->image)
                        <a href=""><img src="{{asset($user->image)}}" class="rounded-circle" alt="profile-image"></a>

                        @endif
                        <h4 class="m-t-10">{{$user->name}}</h4>  
                        @if($user->workshopemployees)                          
                        <div class="row">
                            <div class="col-4">                                    
                                <small>Complete Attended Workshops</small>
                                <h5>{{$user->workshopemployee->where('status','0')->count()}}</h5>
                            </div>
                            <div class="col-4">                                    
                                <small>Attended Workshops</small>
                                <h5>{{$user->workshopemployee->where('status','1')->count()}}</h5>
                            </div>
                            <div class="col-4">                                    
                                <small>Obtain Marks</small>
                                <h5>{{$user->workshopemployee->where('status','1')->sum('result')/$user->workshopemployee->where('status','1')->count() }}</h5>
                            </div>                            
                        </div>
                        @endif
                    </div>
                </div>                
            </div>
            @endforeach
        </div>
    </div>
       
</section>
 @endsection