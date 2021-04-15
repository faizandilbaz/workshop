@extends('layout.employee')
@section('content')
<section class="content">

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <h2><strong>All</strong>Employee</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i>Employee</a></li>
                        <li class="breadcrumb-item active">Info</li>
                        <li class="breadcrumb-item active">All</li>
                    </ul>
                </div>
                <div class="body">

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Employee Name</th>
                                    <th>Employee Email</th>
                                    <th>Employee Phone No</th>
                                    <th>Employee Adress</th>
                                    <th>Action</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Employee1</td>
                                    <td>Employee@mail.com</td>
                                    <td>123456678788</td>
                                    <td>Employee1, Main street at present </td>
                                    <td>
                                        <a href="{{ route('employee.info.edit',) }}" type="submit" class="btn btn-warning edit">Edit</a>
                                    </td>
                                    <td>
                                        <form action="#" method="POST">

                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Employee2</td>
                                    <td>Employee2@mail.com</td>
                                    <td>123456678788</td>
                                    <td>Employee2, Main street at present</td>
                                    <td>
                                        <a href="{{ route('employee.info.edit',) }}" type="submit" class="btn btn-warning edit">Edit</a>
                                    </td>
                                    <td>
                                        <form action="#" method="POST">

                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Employee3</td>
                                    <td>EmployeeCompany3@mail.com</td>
                                    <td>123456678788</td>
                                    <td>Employee3, Main street at present</td>
                                    <td>
                                        <a href="{{ route('employee.info.edit',) }}" type="submit" class="btn btn-warning edit">Edit</a>
                                    </td>
                                    <td>
                                        <form action="#" method="POST">

                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Employee4</td>
                                    <td>Employee4@mail.com</td>
                                    <td>123456678788</td>
                                    <td>Employee4, Main street at present</td>
                                    <td>
                                        <a href="{{ route('employee.info.edit',) }}" type="submit" class="btn btn-warning edit">Edit</a>
                                    </td>
                                    <td>
                                        <form action="#" method="POST">

                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Employee5</td>
                                    <td>Employee5@mail.com</td>
                                    <td>123456678788</td>
                                    <td>Employee5, Main street at present</td>
                                    <td>
                                        <a href="{{ route('employee.info.edit',) }}" type="submit" class="btn btn-warning edit">Edit</a>
                                    </td>
                                    <td>
                                        <form action="#" method="POST">

                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
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