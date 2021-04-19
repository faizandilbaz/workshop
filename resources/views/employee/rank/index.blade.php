@extends('layout.employee')
@section('style')
<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- Favicon-->
<link rel="stylesheet" href="{{ asset('admin/assets/plugins/bootstrap/css/bootstrap.min.css') }}">
<!-- Morris Chart Css-->
<link rel="stylesheet" href="{{ asset('admin/assets/plugins/morrisjs/morris.css') }}" />
<!-- Colorpicker Css -->
<link rel="stylesheet" href="{{ asset('admin/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css') }}" />
<!-- Multi Select Css -->
<link rel="stylesheet" href="{{ asset('admin/assets/plugins/multi-select/css/multi-select.css') }}">
<!-- Bootstrap Spinner Css -->
<link rel="stylesheet" href="{{ asset('admin/assets/plugins/jquery-spinner/css/bootstrap-spinner.css') }}">
<!-- Bootstrap Tagsinput Css -->
<link rel="stylesheet" href="{{ asset('admin/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
<!-- Bootstrap Select Css -->
<link rel="stylesheet" href="{{ asset('admin/assets/plugins/bootstrap-select/css/bootstrap-select.css') }}" />
<!-- noUISlider Css -->
<link rel="stylesheet" href="{{ asset('admin/assets/plugins/nouislider/nouislider.min.css') }}" />
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('admin/assets/plugins/select2/select2.css') }}" />
<!-- Custom Css -->
<link rel="stylesheet" href="{{ asset('admin/assets/css/style.min.css') }}">
@endsection
@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Profile</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i>Employee</a></li>
                        <li class="breadcrumb-item active">Rank</li>
                        
                    </ul>
                </div>
                <div class="card">
                    <div class="header">
                        <h2><strong>Employee</strong> Rank</h2>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover theme-color c_table">
                            <thead>
                                <tr>
                                    <th>Rank</th>
                                    <th>Profile</th>
                                    <th>Employee Name</th>
                                    <th>Attend WorkShope</th>
                                    <th>Missed WorkShope</th>
                                    <th>Points</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td class="w70"><img class="w50" src="{{asset ('admin/assets/images/ecommerce/1.png') }}" alt=""></td>
                                    <td><a href="javascript:void(0)" class="text-muted">Employee2</a></td>
                                    <td><a href="javascript:void(0)" class="text-muted">2</a></td>
                                    <td><a href="javascript:void(0)" class="text-muted">3</a></td>

                                    <td>3,432</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td class="w70"><img class="w50" src="{{asset ('admin/assets/images/ecommerce/1.png') }}" alt=""></td>
                                    <td><a href="javascript:void(0)" class="text-muted">Employee1</a></td>
                                    <td><a href="javascript:void(0)" class="text-muted">3</a></td>
                                    <td><a href="javascript:void(0)" class="text-muted">1</a></td>
                                    <td>3,000</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td class="w70"><img class="w50" src="{{asset ('admin/assets/images/ecommerce/1.png') }}" alt=""></td>
                                    <td><a href="javascript:void(0)" class="text-muted">Employee3</a></td>
                                    <td><a href="javascript:void(0)" class="text-muted">4</a></td>
                                    <td><a href="javascript:void(0)" class="text-muted">1</a></td>
                                    <td>2500</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td class="w70"><img class="w50" src="{{asset ('admin/assets/images/ecommerce/1.png') }}" alt=""></td>
                                    <td><a href="javascript:void(0)" class="text-muted">Employee4</a></td>
                                    <td><a href="javascript:void(0)" class="text-muted">1</a></td>
                                    <td><a href="javascript:void(0)" class="text-muted">4</a></td>
                                    <td>2000</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td class="w70"><img class="w50" src="{{asset ('admin/assets/images/ecommerce/1.png') }}" alt=""></td>
                                    <td><a href="javascript:void(0)" class="text-muted">Employee5</a></td>
                                    <td><a href="javascript:void(0)" class="text-muted">5</a></td>
                                    <td><a href="javascript:void(0)" class="text-muted">0</a></td>
                                    <td>1000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>              
                </div>
            </div>
        </div>

       
    </div>

</section>
@endsection