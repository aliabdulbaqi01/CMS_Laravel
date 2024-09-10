@extends('admin.layouts.master')
@section('title')
    Change Password
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title mb-4" >Change Password Page</h4>

                    <form action="{{route('admin.password.update')}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="current_password" class="col-sm-2 col-form-label">Current Password</label>
                            <div class="col-sm-10">
                                <input type="password"  id="current_password" name="current_password"   class="form-control"  placeholder="Current Password">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password"  id="password" name="password"   class="form-control"  placeholder="Password">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password_confirmation" class="col-sm-2 col-form-label">Password Confirmation</label>
                            <div class="col-sm-10">
                                <input type="password"  id="password_confirmation" name="password_confirmation"   class="form-control"  placeholder="Password Confirmation">
                            </div>
                        </div>


                        <button type="submit" class="btn btn-rounded btn-info waves-light waves-effect">Change Password</button>
                    </form>
                    <!-- end row -->
                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection

