@extends('admin.layouts.master')
@section('title')
    Profile
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <center>
                <img class="rounded-circle avatar-xl mt-4 " src="{{$user->image ? asset($user->image) : url('uploads/no_image.jpg')}}" alt="Profile Image">
                </center>
                  <div class="card-body">
                      <h4 class="card-title">Name: {{$user->name}}</h4>
                      <hr>
                      <h4 class="card-title">Email: {{$user->email}}</h4>
                      <hr>
                      <h4 class="card-title">Username: {{$user->username}}</h4>
                      <hr>
                      <a href="{{route('admin.profile.edit')}}" class="btn btn-info btn-rounded waves-effect  waves-light">Edit Profile</a>
                  </div>
            </div>
        </div>
    </div>
@endsection
