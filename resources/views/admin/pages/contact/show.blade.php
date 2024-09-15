@extends('admin.layouts.master')
@section('title')
   Show Message Details
@endsection
@section('content')
    <h1>{{$contact->subject}}</h1>
<h5>{{ $contact->message }}</h5>
    <p>in the future here we will have <br>all details about the request and <br>all the answers <br>and answer button for the Super Admin</p>

    <h1>{{Route::currentRouteName()}}</h1>
@endsection
