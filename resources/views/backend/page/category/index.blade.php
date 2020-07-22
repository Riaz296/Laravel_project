@extends('backend.layout.backend_master')
@section('main')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Categories View</h1>

    <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All Categories</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Parent Category</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>1</td>
                                <td>Audio</td>
                                <td>Electronic Devices</td>
                                <td>Image</td>
                                <td>
                                    <a href="#" class="btn btn-success btn-icon-split">

                                        <span class="text">Edit</span>
                                    </a>
                                    <a href="#" class="btn btn-danger btn-icon-split">

                                        <span class="text">Delete</span>
                                    </a>
                                </td>

                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>



@endsection
