@extends('frontend.layout.frontend_master')
@section('main')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                @if($errors->count()===1)
                    {{$errors->first()}}
                @else
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        @endif
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <form action="{{ route('register') }}" method="post" class="form form-horizontal w-75" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label for="name"> Name</label>
                <input name="name" id="name" type="text" class="form-control" placeholder="Enter Your name" value="{{ old('name') }}">
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input name="email" id="email" type="email" class="form-control" placeholder="Enter email" value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input name="phone_number" id="phone_number" type="number" class="form-control" placeholder="Enter phone number" value="{{ old('phone_number') }}">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input name="password" id="password" type="password" class="form-control" placeholder="Enter password">
            </div>

            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input name="password_confirmation" id="confirm_password" type="password" class="form-control" placeholder="Enter password again">
            </div>

            <button type="submit" class="btn btn-primary btn-block">
                Register
            </button>
        </form>
    </div>

@stop
