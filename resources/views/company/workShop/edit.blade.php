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
                        <li class="breadcrumb-item active">WorkShope</li>
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
                        <form action="#" method="POST">
                            <div class="body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Start Time</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="zmdi zmdi-time"></i></span>
                                            </div>
                                            <input type="text" class="form-control timepicker"
                                                placeholder="Please choose starting  time..." value="1:00PM">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>End Time</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="zmdi zmdi-time"></i></span>
                                            </div>
                                            <input type="text" class="form-control timepicker"
                                                placeholder="Please choose End time..." value="3:30PM">
                                        </div>
                                    </div>
                                </div>
    
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <input type="text" class="form-control" placeholder=" Enter Heading" value="Build Modren Skill" name="name"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                            <div class="form-group form-float">
                                                <input type="url" class="form-control"
                                                    placeholder=" Enter link: http://, https://, ftp://" value="https://www.youtube.com" name="url" required>
                                            </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12 txt4">
                                        <label>Description</label>
                                        <textarea rows="4" name="description" placeholder="Enter description"  class="form-control txt4" ></textarea>
                                    </div>
                                </div>
                                <div class="row align-right">
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-success waves-effect m-r-20"
                                            data-toggle="modal" data-target="#largeModal">Add Questions </button>
    
                                    </div>
    
                                </div>
                            </div>
                                
                                <a href="{{ route('company.shop.index') }}" class="btn btn-raised btn-success waves-effect" type="submit">Update</a>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="title" id="largeModalLabel">Add Questions</h4>
                        
                    </div>
                    <div class="modal-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="radio inlineblock m-r-20">
                                    <input type="radio"  class="with-gap" value="1">
                                    <label for="true">(True/False)</label>
                                </div>
                                <div class="radio inlineblock">
                                    <input type="radio" class="with-gap" value="2"
                                        checked="">
                                    <label for="Female">Multiple Choice Question</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="wizard_vertical">
                        <h2>First Question</h2>
                        <section>
                            <p>How many Provinceses of pakistan? </p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="radio inlineblock m-r-20">
                                            <input type="radio" class="with-gap" value="3">
                                            <label for="Female">One</label>
                                        </div>
                                        <div class="radio inlineblock">
                                            <input type="radio" class="with-gap" value="4"
                                                checked="">
                                            <label for="">Two</label>
                                        </div>
                                        <div class="radio inlineblock m-r-20">
                                            <input type="radio" class="with-gap" value="5">
                                            <label for="">One</label>
                                        </div>
                                        <div class="radio inlineblock">
                                            <input type="radio" class="with-gap" value="6"
                                                checked="">
                                            <label for="">Two</label>
                                        </div>
                                    </div>
                                </div>
    
                            </div>
                            <a href="#" class="btn btn-raised btn-success waves-effect" type="submit">save</a>
    
                        </section>
                        <h2>Second Question</h2>
                        <section>
                            <p> Sargodha is famous for? </p>
                            <a href="#" class="btn btn-raised btn-success waves-effect" type="submit">save</a>
    
                        </section>
                        <h2>Third Question</h2>
                        <section>
                            <p> How many Provinceses of pakistan? </p>
                            <a href="#" class="btn btn-raised btn-success waves-effect" type="submit">save</a>
    
                        </section>
                        <h2>Forth Question</h2>
                        <section>
                            <p> Sargodha is famous for? </p>
                            <a href="#" class="btn btn-raised btn-success waves-effect" type="submit">save</a>
    
                        </section>
                        <h2>Fifth Question</h2>
                        <section>
                            <p> How many Provinceses of pakistan? </p>
                            <a href="#" class="btn btn-raised btn-success waves-effect" type="submit">save</a>
    
                        </section>
                    </div>
                </div>
                <div class="modal-footer">
                   
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