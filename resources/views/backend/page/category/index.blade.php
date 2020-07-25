@extends('backend.layout.backend_master')
@section('main')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Categories View</h1>
    @include('backend.partials._message')
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
                       @foreach($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>
                                    @if($category->parent_id==null)
                                        Parent_Category
                                    @else
                                    {{$category->parent['name']}}
                                     @endif
                                </td>
                                <td>
                                    <img src="{{asset('images/category/'.$category->image)}}"alt=""width="80px">
                                </td>
                                <td>
                                    <a href="{{url('/admin/category/edit/'.$category->id)}}" class="btn btn-success btn-icon-split">
                                        <span class="text">Edit</span>
                                    </a>
                                    <form action="{!! route('admin.category.delete',$category->id) !!}"
                                          method="post">
                                        {{csrf_field()}}
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>

                            </tr>
                       @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>



@endsection
