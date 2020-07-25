@extends('backend.layout.backend_master')
@section('main')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Edit Category {{$category->name}}</h1>
        @include('backend.partials._message')
        <form action="{{route('admin.category.update',$category->id)}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{$category->name}}">
            </div>
            <div class="form-group">
                <label for="exampleInputText">Description</label>
                <textarea class="form-control" rows="4" cols="40" name="description" id="exampleInputText">{{$category->description}}</textarea>
            </div>

            <div class="form-group">
                <label for="exampleInputText">Parent Category</label>
                <select class="form-control" name="parent_id">
                    <option value="">Please select  a Primary Category</option>
                    @foreach($main_categories as $categorys)
                        <option value="{{$categorys->id}}"{{$categorys->id == $category->parent_id ? 'selected' : ''}}>{{$categorys->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="old_image">Category Old Image</label><br>
                <img src="{!! asset('images/category/'.$category->image) !!}" width="100">
            </div>

            <div class="form-group">
                <label for="new_image">Category New Image</label>
                <input type="file" class="form-control" name="image" id="new_image">
            </div>
            {{--multiple image from--}}
            {{--<div class="form-group">--}}
            {{--<label for="productImage">Product Image</label>--}}

            {{--<div class="row">--}}
            {{--<div class="col-md-4">--}}
            {{--<input type="file" class="form-control" name="product_image[]" id="productImage">--}}
            {{--</div>--}}
            {{--<div class="col-md-4">--}}
            {{--<input type="file" class="form-control" name="product_image[]" id="productImage">--}}
            {{--</div>--}}
            {{--<div class="col-md-4">--}}
            {{--<input type="file" class="form-control" name="product_image[]" id="productImage">--}}
            {{--</div>--}}
            {{--</div>--}}

            {{--</div>--}}
            <button type="submit" class="btn btn-success">Update Categories</button>
        </form>
    </div>
@endsection
