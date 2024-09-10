@extends('admin.layouts.master')
@section('title')
    Edit Profile
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title mb-4" >Edit Profile Page</h4>
                    <form action="{{route('admin.profile.update')}}" method="post"
                    enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text"  id="name" name="name" value="{{$user->name ?? old('name')}}"  class="form-control"  placeholder="Name">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="username" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text"  id="username" name="username" value="{{$user->username ?? old('username')}}"  class="form-control"  placeholder="Username">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email"  id="email" name="email" value="{{$user->email ?? old('email')}}"  class="form-control"  placeholder="Email">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="image" class="col-sm-2 col-form-label">Profile Image</label>
                            <div class="col-sm-10">
                                <input type="file"  id="image" name="image"  class="form-control" >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="image" class="col-sm-2 col-form-label"></label>

                            <div class="col-sm-10">
                                <img class="rounded avatar-lg " src="{{$user->image ? asset($user->image) : url('uploads/no_image.jpg')}}" alt="Profile Image">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-rounded btn-info waves-light waves-effect">Update Profile</button>
                    </form>
                    <!-- end row -->
                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection
