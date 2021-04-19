@extends('layout.admin')
@section('content')
<section class="content">

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <h2><strong>All</strong>Teams</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i>Admin</a></li>
                        <li class="breadcrumb-item active">Team</li>
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
                                    <th>Team Gmail</th>
                                    <th>Team Addres</th>
                                    <th>Action</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Company1</td>
                                    <td>Team1</td>
                                    <td>Team1@mail.com</td>
                                    <td></td>
                                    <td>
                                        <a href="{{ route('admin.team.edit',) }}" type="submit" class="btn btn-warning edit">Edit</a>
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
                                    <td>Team2@mail.com</td>
                                    <td></td>
                                    <td>
                                        <a href="{{ route('admin.team.edit',) }}" type="submit" class="btn btn-warning edit">Edit</a>
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
                                    <td>Team3@mail.com</td>
                                    <td></td>
                                    <td>
                                        <a href="{{ route('admin.team.edit',) }}" type="submit" class="btn btn-warning edit">Edit</a>
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
                                    <td>Team4@mail.com</td>
                                    <td></td>
                                    <td>
                                        <a href="{{ route('admin.team.edit',) }}" type="submit" class="btn btn-warning edit">Edit</a>
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
                                    <td>Team5@mail.com</td>
                                    <td></td>
                                    <td>
                                        <a href="{{ route('admin.team.edit',) }}" type="submit" class="btn btn-warning edit">Edit</a>
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