@extends('layout.team')
@section('content')
<section class="content">

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <h2><strong>All</strong>Employee</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i>Team</a></li>
                        <li class="breadcrumb-item active">Employee</li>
                        <li class="breadcrumb-item active">All</li>
                    </ul>
                </div>
                <div class="body">

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Company Name</th>
                                    <th>Team Name</th>
                                    <th>Employee Name</th>
                                    <th>Employee Gmail</th>
                                    <th>Employee Address</th>
                                    <th>Action</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Company1</td>
                                    <td>Team1</td>
                                    <td>Employee1</td>
                                    <td>employee1@mail.com</td>
                                    <td></td>
                                    <td>
                                        <a href="{{ route('team.employee.edit',) }}" type="submit" class="btn btn-warning edit">Edit</a>
                                    </td>
                                    <td>
                                        <form action="#" method="POST">

                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Company2</td>
                                    <td>Team2</td>
                                    <td>Employee2</td>
                                    <td>employee2@mail.com</td>
                                    <td></td>
                                    <td>
                                        <a href="{{ route('team.employee.edit',) }}" type="submit" class="btn btn-warning edit">Edit</a>
                                    </td>
                                    <td>
                                        <form action="#" method="POST">

                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Company3</td>
                                    <td>Team3</td>
                                    <td>Employee3</td>
                                    <td>employee3@mail.com</td>
                                    <td></td>
                                    <td>
                                        <a href="{{ route('team.employee.edit',) }}" type="submit" class="btn btn-warning edit">Edit</a>
                                    </td>
                                    <td>
                                        <form action="#" method="POST">

                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Company4</td>
                                    <td>Team4</td>
                                    <td>Employee4</td>
                                    <td>employee4@mail.com</td>
                                    <td></td>
                                    <td>
                                        <a href="{{ route('team.employee.edit',) }}" type="submit" class="btn btn-warning edit">Edit</a>
                                    </td>
                                    <td>
                                        <form action="#" method="POST">

                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Company5</td>
                                    <td>Team5</td>
                                    <td>Employee5</td>
                                    <td>employee5@mail.com</td>
                                    <td></td>
                                    <td>
                                        <a href="{{ route('team.employee.edit',) }}" type="submit" class="btn btn-warning edit">Edit</a>
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