@extends('admin.layouts.master')
@section('title')
    Edit {{$portfolio->name}} Portfolio
@endsection
@push('css')
    // jquery
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Edit {{$portfolio->name}} portfolio </h4>

                    <form method="post" action="{{ route('admin.portfolios.update', $portfolio->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input name="name" class="form-control" type="text" id="name" value="{{$portfolio->name ?? old('name')}}">
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="title" class="col-sm-2 col-form-label">Title </label>
                            <div class="col-sm-10">
                                <input name="title" class="form-control" type="text" id="title" value="{{$portfolio->title ?? old('title')}}">
                            </div>
                        </div>
                        <!-- end row -->



                        <div class="row mb-3">
                            <label for="description" class="col-sm-2 col-form-label"> Description </label>
                            <div class="col-sm-10">
                                <textarea id="elm1" name="description" class="form-control">{{$portfolio->name ?? old('description')}}</textarea>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="image" class="col-sm-2 col-form-label"> Image </label>
                            <div class="col-sm-10">
                                <input name="image" class="form-control" type="file" id="image">
                            </div>
                        </div>
                        <!-- end row -->


                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                            <div class="col-sm-10">
                                <img id="showImage" class="rounded avatar-lg" src="{{$portfolio->image ? asset($portfolio->image) : url('uploads/no_image.jpg') }}" alt="show image">
                            </div>
                        </div>
                        <!-- end row -->
                        <button type="submit" class="btn btn-info waves-effect waves-light">Update portfolio</button>
                    </form>



                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection
@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function (e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endpush
