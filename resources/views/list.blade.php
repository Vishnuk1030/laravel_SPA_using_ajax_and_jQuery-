<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel SPA</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte.css') }}">
</head>

<body class="hold-transition sidebar-mini">
    <div class="contaoner-flex">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="../../index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <!-- Messages Dropdown Menu -->

                <!-- Notifications Dropdown Menu -->

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        {{-- @include('menu') --}}


        <!-- Content Wrapper. Contains page content -->
        <div class="container-flex">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                        </div>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#newModal">Add new</button>

                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Employee Table</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body" delete-action="{{ route('delete') }}">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>Name</th>
                                                <th>Mobile</th>
                                                <th>Email</th>
                                                <th>Designation</th>
                                                <th>Department</th>
                                                <th style="width: 40px">action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="renderTr">
                                            @foreach ($employees as $employee)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $employee->name }}</td>
                                                    <td>{{ $employee->mobile }}</td>
                                                    <td>{{ $employee->email }}</td>
                                                    <td>{{ $employee->designation->name }}</td>
                                                    <td>{{ $employee->designation->department->name }}</td>
                                                    <td><button class="btn btn-danger deleteRow"
                                                            each-id="{{ encrypt($employee->id) }}">delete</button></td>
                                                </tr>
                                            @endforeach


                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer clearfix">
                                    <ul class="pagination pagination-sm m-0 float-right">
                                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /.card -->


                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>

                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.2.0
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>

        <div class="modal" save-action="{{ route('save') }}" fetch-designation="{{ route('fetch.Designation') }}"
            token="{{ csrf_token() }}" id="newModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">New Employee</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Employee Name:</label>
                                <input type="text" name="emp_name" class="form-control" id="recipient-name">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">gender:</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="1">male</option>
                                    <option value="2">female</option>
                                    <option value="3">others</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Date of birth:</label>
                                <input type="text" class="form-control datepicker" name="dob">
                            </div>

                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Address:</label>
                                <input type="text" name="address" class="form-control" id="">
                            </div>

                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Mobile:</label>
                                <input type="number" name="mob" class="form-control" id="recipient-name">
                            </div>

                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Email:</label>
                                <input type="text" name="email" class="form-control" id="recipient-name">
                            </div>

                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Department:</label>
                                <select name="department" class="form-control">
                                    <option value="">Select an option</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Designation:</label>
                                <select name="designation" id="designation" class="form-control">
                                    {{-- designation name options is goes here in jquery and ajax --}}
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Date of join:</label>
                                <input type="text" class="form-control datepicker" name="doj">
                            </div>

                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Image:</label>
                                <input type="file" class="form-control" name="image">
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary saveEmployee">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('asset/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('asset/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('asset/adminlte.min.js') }}"></script>

    {{-- jquery datepicker cdn --}}
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
    {{-- jquery cdn --}}
    <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>

    {{-- save form using ajax and jquery --}}
    <script src="{{ asset('asset/main.js') }}"></script>


</body>

</html>
