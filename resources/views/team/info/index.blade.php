@extends('layout.team')
@section('content')
<section class="content">

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <h2><strong>All</strong>Companys</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i>Team</a></li>
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
                                    <th>Company Name</th>
                                    <th>Company Email</th>
                                    <th>Company Phone No</th>
                                    <th>Company Adress</th>
                                    <th>Action</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Company1</td>
                                    <td>Company1@mail.com</td>
                                    <td>123456678788</td>
                                    <td>Company1, Main street at present </td>
                                    <td>
                                        <a href="{{ route('company.info.edit',) }}" type="submit" class="btn btn-warning edit">Edit</a>
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
                                    <td>Company2@mail.com</td>
                                    <td>123456678788</td>
                                    <td>Company2, Main street at present</td>
                                    <td>
                                        <a href="{{ route('team.info.edit',) }}" type="submit" class="btn btn-warning edit">Edit</a>
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
                                    <td>Company3@mail.com</td>
                                    <td>123456678788</td>
                                    <td>Company3, Main street at present</td>
                                    <td>
                                        <a href="{{ route('team.info.edit',) }}" type="submit" class="btn btn-warning edit">Edit</a>
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
                                    <td>Company4@mail.com</td>
                                    <td>123456678788</td>
                                    <td>Company4, Main street at present</td>
                                    <td>
                                        <a href="{{ route('team.info.edit',) }}" type="submit" class="btn btn-warning edit">Edit</a>
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
                                    <td>Company5@mail.com</td>
                                    <td>123456678788</td>
                                    <td>Company5, Main street at present</td>
                                    <td>
                                        <a href="{{ route('team.info.edit',) }}" type="submit" class="btn btn-warning edit">Edit</a>
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